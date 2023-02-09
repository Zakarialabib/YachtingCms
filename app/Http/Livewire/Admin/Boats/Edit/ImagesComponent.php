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
use Image;

class ImagesComponent extends Component
{
    use WithFileUploads;

    public $search;
    public $boat_id;
    public $name;
    public $description;
    public $guests;
    public $year_factory_boat;
    public $captained;
    public $status;
    public $country;
    public $category;
    public $cabins;
    public $single_beds;
    public $double_beds;
    public $bathrooms;
    public $number_of_engines;
    public $power_per_motor;
    public $gallons_per_hour;
    public $booking_type;
    public $boat_size;
    public $ratio;
    public $photo_path;
    public $newImg;
    public $nbrImages;
    public $images;
    public $image_id;
    public $upload_images = [];
    public $select_activity = [];
    public $select_nav_safety = [];
    public $select_entertainment = [];
    public $select_comfort = [];
    public $SettingCabins;
    public $SettingSingleBeds;
    public $SettingDoubleBeds;
    public $SettingBathRooms;
    public $SettingNumberOfEngines;
    public $SettingPowerPerMotor;
    public $SettingGallonsPerHour;
    public $SettingGuests;
    public $SettingBoatSize;
    public $SettingImages;

    protected $rules = [
        'name' => 'required|min:3',
        'description' => 'required|min:10',
        'guests' => 'required',
        'year_factory_boat' => 'required',
        'captained' => 'required',

        'cabins' => 'required',
        'single_beds' => 'required',
        'double_beds' => 'required',
        'bathrooms' => 'required',
        'number_of_engines' => 'required',
        'power_per_motor' => 'required',
        'gallons_per_hour' => 'required',

        'country' => 'required',
        'category' => 'required',
        'boat_size' => 'required',
        'status' => 'required',
    ];


    protected $messages = [
        'name.required' => 'The name cannot be empty.',
        'guests.required' => 'The guests must be at least 3 characters.',
        'description.required' => 'The description cannot be empty.',
        'year_factory_boat.required' => 'The year factory boat cannot be empty.',
        'captained.required' => 'The captained cannot be empty.',

        'cabins.required' => 'The cabins cannot be empty.',
        'single_beds.required' => 'The single beds cannot be empty.',
        'double_beds.required' => 'The double beds cannot be empty.',
        'bathrooms.required' => 'The bathrooms cannot be empty.',
        'number_of_engines.required' => 'The number of engines cannot be empty.',
        'power_per_motor.required' => 'The power per motor cannot be empty.',
        'gallons_per_hour.required' => 'The gallons per hour cannot be empty.',

        'country.required' => 'The country cannot be empty.',
        'category.required' => 'The category cannot be empty.',
        'boat_size.required' => 'The boat size cannot be empty.',
        'status.required' => 'The status cannot be empty.',
    ];

    protected $validationAttributes = [
        'name' => 'name category',
        'guests' => 'guests field',
        'description' => 'description field',
        'year_factory_boat' => 'year_factory_boat field',
        'captained' => 'captained field',
        'cabins' => 'cabins field',
        'single_beds' => 'single_beds field',
        'double_beds' => 'double_beds field',
        'bathrooms' => 'bathrooms field',
        'number_of_engines' => 'number_of_engines field',
        'power_per_motor' => 'power_per_motor field',
        'gallons_per_hour' => 'gallons_per_hour field',
        'country' => 'country field',
        'category' => 'category field',
        'boat_size' => 'boat_size field',
        'status' => 'status field',
    ];

