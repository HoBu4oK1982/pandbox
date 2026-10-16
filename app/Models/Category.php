<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";

    protected $fillable = [
        'title',
        'slug',
        'guid',
        'description',
        'image',
        'parent_id',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'status',
    ];

    protected $keyType = 'string';
    public $incrementing = false;

    public function products(){
        return $this->hasMany(Product::class, 'category_id', 'guid');
    }

    public function children(){
        return $this->hasMany(Category::class, 'parent_id', 'guid');
    }

    public function parent()
    {
    	return $this->belongsTo(Category::class, 'parent_id', 'guid');
    }

    // Рекурсивный метод для получения всех дочерних категорий
    public function allChildren()
    {
        // Загружаем дочерние категории и продукты для всех уровней вложенности
        return $this->children()->with(['allChildren.products']);
    }

}
