<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Brand;
use App\Category;

class AdminBrandController extends Controller
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
        $categories = Category::get();
        return view('admin.brand', [
            'categories' => $categories
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
        $brand = new Brand;
        $brand->name = $request->get('name');
        $brand->description = $request->get('content');
        $brand->category_id = $request->get('category');
        $brand->save();
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
        $Brand = Brand::findOrFail($id);
        return \Response::json($Brand);
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
        $Brand = Brand::findOrFail($id);
        $Brand->name = $request->get('name');
        $Brand->description = $request->get('content');
        $Brand->category_id = $request->get('category');
        $Brand->updated_at = \Carbon\Carbon::now();
        $Brand->save();
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
        $Brand = Brand::findOrFail($id);
        $Brand->delete();
        return 'success';
    }

    public function getBrands()
    {
        $brand = Brand::with('category')->select(['id','name','description','category_id', 'created_at', 'updated_at']);
        return Datatables::of($brand)->editColumn('action', function ($data) {
            return '<a class="btn btn-simple btn-warning btn-icon edit"  onclick="openEdit('.$data->id.')"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-simple btn-danger btn-icon remove" onclick="deleteBrand('.$data->id.')"  ><i class="fa fa-times"></i></a>';
        })->make(true);
    }

    public function addbrand()
    {
        $categories = Category::get();
        return view('admin.add.brand', [
            'categories' => $categories
        ]);
    }
}
