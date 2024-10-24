<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function store(Request $request){
        // dd($request->all());
        $data=$request->validate([
            'email'=>'required|email|unique:subscribers,email'
        ]);
        // dd($data);
        Subscriber::create($data);

        return back()->with('status','Subscription Successfully');
    }
}
