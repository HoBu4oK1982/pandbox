<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use App\Models\Product;

class AdminEditProductComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $qty;
    public $price;
    public $images;
    public $newimage;
    public $remark;
    public $sale_price;
    public $status;
    public $meta_description;
    public $meta_keywords;
    public $meta_title;
    public $product_slug;
    public $product_id;

    // До какой даты товар считается новинкой
    public $new_until;

    // С какой даты товар в акции (для сортировки на /sales)
    public $sale_from;

    public function mount($product_slug)
    {
        $this->product_slug = $product_slug;
        $product = Product::where('slug', $product_slug)->first();

        $this->product_id = $product->id;
        $this->title = $product->title;
        $this->description = $product->description;
        $this->qty = $product->qty;
        $this->images = $product->images ? explode(',', $product->images) : [];
        $this->price = $product->price;
        $this->sale_price = $product->sale_price;
        $this->status = $product->status;
        $this->remark = $product->remark;
        $this->newimage = $product->newimage;
        $this->meta_description = $product->meta_description;
        $this->meta_keywords = $product->meta_keywords;
        $this->meta_title = $product->meta_title;

        // заполняем дату новинки для input[type=date]
        $this->new_until = $product->new_until
            ? Carbon::parse($product->new_until)->format('Y-m-d')
            : null;

        // заполняем дату старта акции для input[type=date]
        $this->sale_from = $product->sale_from
            ? Carbon::parse($product->sale_from)->format('Y-m-d')
            : null;
    }

    /**
     * При смене remark:
     *  - "new"  → автоматически +1 месяц, если дата не задана
     *  - "sale" → автоматически сегодняшняя дата, если не задана
     *  - иначе  → чистим соответствующие даты
     */
    public function updatedRemark($value)
    {
        // логика для новинки
        if ($value === 'new' && !$this->new_until) {
            $this->new_until = Carbon::now()->addMonth()->format('Y-m-d');
        }
        if ($value !== 'new') {
            $this->new_until = null;
        }

        // логика для акции
        if ($value === 'sale' && !$this->sale_from) {
            $this->sale_from = Carbon::now()->format('Y-m-d');
        }
        if ($value !== 'sale') {
            $this->sale_from = null;
        }
    }

    public function updateProduct()
    {
        $product = Product::find($this->product_id);

        $product->description = $this->description;
        $product->status = $this->status;
        $product->remark = $this->remark;

        // если пустая строка — пишем NULL
        $product->sale_price = $this->sale_price === ''
            ? null
            : $this->sale_price;

        // ЛОГИКА СРОКА НОВИНКИ
        if ($this->remark === 'new') {
            if ($this->new_until) {
                // если админ руками задал дату
                $product->new_until = Carbon::parse($this->new_until)->endOfDay();
            } else {
                // если дата не задана — по умолчанию +1 месяц от сохранения
                $product->new_until = Carbon::now()->addMonth();
            }
        } else {
            // если товар больше не new — снимаем дату
            $product->new_until = null;
        }

        // ЛОГИКА ДАТЫ НАЧАЛА АКЦИИ
        if ($this->remark === 'sale') {
            if ($this->sale_from) {
                // если админ задал дату руками — берём начало дня
                $product->sale_from = Carbon::parse($this->sale_from)->startOfDay();
            } else {
                // если не задана — ставим сейчас
                $product->sale_from = Carbon::now();
            }
        } else {
            // если больше не sale — снимаем дату
            $product->sale_from = null;
        }

        // если загружены новые картинки — пересохраняем
        if ($this->newimage) {
            if ($product->images) {
                $images = explode(',', $product->images);
                foreach ($images as $image) {
                    @unlink('assets/images/products/' . $image);
                }
            }

            $imagesname = '';
            foreach ($this->newimage as $key => $image) {
                $imgName = $product->slug . '_' . $key . '.' . $image->extension();
                $image->storeAs('products', $imgName);
                $imagesname = $imagesname . ',' . $imgName;
            }
            $product->images = preg_replace('/^./', '', $imagesname);
        }

        $product->meta_keywords = $this->meta_keywords;
        $product->meta_title = $this->meta_title;
        $product->meta_description = $this->meta_description;
        $product->save();

        return redirect()->route('admin.products');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-product-component')
            ->layout('layouts.admin');
    }
}
