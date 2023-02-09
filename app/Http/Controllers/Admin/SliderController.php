<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Http\Controllers\Controller;
use Storage;
use App\Models\User;

class SliderController extends Controller
{
 
    public function index()
    {
        
        return view('pages.backend.slides.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view ('pages.backend.slides.create');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $slider = Slider::findOrFail($id);
        return view('pages.backend.slides.edit', compact('slider'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    
        $slider = Slider::find($id);
        $this->validate($request, array(
          'title'=>'',
          'photo'=>'',
          'slogan' =>'',
          'label'=>'',
          'link'=>'',
       ));
 
        $slider = Slider::where('id',$id)->first();
 
        $slider->title = $request->input('title');
        $slider->slogan = $request->input('slogan');
        $slider->label = $request->input('label');
        $slider->link = $request->input('link');

        if ($request->hasFile('photo')) {
         $photo = $request->file('photo');
         $filename = 'slide' . '-' . time() . '.' . $photo->getClientOriginalExtension();
         $location = public_path('images/');
         $request->file('photo')->move($location, $filename);
 
         $oldFilename = $slider->photo;
         $slider->photo= $filename;
         if(!empty($slider->photo)){
           Storage::delete($oldFilename);
         }
       }
 
       $slider->save();
 
       return redirect()->route('slides.index',
           $slider->id)->with('success',
           'Slider, '. $slider->title.' updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $slider = Slider::findOrFail($id);
        Storage::delete($slider->photo);
        $slider->delete();
      
        return redirect()->route('slides.index')
                ->with('success',
                 'Slide successfully deleted');
    }
}
