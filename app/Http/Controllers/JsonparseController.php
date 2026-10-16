<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class JsonparseController extends Controller
{
    public function upload(){ 


        //Category new
        $response = Http::accept('application/json')->withBasicAuth('PandaBox', 'P@ndaPass123')->get('http://t-ts.dyndns.org:30080/PNB/hs/website/categories');
        
        $json = json_decode($response, true);     

        if(count($json) > 0){
            foreach($json as $index => $data){
                $slug = Str::slug($data['Name'], '-');

                $categoryNew = new Category();
                if($data['Name'] === 'Рабочий процесс' || $data['Name'] === 'РАСПРОДАЖА' || $data['Name'] === 'удаление' || $data['Name'] === 'НОМЕНКЛАТУРА' || $data['Name'] === 'пусто' || $data['Name'] === 'Апусто'){
                    
                } else {
                    $categoryNew->title = str_replace("&nbsp;"," ", htmlentities($data['Name']));
                    $categoryNew->slug = $slug;
                    $categoryNew->parent_id = $data['ParentGUID'];
                    $categoryNew->guid = $data['GUID'];
                    $categoryNew->created_at = Carbon::now()->format('Y-m-d').' 00:00:00';
                    $categoryNew->updated_at = Carbon::now()->format('Y-m-d').' 00:00:00';
                    $categoryNew->save();
                }
            }
        }


        
        //Products new
        $response = Http::accept('application/json')->withBasicAuth('PandaBox', 'P@ndaPass123')->get('http://t-ts.dyndns.org:30080/PNB/hs/website/products_v2');
        
        $json = json_decode($response, true); 

        if(count($json) > 0){
            foreach($json as $index => $data){
                $slug = Str::slug($data['Name'], '-') . '_' . mb_substr($data['GUID'], 0, 8);

                $productNew = new Product();
                if($data['Name'] === 'Рабочий процесс' || $data['Name'] === 'удаление' || $data['Name'] === 'НОМЕНКЛАТУРА' || $data['Name'] === 'пусто' || $data['Name'] === 'Апусто'){
                    
                } else {
                    $productNew->title = str_replace("&nbsp;"," ", htmlentities($data['Name']));
                    $productNew->slug = $slug;
                    $productNew->description = $data['Description'];
                    $productNew->category_id = $data['ParentGUID'];
                    if($data['Stock'] <= 0 ){
                        $productNew->qty = 0;
                    } else {
                        $productNew->qty = $data['Stock'];
                    }
                    $productNew->price = $data['Price'];
                    if (!empty($data['PriceSale']) && is_numeric($data['PriceSale'])) {
                        $productNew->sale_price = $data['PriceSale'];
                        $productNew->remark = 'sale';
                    }
                    $stockDetails = [];
                    foreach (($data['StockDetails'] ?? []) as $stockRow) {
                        foreach ((array) $stockRow as $warehouse => $quantity) {
                            if (is_numeric($quantity)) {
                                $warehouse = trim((string) $warehouse);
                                if (mb_strtolower($warehouse) === 'склад') {
                                    $warehouse = 'Алматы';
                                }
                                $stockDetails[$warehouse] = ($stockDetails[$warehouse] ?? 0) + max(0, (int) $quantity);
                            }
                        }
                    }
                    $productNew->stock_details = $stockDetails ?: null;
                    $productNew->guid = $data['GUID'];
                    $productNew->created_at = Carbon::now()->format('Y-m-d').' 00:00:00';
                    $productNew->updated_at = Carbon::now()->format('Y-m-d').' 00:00:00';
                    $productNew->save();
                }
            }
        }
        
        
        
        return  'Файл успешно выгружен!';
    }
}
