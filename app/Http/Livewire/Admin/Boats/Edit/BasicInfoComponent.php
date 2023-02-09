<?php

namespace App\Http\Livewire\Admin\Boats\Edit;

use App\Models\Boat;
use App\Models\Images;
use App\Models\Country;
use App\Models\Category;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Image;

class BasicInfoComponent extends Component
{
    use WithFileUploads;

    public Boat $boat;

    public $search;
    public $boat_id;
    public $name;
    public $address;
    public $description;
    public $guests;
    public $price;
    public $year_factory_boat;
    public $captained;
    public $status;
    public $country;
    public $category;
    public $boat_size;
    public $ratio;
    public $photo_path;
    public $newImg;
    public $image;
    public $image_id;
    public $SettingGuests;
    public $SettingBoatSize;
    public $SettingImages;

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
    ];

    protected $messages = [
        'name.required' => 'The name cannot be empty.',
        'name.min' => 'The name must be at least 8 characters.',
        'address.required' => 'The address cannot be empty.',
        'address.min' => 'The address must be at least 8 characters.',
        'description.required' => 'The description cannot be empty.',
        'description.min' => 'The address must be at least 8 characters.',
        'guests.required' => 'The guests cannot be empty.',
        'price.required' => 'The price cannot be empty.',
        'year_factory_boat.required' => 'The year factory boat cannot be empty.',
        'captained.required' => 'The captained cannot be empty.',
        'country.required' => 'The country cannot be empty.',
        'category.required' => 'The category cannot be empty.',
        'boat_size.required' => 'The boat size cannot be empty.',
        'status.required' => 'The status cannot be empty.',
    ];

    protected $validationAttributes = [
        'name' => 'name category',
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
    ];

    public function mount(Boat $boat)
    {
        $this->boat = $boat;
        $this->boat_id = $boat->id;
        $this->name = $boat->name;
        $this->address = $boat->address;
        $this->description = $boat->description;
        $this->guests = $boat->guests;
        $this->price = $boat->price;
        $this->year_factory_boat = $boat->year_factory_boat;
        $this->captained = $boat->captained;
        $this->status = $boat->status;
        $this->country = $boat->country_id;
        $this->category = $boat->category_id;
        $this->boat_size = $boat->boat_size;
        $this->image = $boat->photo_path;
      
    }

    public function update()
    {
        $this->validate();

        $boat = Boat::find($this->boat_id);
        $boat->name = $this->name;
        $boat->address = $this->address;
        $boat->description = $this->description;
        $boat->guests = $this->guests;
        $boat->price = $this->price;
        $boat->year_factory_boat = $this->year_factory_boat;
        $boat->captained = $this->captained;
        $boat->boat_size = $this->boat_size;
        $boat->status = $this->status;
        $boat->country_id = $this->country;
        $boat->category_id = $this->category;

        if($this->newImg)
        {
            $imgName = Carbon::now()->timestamp.'.'.$this->newImg->extension();
            unlink("assets/images/boat/".$boat->photo_path);
            $boat->photo_path = $imgName;

            $imgFile = Image::make($this->newImg->getRealPath());

            $imgFile->text('bilouYachting.com All Rights Reserved', 60, 310, function($font) {
                $font->file(public_path('assets/fonts/Marshland_Beauty.otf'));
                $font->size(24);
                $font->color('#209cee');
                $font->align('center');
                $font->valign('bottom ');
                $font->angle(45);
            })->save(public_path('/assets/images/boat').'/'.$imgName);

        }

        $boat->save();
        session()->flash('message','Boat has been updated successfully');
    }

    public function render()
    {
        $categories = Category::all();
        $countries = Country::all();
        return view('livewire.admin.boats.edit.basic-info-component',['categories' => $categories,'countries' => $countries]);
    }
}
