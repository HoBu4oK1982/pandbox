<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use App\Models\Category;

class AdminEditCategoryComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $description;
    public $status;
    public $slug;
    public $image;
    public $meta_description;
    public $meta_keywords;
    public $meta_title;
    public $category_id;
    public $newimage;

    public function mount($category_slug){        
        $category = Category::where('slug', $category_slug)->first();
        $this->slug = $category->slug;
        $this->category_id = $category->id;
        $this->title = $category->title;
        $this->description = $category->description;
        $this->image = $category->image;
        $this->status = $category->status;
        $this->newimage = $category->newimage;
        $this->meta_description = $category->meta_description;
        $this->meta_keywords = $category->meta_keywords;
        $this->meta_title = $category->meta_title;
    }

    public function updateCategory(){
        $category = Category::find($this->category_id);

        $category->meta_description = $this->meta_description;
        $category->meta_keywords = $this->meta_keywords;
        $category->meta_title = $this->meta_title;
        $category->status = $this->status;

        if($this->newimage){
            if($category->image == NULL){
                $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
                $this->newimage->storeAs('categories', $imageName);
                $category->image = $imageName;
            } else {
                $imageName = $category->image;
                $this->newimage->storeAs('categories', $imageName);
                $category->image = $imageName;
            }
        }
        $category->save();
        return redirect()->route('admin.categories');
    }

        

    public function render()
    {
        return view('livewire.admin.admin-edit-category-component')->layout('layouts.admin');
    }
}
