<?php

namespace App\Http\Livewire\Admin\Sliders;

use Livewire\Component;
use App\Models\Slider;
use Livewire\WithPagination;
use Auth;

class Index extends Component
{
    use WithPagination;

    public $search;
    public $page_size;
    public $sorting;
    public $deleteStatus;

    public function mount()
    {
        $this->sorting = "default";
        $this->page_size = 8;
        $this->deleteStatus = 0;
    }

    public function canIdelete()
    {
        $slider = Slider::find($this->slider_id);
        if( $slider && count($slider->sliders) == 0)
            $this->deleteStatus = 1;
    }

    public function delete()
    {
        $slider = Slider::find($this->slider_id);

        if( ! $slider )
            return session()->flash('message_error','Option not exists');

        if(count($slider->sliders) > 0)
            return session()->flash('message_error','You can\'t delete this Item');

        $this->deleteStatus = 1;
        $slider->delete();
        return session()->flash('message','Option has been deleted successfully');
    }

    public function render()
    {

        if($this->sorting == 'date')
        {
            $sliders = Slider::orderBy('created_at','DESC')->paginate($this->page_size);
        } else if($this->sorting == 'enable'){
            $sliders = Slider::where('status','=',1)->paginate($this->page_size);
        } else if($this->sorting == 'disable'){
            $sliders = Slider::where('status','=',0)->paginate($this->page_size);
        } else {
            $sliders = Slider::paginate($this->page_size);
        }

        return view('livewire.admin.sliders.index',['sliders' => $sliders]);
    }
}
