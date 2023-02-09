<?php

namespace App\Http\Livewire\Admin\Boats;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Boat;
use Auth;

class Index extends Component
{
    use WithPagination;

    public $search;

    public $page_size;
    public $sorting;
    public $deleteStatus;
    public $boat_id;

    public function mount($boat_id = 0)
    {
        $this->boat_id = $boat_id;
        $this->sorting = "default";
        $this->page_size = 8;
        $this->deleteStatus = 0;
    }

    public function canIdelete()
    {
        $boat = Boat::find($this->boat_id);
        if( $boat && $boat->status == 0)
            $this->deleteStatus = 1;
    }

    public function delete()
    {
        $boat = Boat::find($this->boat_id);

        if( ! $boat )
            return session()->flash('message_error','Boat not exists');

        if( $boat->status == 1 )
            return session()->flash('message_error','You can\'t delete this boat');

        $this->deleteStatus = 1;
        unlink("assets/images/boat/".$boat->photo_path);
        Boat::where('id','=',$this->boat_id)->delete();
        session()->flash('message','Boat has been deleted successfully');
    }

    public function render()
    {
        if(Auth::user()->role === 'admin')
        {
            if($this->sorting == 'date')
            {
                $boats = Boat::orderBy('created_at','DESC')->paginate($this->page_size);
            } else if($this->sorting == 'enable'){
                $boats = Boat::where('status','=',1)->paginate($this->page_size);
            } else if($this->sorting == 'disable'){
                $boats = Boat::where('status','=',0)->paginate($this->page_size);
            } else if($this->sorting == 'low'){
                $boats = Boat::where('status','=',1)->orderBy('price','DESC')->paginate($this->page_size);
            } else if($this->sorting == 'hight') {
                $boats = Boat::where('status', '=', 1)->orderBy('price', 'ASC')->paginate($this->page_size);
            } else {
                $boats = Boat::paginate($this->page_size);
            }
        } else {
            if($this->sorting == 'date')
            {
                $boats = Boat::where('user_id','=',Auth::user()->id)->orderBy('created_at','DESC')->paginate($this->page_size);
            } else if($this->sorting == 'enable'){
                $boats = Boat::where('user_id','=',Auth::user()->id)->where('status','=',1)->paginate($this->page_size);
            } else if($this->sorting == 'disable'){
                $boats = Boat::where('user_id','=',Auth::user()->id)->where('status','=',0)->paginate($this->page_size);
            } else if($this->sorting == 'low'){
                $boats = Boat::where('user_id','=',Auth::user()->id)->where('status','=',1)->orderBy('price','DESC')->paginate($this->page_size);
            } else if($this->sorting == 'hight') {
                $boats = Boat::where('user_id', '=', Auth::user()->id)->where('status', '=', 1)->orderBy('price', 'ASC')->paginate($this->page_size);
            } else {
                $boats = Boat::where('user_id','=',Auth::user()->id)->paginate($this->page_size);
            }
        }

        return view('livewire.admin.boats.index',['boats' => $boats]);
    }
}
