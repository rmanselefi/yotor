<?php

namespace App\Http\Controllers;

use App\Product;
use App\SubCategory;
use App\Category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagination = 9;
        $sub_categories = SubCategory::all();
        $categories = Category::all();

        if (request()->sub_category) {
            $products = Product::where('status','Guar')->with(['users'])->with('sub_categories')->whereHas('sub_categories', function ($query) {
                $query->where('slug', request()->sub_category);
            });
            $categoryName = optional($categories->where('slug', request()->category)->first())->name;
            $subCategoryName = optional($sub_categories->where('slug', request()->sub_category)->first())->name;
        } else {
            $products = Product::where('featured', true)->with(['users'])->where('status','Guar');
            $subCategoryName = 'Featured';
        }

        if (request()->sort == 'low_high') {
            $products = $products->orderBy('price')->paginate($pagination);
        } elseif (request()->sort == 'high_low') {
            $products = $products->orderBy('price', 'desc')->paginate($pagination);
        } else {
            $products = $products->paginate($pagination);
        }

        return view('sub_category',compact('products'))->with([
            
            'categories' => $categories,
            'subCategoryName' => $subCategoryName,
            'categoryName'=>$categoryName
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $mightAlsoLike = Product::where('slug', '!=', $slug)->mightAlsoLike()->get();

        $stockLevel = getStockLevel($product->quantity);

        return view('product')->with([
            'product' => $product,
            'stockLevel' => $stockLevel,
            'mightAlsoLike' => $mightAlsoLike,
        ]);
    }

    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|min:3',
        ]);

        $query = $request->input('query');

        // $products = Product::where('name', 'like', "%$query%")
        //                    ->orWhere('details', 'like', "%$query%")
        //                    ->orWhere('description', 'like', "%$query%")
        //                    ->paginate(10);

        $products = Product::search($query)->paginate(10);

        return view('search-results')->with('products', $products);
    }

    public function searchAlgolia(Request $request)
    {
        return view('search-results-algolia');
    }
}