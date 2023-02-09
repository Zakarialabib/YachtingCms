<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use Session;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{

    public function index(Request $request){     

        $user = User::where('is_admin','=',1)->first();

        $faqs = Faq::where('status', 1)
                    ->orderBy('id', 'DESC')->get();
        
        return view('pages.backend.faq.index', compact('faqs','user'));
    }

    // Create Faq
    public function create(){
        return view('pages.backend.faq.add');
    }

    // Store Faq
    public function store(Request $request){

        $request->validate([
            'title' => 'required|max:150',
            'content' => 'required',
            'type' => 'required',
        ]);

        $faq = new Faq();
        $faq->status = $request->status;
        $faq->title = $request->title;
        $faq->content = $request->content;
        $faq->type = $request->type;
        $faq->save();
       
        $notification = array(
            'messege' => 'Faq Added successfully!',
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
    }

    // Faq Delete
    public function delete($id){

        $faq = Faq::find($id);
        $faq->delete();

        return back();
    }

    // Faq Edit
    public function edit($id){

        $faq = Faq::find($id);
        return view('pages.backend.faq.edit', compact('faq'));

    }

    // Update Faq
    public function update(Request $request, $id){

        $id = $request->id;
         $request->validate([
            'title' => 'required|max:150',
            'content' => 'required',
            'type' => 'required',
        ]);

        $faq = Faq::find($id);
        $faq->status = $request->status;
        $faq->title = $request->title;
        $faq->content = $request->content;
        $faq->type = $request->type;
        $faq->save();

      
        return redirect(route('admin.faq.index'));
    }

}