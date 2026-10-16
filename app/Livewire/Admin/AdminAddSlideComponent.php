<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Slider;



class AdminAddSlideComponent extends Component
{
    use WithFileUploads;
    public $link;
    public $status;
    public $image;

    public function addSolution(){
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $slide = new Slider();  
        $slide->status = $this->status == NULL ? 0 : $this->status; 
        $slide->link = $this->link == NULL ? "#" : $this->link; 
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('slides', $imageName);
        $slide->image = $imageName;

        $slide->save();
        return redirect()->route('admin.slides');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-slide-component')->layout('layouts.admin');
    }
}
