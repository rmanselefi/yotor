<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return view('contact')->with([
            'categories'=>$categories
        ]);
    }
}
