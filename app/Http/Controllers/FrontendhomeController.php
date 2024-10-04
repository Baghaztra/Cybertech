<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class FrontendHomeController extends Controller
{
    public function index()
    {
        return view('frontend.home.index');
    }
    
    public function events(){
        $events = Event::with('images')->latest()->get();
        return view('frontend.event.index', ['events'=>$events]);
    }

    public function event($id) {
        $event = Event::with('images')->findOrFail($id);
        
        return view('frontend.event.detail', ['event' => $event]);
    }
    
    
    public function galeri(){
        return view('frontend.galeri.index');
    }
    
    public function about(){
        return view('frontend.about.index');
    }
}
