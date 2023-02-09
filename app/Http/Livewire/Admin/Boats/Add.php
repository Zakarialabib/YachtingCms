<?php

namespace App\Http\Livewire\Admin\Boats;

use Carbon\Carbon;
use App\Models\Boat;
use App\Models\Amenities;
use App\Models\Country;
use App\Models\Setting;
use App\Models\Category;
use Livewire\WithFileUploads;
use Livewire\Component;
use Auth;
use Image;

class Add extends Component
{
    use WithFileUploads;

    public $search;
    public $name;
    public $description;
    public $address;
    public $guests;
    public $price;
    public $year_factory_boat;
    public $captained;
    public $status;
    public $country;
    public $category;
    public $boat_size;
    public $user_id;
    public $image;
    public $SettingGuests = 10;
    public $SettingBoatSize = 10;

    protected $rules = [
        'name' => 'required|min:3',
        'address' => 'required|min:8',
        'description' => 'required|min:10',
        'guests' => 'required',
        'price' => 'required',
        'year_factory_boat' => 'required',
        'captained' => 'required',
        'country' => 'required',
        'category' => 'required',
        'boat_size' => 'required',
        'status' => 'required',
        'image' => 'required',
    ];

    protected $messages = [
        'name.required' => 'The name cannot be empty.',
        'name.min' => 'The name must be at least 3 characters.',
        'address.required' => 'The address cannot be empty.',
        'address.min' => 'The address must be at least 8 characters.',
        'description.required' => 'The description cannot be empty.',
        'description.min' => 'The description must be at least 10 characters.',
        'guests.required' => 'The guests cannot be empty.',
        'price.required' => 'The price cannot be empty.',
        'year_factory_boat.required' => 'The year_factory_boat cannot be empty.',
        'captained.required' => 'The captained cannot be empty.',
        'country.required' => 'The country cannot be empty.',
        'category.required' => 'The category cannot be empty.',
        'boat_size.required' => 'The boat_size cannot be empty.',
        'status.required' => 'The status cannot be empty.',
        'image.required' => 'The image cannot be empty.',
    ];

    protected $validationAttributes = [
        'name' => 'name field',
        'address' => 'address field',
        'description' => 'description field',
        'guests' => 'guests field',
        'price' => 'price field',
        'year_factory_boat' => 'year_factory_boat field',
        'captained' => 'captained field',
        'country' => 'country field',
        'category' => 'category field',
        'boat_size' => 'boat_size field',
        'status' => 'status field',
        'image' => 'image field',
    ];

    public function mount()
    {
        $this->SettingGuests = Setting::where('name','=','No of guests')->first()->val;
        $this->SettingBoatSize = Setting::where('name','=','Boat size')->first()->val;
        $this->status = 1;
        $this->captained = 0;
        $this->boat_size = 5;
        $this->guests = 2;
        $this->price = 500;
    }

    public function store()
    {
        $this->validate();

        $boat = new Boat();
        $boat->name = $this->name;
        $boat->description = $this->description;
        $boat->address = $this->address;
        $boat->guests = $this->guests;
        $boat->price = $this->price;
        $boat->year_factory_boat = $this->year_factory_boat;
        $boat->captained = $this->captained;
        $boat->boat_size = $this->boat_size;
        $boat->status = $this->status;
        $boat->user_id = Auth::user()->id;
        $boat->country_id = $this->country;
        $boat->category_id = $this->category;

        /* remove */
        //$boat->price = 2;
        $boat->cabins = 2;
        $boat->single_beds = 2;
        $boat->double_beds = 2;
        $boat->bathrooms = 2;
        $boat->number_of_engines = 2;
        $boat->power_per_motor = 2;
        $boat->gallons_per_hour = 2;
        /* remove */

        $boat->user_id = Auth::user()->id;

        $imgName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $boat->photo_path = $imgName;

        $imgFile = Image::make($this->image->getRealPath());

        $imgFile->text('bilouYachting.com All Rights Reserved', 60, 310, function($font) {
            $font->file(public_path('assets/fonts/Marshland_Beauty.otf'));
            $font->size(24);
            $font->color('#209cee');
            $font->align('center');
            $font->valign('bottom ');
            $font->angle(45);
        })->save(public_path('/assets/images/boat').'/'.$imgName);

        $boat->save();

        $amenity = new Amenity();
        $amenity->boat_id = $boat->id;
        $amenity->save();

        session()->flash('message','Boat has been created successfully');

        if( Auth::user()->role == 'admin' )
            return redirect()->to(route('admin.boats',['boat_id' => $boat->id]));
        else
            return redirect()->to(route('owner.boats'));
    }

    public function render()
    {
        $categories = Category::where('type', Category::TYPE_BOAT)
        ->get();
        $countries = Country::all();
        return view('livewire.admin.boats.add',['categories' => $categories,'countries' => $countries]);
    }
}
