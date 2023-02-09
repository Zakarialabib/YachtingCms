<?php

namespace App\Http\Livewire\Admin\Boats;

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

class Edit extends Component
{
    use WithFileUploads;
    
    public Boat $boat;

    public $search;
    public $name;
    public $boat_id;
    public $ratio;

    public function mount(Boat $boat)
    {
        $this->boat = $boat;
        $this->boat_id = $boat->id;
        $this->name = $boat->name;
        $this->ratio = $boat->ratio;
    }

    public function updateRatio()
    {
        $boatRatio = Boat::find($this->boat_id);
        $boatRatio->ratio = $this->ratio;
        $boatRatio->save();
        session()->flash('boat_ratio','boat ratio has been updated successfully');
    }

    public function render()
    {
        return view('livewire.admin.boats.edit');
    }
}
