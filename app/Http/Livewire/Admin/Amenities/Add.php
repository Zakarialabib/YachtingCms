<?php

namespace App\Http\Livewire\Admin\Amenities;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\AmenityInfo;
use Auth;

class Add extends Component
{
    use WithPagination;

    public $search;
    public $page_size;
    public $_page_size;
    public $option;
    public $amenity;
    public $amenity_id;
    public $status;

    protected function rules()
    {
        return [
            'option' => 'required|min:3|unique:amenity_infos,option,' . $this->id,
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

    public function mount()
    {
        $this->status = 0;
        $this->sorting = "default";
        $this->_sorting = "default";
        $this->page_size = 8;
        $this->_page_size = 8;
        $amenityInfo = AmenityInfo::where('amenity_id','=',null)->first();
        if ( $amenityInfo )
             $this->amenity_id = $amenityInfo->id;
    }

    public function storeAmenityParent()
    {
        $this->status = 0;
        $this->validateOnly('amenity');

        $amenityInfo = new AmenityInfo();
        $amenityInfo->option = $this->amenity;
        $amenityInfo->user_id = Auth::user()->id;

        $amenityInfo->save();
        $this->status = 1;
        session()->flash('message','Amenity has been created successfully');
    }

    public function storeAmenityChild()
    {
        $this->status = 0;
        $this->validateOnly('option');
        $this->validateOnly('amenity_id');

        $amenityInfo = new AmenityInfo();
        $amenityInfo->option = $this->option;
        $amenityInfo->amenity_id = $this->amenity_id;
        $amenityInfo->user_id = Auth::user()->id;

        $amenityInfo->save();
        $this->status = 1;
        session()->flash('message','Option has been created successfully');
    }

    public function render()
    {
        $amenityInfo = AmenityInfo::where('amenity_id','=',null)->limit($this->page_size)->get();
        $allAmenityInfo = AmenityInfo::where('amenity_id','!=',null)->limit($this->_page_size)->get();
        return view('livewire.admin.amenities.add',['amenityInfo' => $amenityInfo,'allAmenityInfo' => $allAmenityInfo]);
    }
}
