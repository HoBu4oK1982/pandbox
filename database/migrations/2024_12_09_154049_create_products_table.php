<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('SKU')->nullable();
            $table->integer('price')->nullable();
            $table->integer('oprice')->nullable();
            $table->integer('sale_price')->nullable();
            $table->string('guid')->unique();
            $table->unsignedInteger('qty')->default(0);
            $table->string('remark')->nullable();
            $table->longText('description')->nullable();
            $table->mediumText('images')->nullable();
            $table->string('brand_id')->nullable();
            $table->string('category_id');
            $table->integer('profile_id')->nullable();
            $table->integer('cashback_id')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
