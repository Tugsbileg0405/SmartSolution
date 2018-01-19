<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Product;
use Image;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;

class AdminProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::get();
        return view('admin.products', [
            'brands' => $brands
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->get('name');
        $product->short_description = $request->get('short_description');
        $product->description = $request->get('content');
        $product->price = $request->get('price');
        $product->description = $request->get('content');
        $product->brand_id = $request->get('brand');
        if (!$request->get('photos')) {
            return redirect()->back()->with('status', 'Зураг оруулна уу!');
        } else {
            if ($request->get('photos')) {
                $product->photos = serialize($request->get('photos'));
            }
        }
        $product->save();
        return redirect()->back()->with('status', 'Амжилттай хадгалагдлаа!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Product = Product::findOrFail($id);
        $Product->photos = unserialize($Product->photos);
        return \Response::json($Product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        $product = Product::findOrFail($id);
        $product->name = $request->get('name');
        $product->short_description = $request->get('short_description');
        $product->description = $request->get('content');
        $product->price = $request->get('price');
        $product->description = $request->get('content');
        $product->brand_id = $request->get('brand');
        if (!$request->get('photos')) {
            return redirect()->back()->with('status', 'Зураг оруулна уу!');
        } else {
            if ($request->get('photos')) {
                $product->photos = serialize($request->get('photos'));
            }
        }
        $product->updated_at = \Carbon\Carbon::now();
        $product->save();
        return \Response::json('Амжилттай хадгалагдлаа!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Product = Product::findOrFail($id);
        $Product->delete();
        return 'success';
    }

    public function addproduct()
    {
        $brands = Brand::get();
        return view('admin.add.product', [
            'brands' => $brands
        ]);
    }

    public function photoupload(Request $request)
    {
        $photo = $request->file('file');
        $path = 'img/uploads/'.md5(microtime()).'.'.$photo->getClientOriginalExtension();

        Image::make($photo)->fit(450, 450)->save(public_path($path));

        return response()->view('photo.photo', [
            'photo' => $path,
        ], 200);
    }

    public function photodestroy(Request $request)
    {
        $photo = $request->get('path');
        Storage::disk('public_path')->delete($photo);

        return response()->json([
            'success' => true,
        ], 200);
    }

    public function getProducts()
    {
        $product = Product::with('brand')->select(['id','name','price','brand_id', 'created_at', 'updated_at']);
        return Datatables::of($product)->editColumn('action', function ($data) {
            return '<a class="btn btn-simple btn-warning btn-icon edit"  onclick="openEdit('.$data->id.')"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-simple btn-danger btn-icon remove" onclick="deleteProduct('.$data->id.')"  ><i class="fa fa-times"></i></a>';
        })->make(true);
    }
}
