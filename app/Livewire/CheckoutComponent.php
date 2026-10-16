<?php

namespace App\Livewire;

use App\Mail\OrderMail;
use App\Models\OrderItem;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use App\Models\Order;
use App\Models\Product;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

use Cart;

class CheckoutComponent extends Component
{
    public $firstname;
    public $email;
    public $mobile;
    public $address;
    public $noaddress = false;
    public $city;
    public $paymentmode;
    public $thankyou;


    public function mount()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $this->firstname = $user->name;
            $this->mobile = $user->phone;
            $this->email = $user->email;
            $this->address = $user->address ?? '';
            $this->city = $user->city ?? '';
        }
    }


    public function updated($fields){
        $this->validateOnly($fields, [
            'firstname' => 'required',
            'mobile' => 'required|numeric',
            'email' => 'email',
            'address' => 'required',
            'city' => 'required'
        ]);
    }

    protected $messages = [
        'firstname.required' => 'Имя обязательное поле',
        'mobile.required' => 'Телефон обязательное поле',
        'email.email' => 'Вы ввели не email',
        'address.required' => 'Адрес обязательное поле',
        'city.required' => 'Город обязательное поле',
    ];


    public function sendOrderConfirmationMail($order){
        $admin = 'olegdata82@mail.ru';
        Mail::to($order->email)->send(new OrderMail($order));
        Mail::to($admin)->send(new OrderMail($order));
    }

    public function updatedNoaddress($value)
    {
        if ($value) {
            $this->address = null;
        }
    }

    public function placeOrder(){
        $cartItems = Cart::instance('cart')->content();
        $products = Product::query()
            ->whereIn('id', $cartItems->pluck('id')->unique()->all())
            ->get()
            ->keyBy(fn (Product $product) => (int) $product->id);

        foreach ($cartItems as $item) {
            $product = $products->get((int) $item->id);
            $stock = $product && (int) $product->status === 0 ? max(0, (int) $product->qty) : 0;

            if ($stock < (int) $item->qty) {
                $this->addError('stock', 'Товар «' . $item->name . '» закончился или доступен в меньшем количестве. Вернитесь в корзину и измените заказ.');
                return;
            }
        }

        $this->validate([
            'firstname' => 'required',
            'mobile' => 'required',
            'email' => 'email',
            'city' => 'required',
            'address' => $this->noaddress ? 'nullable' : 'required',
        ]);     
        


        $productItems = [];

        foreach ($cartItems as $item) {
            $product = Product::find($item->id);
            $productGuid = $product ? $product->guid : null;
            $productPrice = intval($item->price);
        
            $productItems[] = [
                "product_guid" => $productGuid,
                "product_qty" => $item->qty,
                "product_price" => $productPrice
            ];
        }

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal = intval(str_replace(',', '', session()->get('checkout')['subtotal']));
        $order->total = intval(str_replace(',', '', session()->get('checkout')['total']));
        $order->user_name = $this->firstname;
        $order->email = $this->email;
        $order->mobile = $this->mobile;
        $order->address = $this->noaddress ? 'Самовывоз' : $this->address;
        $order->city = $this->city;
        $order->status = 'ordered';
        // Сохраняем заказ в базе, чтобы получить ID
        
        $order->save();

        
        foreach (Cart::instance('cart')->content() as $item){
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $orderItem->qty = $item->qty;
            $orderItem->save();
        }

        

        // Теперь $order->id содержит ID нового заказа
        $orderData = [
            "status" => 200,
            "order_id" => $order->id, // Гарантированно новый ID
            "order_total" => $order->total,
            "user_name" => $order->user_name,
            "user_mobile" => $order->mobile,
            "user_email" => $order->email,
            "address" => $order->address,
            "city" => $order->city,
            "product_items" => $productItems
        ];


        $client = new Client([
            'base_uri' => 'http://t-ts.dyndns.org:30080/PNB/hs/website/',
            'timeout'  => 10.0,
            'verify'   => false,
        ]);

       

        try {
            $response = $client->request('POST', 'orders', [
                'auth' => ['PandaBox', 'P@ndaPass123'],
                'headers' => [
                    'Content-Type'  => 'application/json',
                    'Accept'        => 'application/json',
                ],
                'json' => $orderData,
            ]);
        
            $statusCode = $response->getStatusCode();
            $responseBody = json_decode($response->getBody()->getContents(), true);
        
            if ($statusCode == 200) {
                Cart::instance('cart')->destroy();
                session()->forget('checkout');
            
                $this->thankyou = 1;
            
                $this->sendOrderConfirmationMail($order);           
               
                return $this->redirectRoute('thankyou');
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Ошибка при отправке заказа в 1С: ' . $e->getMessage());
        }   

        
    }


    public function verifyForCheckout()
    {
        if (!Auth::check()) {
            return $this->redirectRoute('login');
        }
        if ($this->thankyou) {
            return $this->redirectRoute('thankyou');
        }
        if (!session()->get('checkout')) {
            return $this->redirectRoute('cart');
        }
    }


    public function render()
    {
        $this->verifyForCheckout(); // Проверка перед рендерингом
        return view('livewire.checkout-component')->layout('layouts.base');
    }
}
