<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use App\Models\Slider;

class AdminEditSlideComponent extends Component
{
    use WithFileUploads;
    public $status;
    public $image;
    public $link;
    public $newimage;
    public $slide_id;

    public function mount($slide_id){
        $slide = Slider::where('id', $slide_id)->first();
        $this->image = $slide->image;
        $this->link = $slide->link;
        $this->status = $slide->status;
        $this->slide_id = $slide->id;
    }


    public function updateSlide(){

        $slide = Slider::find($this->slide_id);
        $slide->status = $this->status;
        $slide->link = $this->link;

        if($this->newimage){
            if($slide->image == NULL){
                $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
                $this->newimage->storeAs('slides', $imageName);
                $slide->image = $imageName;
            } else {
                $imageName = $slide->image;
                $this->newimage->storeAs('slides', $imageName);
                $slide->image = $imageName;
            }
        }
        $slide->save();
        return redirect()->route('admin.slides');

    }

    public function render()
    {      
        return view('livewire.admin.admin-edit-slide-component')->layout('layouts.admin');
    }
}
