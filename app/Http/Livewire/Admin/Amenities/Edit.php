<?php

namespace App\Http\Livewire\Admin\Amenities;

use Livewire\Component;
use App\Models\AmenityInfo;
use App\Models\Amenities;
use Auth;

class Edit extends Component
{
    public Amenities $amenities;

    public $search;
    public $page_size;
    public $sorting;
    public $amt_id;
    public $option;
    public $amenity;
    public $amenity_id;
    public $deleteStatus;
    public $checkAP;
    public $status;

    protected function rules()
    {
        return [
            'option' => 'required|min:3|unique:amenity_infos,option,' . $this->amt_id,
            'amenity' => 'required|min:3',
            'amenity_id' => 'required',
        ];
    }

    protected $messages = [
        'option.required' => 'The option cannot be empty.',
        'option.min' => 'The option most be > 3 character.',
        'amenity.required' => 'The amenity cannot be empty.',
        'amenity.min' => 'The amenity most be > 3 character.',
        'amenity_id.required' => 'The amenity id cannot be empty.',
    ];

    protected $validationAttributes = [
        'option' => 'option field',
        'amenity' => 'amenity field',
        'amenity_id' => 'amenity id field',
    ];

    public function mount(Amenities $amenity)
    {
        $this->amenities = $amenity;
        $this->amt_id = $amenity->id;

        $this->status = 0;
        $this->sorting = "default";
        $this->page_size = 8;
        $this->deleteStatus = 0;

        $amenity = AmenityInfo::find($this->amt_id);

        $this->option = $amenity->option;
        $this->amenity = $amenity->option;
        $this->amenity_id = $amenity->amenity_id;

        $this->checkAP = 1;
        if( $amenity->amenity_id === null )
            $this->checkAP = 0;

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

    public function updateAmenityParent()
    {
        $this->status = 0;
        $this->validateOnly('amenity');

        $amenityInfo = AmenityInfo::find($this->amt_id);
        $amenityInfo->option = $this->option;
        $amenityInfo->user_id = Auth::user()->id;

        $amenityInfo->save();
        $this->status = 1;
        //dd($this->status);
        session()->flash('message','Amenity has been updated successfully');
    }

    public function updateAmenityChild()
    {
        $this->status = 0;
        $this->validateOnly('option');
        $this->validateOnly('amenity_id');

        $amenityInfo = AmenityInfo::find($this->amt_id);
        $amenityInfo->option = $this->option;
        $amenityInfo->amenity_id = $this->amenity_id;
        $amenityInfo->user_id = Auth::user()->id;

        $amenityInfo->save();
        $this->status = 1;
        session()->flash('message','Option has been updated successfully');
    }

    public function render()
    {
        if($this->sorting == 'date')
        {
            $allAmenityInfo = AmenityInfo::where('id','!=',$this->amt_id)->orderBy('created_at','DESC')->limit($this->page_size)->get();
        } else if($this->sorting == 'parent'){
            $allAmenityInfo = AmenityInfo::where('id','!=',$this->amt_id)->where('amenity_id','=',null)->limit($this->page_size)->get();
        } else if($this->sorting == 'child'){
            $allAmenityInfo = AmenityInfo::where('id','!=',$this->amt_id)->where('amenity_id','!=',null)->limit($this->page_size)->get();
        }  else {
            $allAmenityInfo = AmenityInfo::where('id','!=',$this->amt_id)->limit($this->page_size)->get();
        }

        $amenityInfo = AmenityInfo::where('amenity_id','=',null)->get();
        return view('livewire.admin.amenities.edit',['amenityInfo' => $amenityInfo,'allAmenityInfo' => $allAmenityInfo]);
    }
}
