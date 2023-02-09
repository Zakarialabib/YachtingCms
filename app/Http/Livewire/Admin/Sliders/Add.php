<?php

namespace App\Http\Livewire\Admin\Sliders;

use Carbon\Carbon;
use App\Models\Slider;
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

    public $title;
    public $slogan;
    public $label;
    public $link;
    public $photo;
    public $image;
    
    protected $rules = [
        'title' => 'required|min:3',
        'slogan' => 'required',
        'label' => 'required',
        'link' => 'required',
        'photo' => 'required',
    ];

    protected $messages = [
        'title.required' => 'The title cannot be empty.',
        'title.min' => 'The title cannot be less than 3 letters.',
        'slogan.required' => 'The slogan cannot be empty.',
        'label.required' => 'The label cannot be empty.',
        'link.required' => 'The link cannot be empty.',
        'photo.required' => 'The photo cannot be empty.',

    ];

    protected $validationAttributes = [
        'title' => 'title field',
        'slogan' => 'slogan field',
        'label' => 'label field',
        'link' => 'link field',
        'photo' => 'image field',
    ];

    public function mount(Slider $slider)
    {
        $this->slider = $slider;
    }

    public function store()
    {
        $this->validate();

        $slider = new Slider();
        $slider->title = $this->title;
        $slider->photo = $this->photo;
        $slider->slogan = $this->slogan;
        $slider->label = $this->label;
        $slider->link = $this->link;

        $imgName = Carbon::now()->timestamp.'.'.$this->photo->extension();
        $slider->photo_path = $imgName;

        $imgFile = Image::make($this->photo->getRealPath());

        $imgFile->text('luxuryachting', 60, 310, function($font) {
            $font->file(public_path('assets/fonts/Marshland_Beauty.otf'));
            $font->size(24);
            $font->color('#209cee');
            $font->align('center');
            $font->valign('bottom ');
            $font->angle(45);
        })->save(public_path('/assets/images/slider').'/'.$imgName);

        $slider->save();

        session()->flash('message','Slider has been created successfully');
      
    }

    public function render()
    {
        return view('livewire.admin.sliders.add');
    }
}
