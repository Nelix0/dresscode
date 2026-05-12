<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;


class WebController extends Controller
{
    public function index(){
        return view('index');
    }

    public function about(){
        return view('about');
    }

    public function account(){
        return view('account');
    }


    public function feedbacks(){
        $feedbacks = DB::table('feedbacks')->latest()->get();

        return view('feedbacks', compact('feedbacks'));
    }

  

    public function feedback_form(Request $request)
    {
        DB::table('feedbacks')->insert([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'rating' => $request->rating,
            'text' => $request->text,
            'created_at' => now(),
        ]);

        return redirect()->back();
    }


}
