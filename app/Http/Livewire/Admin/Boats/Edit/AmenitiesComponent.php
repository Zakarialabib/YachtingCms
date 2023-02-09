<?php

namespace App\Http\Livewire\Admin\Boats\Edit;

use App\Models\Amenities;
use App\Models\AmenityInfo;
use App\Models\Boat;
use Livewire\Component;

class AmenitiesComponent extends Component
{
    public Boat $boat;

    public $boat_id;
    public $select_activity = [];
    public $select_nav_safety = [];
    public $select_entertainment = [];
    public $select_comfort = [];

    public $selectActivity;
    public $selectNavSafety;
    public $selectEntertainment;
    public $selectComfort;

    protected $rules = [
        'select_activity' => 'required',
        'select_nav_safety' => 'required',
        'select_entertainment' => 'required',
        'select_comfort' => 'required',
    ];

    protected $messages = [
        'select_activity.required' => 'The Activity cannot be empty.',
        'select_nav_safety.required' => 'The Nav safety cannot be empty.',
        'select_entertainment.required' => 'The Entertainment cannot be empty.',
        'select_comfort.required' => 'The Comfort cannot be empty.',
    ];

    protected $validationAttributes = [
        'select_activity' => 'Activity field',
        'select_nav_safety' => 'Nav safety field',
        'select_entertainment' => 'Entertainment field',
        'select_comfort' => 'Comfort field',
    ];

    public function mount(Boat $boat)
    {
        $this->boat = $boat;
        $this->boat_id = $boat->id;
        $amenity = Amenities::where("boat_id","=",$this->boat_id)->first();
        if ( $amenity )
        {
            $this->select_activity = explode(',',$amenity->activity);
            $this->select_nav_safety = explode(',',$amenity->nav_safety);
            $this->select_entertainment = explode(',',$amenity->entertainment);
            $this->select_comfort = explode(',',$amenity->comfort);
        }



        $activity = AmenityInfo::where("option","=","activity")->where("amenity_id","=",null)->first();
        if ( $activity )
             $this->selectActivity = $activity->amenities;

        $navSafety = AmenityInfo::where("option","=","Navigation et sécurité")->where("amenity_id","=",null)->first();
        if ( $navSafety )
             $this->selectNavSafety = $navSafety->amenities;

        $entertainment = AmenityInfo::where("option","=","Divertissement")->where("amenity_id","=",null)->first();
        if ( $entertainment )
             $this->selectEntertainment = $entertainment->amenities;

        $comfort = AmenityInfo::where("option","=","Le confort")->where("amenity_id","=",null)->first();
        if ( $comfort )
             $this->selectComfort = $comfort->amenities;
    }

    public function updateActivity()
    {
        $this->validateOnly('select_activity');

        $amenity = Amenities::where("boat_id","=",$this->boat_id)->first();
        $amenity->activity = implode(',',$this->select_activity);
        $amenity->save();
        session()->flash('message','activity has been updated successfully');
    }

    public function updateNavSafety()
    {
        $this->validateOnly('select_nav_safety');

        $amenity = Amenities::where("boat_id","=",$this->boat_id)->first();
        $amenity->nav_safety = implode(',',$this->select_nav_safety);
        $amenity->save();
        session()->flash('message','Navigation and safety has been updated successfully');
    }

    public function updateEntertainment()
    {
        $this->validateOnly('select_entertainment');

        $amenity = Amenities::where("boat_id","=",$this->boat_id)->first();
        $amenity->entertainment = implode(',',$this->select_entertainment);
        $amenity->save();
        session()->flash('message','Entertainment has been updated successfully');
    }

    public function updateComfort()
    {
        $this->validateOnly('select_comfort');

        $amenity = Amenities::where("boat_id","=",$this->boat_id)->first();
        $amenity->comfort = implode(',',$this->select_comfort);
        $amenity->save();
        session()->flash('message','comfort has been updated successfully');
    }

    public function render()
    {
        $amenities = AmenityInfo::all();
        return view('livewire.admin.boats.edit.amenities-component',['amenities' => $amenities]);
    }
}
