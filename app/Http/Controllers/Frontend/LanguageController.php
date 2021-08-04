<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class LanguageController extends Controller
{
    public function enalish()
    {
          Session::get('language');
          Session::forget('language');
         Session::put('language','enalish');
         return redirect()->back();
    }


    public function bangla()
    {

       Session::get('language');
       Session::forget('language');
       Session::put('language', 'bangla');
       return redirect()->back();
        
    }
}
