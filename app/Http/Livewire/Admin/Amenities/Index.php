<?php

namespace App\Http\Livewire\Admin\Amenities;

use Livewire\Component;
use App\Models\AmenityInfo;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search;
    public $page_size;
    public $sorting;
    public $amenity_id;
    public $deleteStatus;

    public function mount()
    {
        $this->sorting = "default";
        $this->page_size = 8;
        $this->deleteStatus = 0;
    }

    public function canIdelete()
    {
        $amenity = AmenityInfo::find($this->amenity_id);
        if( $amenity && count($amenity->amenities) == 0)
            $this->deleteStatus = 1;
    }

    public function delete()
    {
        $amenity = AmenityInfo::find($this->amenity_id);

        if( ! $amenity )
            return session()->flash('message_error','Option not exists');

        if(count($amenity->amenities) > 0)
            return session()->flash('message_error','You can\'t delete this Item');

        $this->deleteStatus = 1;
        $amenity->delete();
        return session()->flash('message','Option has been deleted successfully');
    }

    public function render()
    {
        if($this->sorting == 'date')
        {
            $amenities = AmenityInfo::orderBy('created_at','DESC')->paginate($this->page_size);
        } else if($this->sorting == 'parent'){
            $amenities = AmenityInfo::where('amenity_id','=',null)->paginate($this->page_size);
        } else if($this->sorting == 'child'){
            $amenities = AmenityInfo::where('amenity_id','!=',null)->paginate($this->page_size);
        }  else {
            $amenities = AmenityInfo::paginate($this->page_size);
        }

        return view('livewire.admin.amenities.index',['amenities' => $amenities]);
    }
}
