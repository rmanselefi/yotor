<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Advert;
use App\MiddleAdverts;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('featured', true)->where('status','Guar')->take(8)->inRandomOrder()->get();
        $trending = Product::where('trending', true)->where('status','Guar')->take(8)->inRandomOrder()->get();
        $categories = Category::all();
        $adverts=Advert::all();
        $middleAdverts=MiddleAdverts::all();


        
        // return view('landing-page')->with([
        //     'products', $products,
        //     'categories',$categories
        //     ]);
            return view('landing-page')->with([
            'products' => $products,
            'categories' => $categories ,
            'adverts'=>$adverts     ,
            'middleAdverts'=>$middleAdverts      ,
            'trending'=>$trending
        ]);
    }
}
