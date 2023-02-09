<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Http\Request;
use App\Models\Boat;

class BoatsController extends Controller
{
    public function index()
    {
        return view('pages.backend.boats.index');
    }    
    public function edit(Boat $boat)
    {
        return view('pages.backend.boats.edit', compact('boat'));
    }    
    public function add()
    {
        return view('pages.backend.boats.add');
    }    
    public function search()
    {
        return view('pages.backend.boats.search');
    }    
}