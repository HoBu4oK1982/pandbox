<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;

class FrontendController extends Controller
{
    public function getImages($guid){ // Get all images from product
        $product = Product::where('guid', $guid)->first();       

        if($product && $product->images != null){
            $productImages = explode(",", $product->images);

            foreach($productImages as $image){
                $productImagesReady[] = [
                    "image" => 'https://pandbox.kz/assets/images/products/' . $image
                ];
            }  

            return response()->json([
                'status' => 200,
                'images' => $productImagesReady,
            ]);
        } else{
            return response()->json([
                'status' => 404,
                'message' => 'Продукт не найден',
            ]);
        }
    }// end method

    public function getAdminProduct($guid){ // Get all images from product
        $product = Product::where('guid', $guid)->first();

        if($product){
            return redirect('https://pandbox.kz/admin/product/edit/' . $product->slug);
        } else{
            return response()->json([
                'status' => 404,
                'message' => 'Продукт не найден',
            ]);
        }

    }// end method

    public function getOrder($id){ // Get one order
        $order = Order::where('id', $id)->first();
        $order_items = $order->orderItems;

        foreach ($order_items as $value) {
            $product_guid = Product::where('id', $value['id'])->first();

            $dataArray[] = [
                "product_guid" => $product_guid->guid,
                "product_qty" => $value['qty'],
                "product_price" => $value['price'],
            ];
        }

        if($order){
            return response()->json([
                'status' => 200,
                'order_id' => $order->id,
                'order_total' => $order->total,
                'user_name' => $order->user_name,
                'user_mobile' => $order->mobile,
                'user_email' => $order->email,
                'city' => $order->city,
                'product_items' => $dataArray,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Продукт не найден',
            ]);
        }

    }// end method
}
