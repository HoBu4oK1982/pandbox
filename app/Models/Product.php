<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'title',
        'slug',
        'SKU',
        'price',
        'oprice',
        'sale_price',
        'guid',
        'qty',
        'stock_details',
        'remark',
        'description',
        'images',
        'brand_id',
        'category_id',
        'profile_id',
        'cashback_id',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'status',
        'new_until',
        'sale_from',
    ];

    protected $casts = [
        'new_until' => 'datetime',
        'sale_from' => 'datetime',
        'stock_details' => 'array',
    ];

    // ------ Аксессор для новинки ------
    public function getIsNewAttribute(): bool
    {
        if ($this->remark !== 'new') {
            return false;
        }

        if (empty($this->new_until)) {
            return false;
        }

        $until = $this->new_until instanceof \DateTimeInterface
            ? $this->new_until
            : Carbon::parse($this->new_until);

        return $until->isFuture();
    }

    // Скоуп для выборки новинок
    public function scopeActualNew($query)
    {
        return $query
            ->where('remark', 'new')
            ->whereNotNull('new_until')
            ->where('new_until', '>=', now());
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'guid');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}
