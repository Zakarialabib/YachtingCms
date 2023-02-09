<?php

namespace App\Http\Livewire\Admin\Boats\Edit;

use App\Models\Boat;
use App\Models\Images;
use App\Models\Amenities;
use App\Models\Country;
use App\Models\Category;
use App\Models\Setting;
use App\Models\AmenityInfo;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class DetailsInfoComponent extends Component
{
    use WithFileUploads;
    public Boat $boat;
    public $search;
    public $boat_id;
    public $cabins;
    public $single_beds;
    public $double_beds;
    public $bathrooms;
    public $number_of_engines;
    public $power_per_motor;
    public $gallons_per_hour;
    public $booking_type;
    public $SettingCabins;
    public $SettingSingleBeds;
    public $SettingDoubleBeds;
    public $SettingBathRooms;
    public $SettingNumberOfEngines;
    public $SettingPowerPerMotor;
    public $SettingGallonsPerHour;

    protected $rules = [
        'cabins' => 'required',
        'single_beds' => 'required',
        'double_beds' => 'required',
        'bathrooms' => 'required',
        'number_of_engines' => 'required',
        'power_per_motor' => 'required',
        'gallons_per_hour' => 'required',
    ];


    protected $messages = [
        'cabins.required' => 'The cabins cannot be empty.',
        'single_beds.required' => 'The single beds cannot be empty.',
        'double_beds.required' => 'The double beds cannot be empty.',
        'bathrooms.required' => 'The bathrooms cannot be empty.',
        'number_of_engines.required' => 'The number of engines cannot be empty.',
        'power_per_motor.required' => 'The power per motor cannot be empty.',
        'gallons_per_hour.required' => 'The gallons per hour cannot be empty.',
    ];

    protected $validationAttributes = [
        'cabins' => 'cabins field',
        'single_beds' => 'single_beds field',
        'double_beds' => 'double_beds field',
        'bathrooms' => 'bathrooms field',
        'number_of_engines' => 'number_of_engines field',
        'power_per_motor' => 'power_per_motor field',
        'gallons_per_hour' => 'gallons_per_hour field',
    ];

    public function mount(Boat $boat)
    {
       
        $this->SettingCabins = Setting::where('name','=','Cabines')->first()->val;
        $this->SettingSingleBeds = Setting::where('name','=','SingleBeds')->first()->val;
        $this->SettingDoubleBeds = Setting::where('name','=','DoubleBeds')->first()->val;
        $this->SettingBathRooms = Setting::where('name','=','BathRooms')->first()->val;
        $this->SettingNumberOfEngines = Setting::where('name','=','NumberOfEngines')->first()->val;
        $this->SettingPowerPerMotor = Setting::where('name','=','PowerPerMotor')->first()->val;
        $this->SettingGallonsPerHour = Setting::where('name','=','GallonsPerHour')->first()->val;

        $this->boat = $boat;
        $this->boat_id = $boat->id;

        $this->images = $boat->images;
        $this->cabins = $boat->cabins;
        $this->single_beds = $boat->single_beds;
        $this->double_beds = $boat->double_beds;
        $this->bathrooms = $boat->bathrooms;
        $this->number_of_engines = $boat->number_of_engines;
        $this->power_per_motor = $boat->power_per_motor;
        $this->gallons_per_hour = $boat->gallons_per_hour;
        $this->booking_type = $boat->booking_type;
       
    }

    public function updateDetails()
    {
        $this->validate();

        $boat = Boat::find($this->boat_id);

        $boat->cabins = $this->cabins;
        $boat->single_beds = $this->single_beds;
        $boat->double_beds = $this->double_beds;
        $boat->bathrooms = $this->bathrooms;
        $boat->number_of_engines = $this->number_of_engines;
        $boat->power_per_motor = $this->power_per_motor;
        $boat->gallons_per_hour = $this->gallons_per_hour;
        $boat->booking_type = $this->booking_type;

        $boat->save();
        session()->flash('message','Details boat has been updated successfully');
    }

    public function render()
    {
        $amenities = AmenityInfo::all();
        $amenityInfo = AmenityInfo::where('amenity_id','=',null)->paginate(4);
        return view('livewire.admin.boats.edit.details-info-component',['amenityInfo' => $amenityInfo,'amenities' => $amenities]);
    }
}
