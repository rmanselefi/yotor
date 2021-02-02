<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use App\CategoryProduct;
use App\SubCategoryProduct;
use Illuminate\Support\Facades\DB;



class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::where('user_id',auth()->id())->take(8)->inRandomOrder()->get();
        $categories=Category::all();
        return view('dashboard')->with([            
            'products' => $products,
            'categories'=>$categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $allCategories = Category::all();
        $categoriesForProduct = collect([]);

        $sub_categories=SubCategory::all();
        $subCategoriesForProduct = collect([]);

        return view('create_product')->with([       
            'categories'=>$allCategories,     
            'allCategories' => $allCategories,
            'categoriesForProduct'=>$categoriesForProduct,
            'sub_categories'=>$sub_categories,
            'subCategoriesForProduct'=>$subCategoriesForProduct
        ]);
    }


    


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  dd($request->name);
        //
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'price' => 'required',
        ]);
        $image='';
        if ($files = $request->file('image')) {
            $destinationPath = 'storage/products/'.date('YmdHis').'/'; // upload path
            $profileImage =  $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage);
            $image = "products/".date('YmdHis')."/$profileImage";
        }
        // dd($request->name);
        //
        $product = Product::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'name' => $request->name,
            'slug' => $request->slug,
            'details' => $request->details,
            'price' => $request->price,
            'description' => $request->description,            
            'quantity' => $request->quantity,
            'status' => 'Unguar',
            'author' => 'Customer',
            'image' => $image,
            'featured'=>1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),            
        ]);
        $this->updateProductCategories($request,$product->id);
        $this->updateProductSubCategories($request,$product->id);
        $allCategories = Category::all();
        $categoriesForProduct = collect([]);
        // return view('create_product')->with([
        //     'allCategories' => $allCategories,
        //     'categoriesForProduct'=>$categoriesForProduct,
        //     'success_message'=>'Product Registered Succesfully'
        // ]);
        return redirect()->route('dashboard.create')->with('success_message', 'Product was added!');
    }

    protected function updateProductCategories(Request $request, $id)
    {
        if ($request->category) {
            foreach ($request->category as $category) {
                CategoryProduct::create([
                    'product_id' => $id,
                    'category_id' => $category,
                ]);
            }
        }
    }

    protected function updateProductSubCategories(Request $request, $id)
    {
        if ($request->sub_category) {
            foreach ($request->sub_category as $category) {
                SubCategoryProduct::create([
                    'product_id' => $id,
                    'sub_category_id' => $category,
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::find($id);

        $allCategories = Category::all();
        $categoriesForProduct = collect([]);        
        return view('dashboard_edit')->with([            
            'product' => $product,
             'allCategories' => $allCategories,
            'categoriesForProduct'=>$categoriesForProduct,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $image='';
        if ($files = $request->file('image')) {
            $destinationPath = 'storage/products/'.date('YmdHis').'/'; // upload path
            $profileImage =  $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage);
            $image = "products/".date('YmdHis')."/$profileImage";
            DB::table('products')
            ->where('id', $id)
            ->update(
                [
                    'name' => $request->name,
                    'slug'=>$request->slug,
                    'details'=>$request->details,
                    'price' => $request->price,
                    'description' => $request->description,            
                    'quantity' => $request->quantity,                    
                    'image' => $image,                    
                    'updated_at' => date("Y-m-d H:i:s"),
                    ]
                );
        }
        DB::table('products')
            ->where('id', $id)
            ->update(
                [
                    'name' => $request->name,
                    'slug'=>$request->slug,
                    'details'=>$request->details,
                    'price' => $request->price,
                    'description' => $request->description,            
                    'quantity' => $request->quantity,                   
                                       
                    'updated_at' => date("Y-m-d H:i:s"),
                    ]
                );
                $this->updateProductCategories($request,$id);
                $product = Product::find($id);

        $allCategories = Category::all();
        $categoriesForProduct = collect([]);        
        // return view('dashboard_edit')->with([            
        //     'product' => $product,
        //      'allCategories' => $allCategories,
        //     'categoriesForProduct'=>$categoriesForProduct,
            
        // ]);
        return back()->with('success_message', 'Product was updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = Product::findOrFail($id);
        $data->delete();
    }
}
