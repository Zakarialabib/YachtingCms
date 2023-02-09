<?php

namespace App\Http\Livewire\Admin\Boats;

use Livewire\Component;
use App\Models\Boat;
use Auth;

class Search extends Component
{
    public $search;

    public $page_size;
    public $sorting;
    public $deleteStatus;
    public $boat_id;

    public function mount()
    {
        $this->sorting = "default";
        $this->page_size = 8;
        $this->fill(request()->only('search'));
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
                $boats = Boat::where('name','like','%'.$this->search.'%')->orderBy('created_at','DESC')->paginate($this->page_size);
            } else if($this->sorting == 'enable'){
                $boats = Boat::where('name','like','%'.$this->search.'%')->where('status','=',1)->paginate($this->page_size);
            } else if($this->sorting == 'disable'){
                $boats = Boat::where('name','like','%'.$this->search.'%')->where('status','=',0)->paginate($this->page_size);
            } else if($this->sorting == 'low'){
                $boats = Boat::where('name','like','%'.$this->search.'%')->where('status','=',1)->orderBy('price','DESC')->paginate($this->page_size);
            } else if($this->sorting == 'hight') {
                $boats = Boat::where('name','like','%'.$this->search.'%')->where('status', '=', 1)->orderBy('price', 'ASC')->paginate($this->page_size);
            } else {
                $boats = Boat::where('name','like','%'.$this->search.'%')->paginate($this->page_size);
            }
        } else {
            if($this->sorting == 'date')
            {
                $boats = Boat::where('user_id','=',Auth::user()->id)->where('name','like','%'.$this->search.'%')->orderBy('created_at','DESC')->paginate($this->page_size);
            } else if($this->sorting == 'enable'){
                $boats = Boat::where('user_id','=',Auth::user()->id)->where('name','like','%'.$this->search.'%')->where('status','=',1)->paginate($this->page_size);
            } else if($this->sorting == 'disable'){
                $boats = Boat::where('user_id','=',Auth::user()->id)->where('name','like','%'.$this->search.'%')->where('status','=',0)->paginate($this->page_size);
            } else if($this->sorting == 'low'){
                $boats = Boat::where('user_id','=',Auth::user()->id)->where('name','like','%'.$this->search.'%')->where('status','=',1)->orderBy('price','DESC')->paginate($this->page_size);
            } else if($this->sorting == 'hight') {
                $boats = Boat::where('user_id', '=', Auth::user()->id)->where('name','like','%'.$this->search.'%')->where('status', '=', 1)->orderBy('price', 'ASC')->paginate($this->page_size);
            } else {
                $boats = Boat::where('user_id','=',Auth::user()->id)->where('name','like','%'.$this->search.'%')->paginate($this->page_size);
            }
        }

        return view('livewire.admin.boats.search',['boats' => $boats]);
    }
}