    public function mount(Boat $boat)
    {
        $this->boat = $boat;
        $this->boat_id = $boat->id;

        $this->SettingCabins = Setting::where('name','=','Cabines')->first()->val;
        $this->SettingSingleBeds = Setting::where('name','=','SingleBeds')->first()->val;
        $this->SettingDoubleBeds = Setting::where('name','=','DoubleBeds')->first()->val;
        $this->SettingBathRooms = Setting::where('name','=','BathRooms')->first()->val;
        $this->SettingNumberOfEngines = Setting::where('name','=','NumberOfEngines')->first()->val;
        $this->SettingPowerPerMotor = Setting::where('name','=','PowerPerMotor')->first()->val;
        $this->SettingGallonsPerHour = Setting::where('name','=','GallonsPerHour')->first()->val;
        $this->SettingGuests = Setting::where('name','=','No of guests')->first()->val;
        $this->SettingBoatSize = Setting::where('name','=','Boat size')->first()->val;
        $this->SettingImages = Setting::where('name','=','Boat Images')->first()->val;

        $amenity = Amenities::where("boat_id","=",$this->boat_id)->first();
        if ( $amenity )
        {
            $this->select_activity = explode(',',$amenity->activity);
            $this->select_nav_safety = explode(',',$amenity->nav_safety);
            $this->select_entertainment = explode(',',$amenity->entertainment);
            $this->select_comfort = explode(',',$amenity->comfort);
        }
       
        $this->nbrImages = $boat->images->count();
        $this->images = $boat->images;
        $this->boat_id = $boat->id;
        $this->name = $boat->name;
        $this->description = $boat->description;
        $this->guests = $boat->guests;
        $this->year_factory_boat = $boat->year_factory_boat;
        $this->captained = $boat->captained;
        $this->status = $boat->status;
        $this->country = $boat->country_id;
        $this->category = $boat->category_id;
        $this->boat_size = $boat->boat_size;
        $this->ratio = $boat->ratio;
        $this->photo_path = $boat->photo_path;

        $this->cabins = $boat->cabins;
        $this->single_beds = $boat->single_beds;
        $this->double_beds = $boat->double_beds;
        $this->bathrooms = $boat->bathrooms;
        $this->number_of_engines = $boat->number_of_engines;
        $this->power_per_motor = $boat->power_per_motor;
        $this->gallons_per_hour = $boat->gallons_per_hour;
        $this->booking_type = $boat->booking_type;
      
    }

    public function storeImage()
    {
        /*
        $this->validate([
            'upload_images.*' => 'image|max:1024', // 1MB Max
        ]);
        */

        if(empty($this->upload_images))
            return session()->flash('message_img_error', 'Select some images.');

        $nbrImagesAvailable = $this->SettingImages - $this->nbrImages;
        if (count($this->upload_images) > ($nbrImagesAvailable))
            return session()->flash('message_img_error', 'You can\'t select more images,number of images available : '.$nbrImagesAvailable);

        foreach ($this->upload_images as $key => $image) {

            $imgName = Str::random(8).'_'.Carbon::now()->timestamp.'.'.$image->extension();

            $imgFile = Image::make($image->getRealPath());

            $imgFile->text('bilouYachting.com All Rights Reserved', 60, 310, function($font) {
                $font->file(public_path('assets/fonts/Marshland_Beauty.otf'));
                $font->size(24);
                $font->color('#209cee');
                $font->align('center');
                $font->valign('bottom ');
                $font->angle(45);
            })->save(public_path('/assets/images/boat').'/'.$imgName);

            $images = new Images();
            $images->image = $imgName;
            $images->boat_id = $this->boat_id;
            $images->save();

        }

        $boat = Boat::find($this->boat_id);

        if($boat)
            $this->images = $boat->images;

        $this->upload_images = [];

        session()->flash('message_img', 'Images has been successfully Uploaded.');
    }

    public function delete()
    {
        $image = Images::find($this->image_id);
        unlink("assets/images/boat/".$image->image);
        $image->delete();

        $boat = Boat::find($this->boat_id);

        if($boat)
            $this->images = $boat->images;

        session()->flash('image_message','Image has been deleted successfully');
    }

    public function render()
    {
        $amenities = AmenityInfo::all();
        $amenityInfo = AmenityInfo::where('amenity_id','=',null)->paginate(4);
        return view('livewire.admin.boats.edit.images-component',['amenityInfo' => $amenityInfo,'amenities' => $amenities]);
    }
}
