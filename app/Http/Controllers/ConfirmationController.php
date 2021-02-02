<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class ConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! session()->has('success_message')) {
            return redirect('/');
        }
        $categories=Category::all();
        return view('thankyou')->with([
            'categories'=>$categories
        ]);
    }
}
