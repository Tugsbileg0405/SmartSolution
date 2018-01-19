<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Category;

class AdminCategoryController extends Controller
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
        return view('admin.category');
    }


    public function getCats()
    {
        $category = Category::select(['id','name', 'created_at', 'updated_at']);
        return Datatables::of($category)->editColumn('action', function ($data) {
                return '<a class="btn btn-simple btn-warning btn-icon edit"  onclick="openEdit('.$data->id.')"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-simple btn-danger btn-icon remove" onclick="deleteCat('.$data->id.')"  ><i class="fa fa-times"></i></a>';
        })->make(true);
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
        $category = new Category;
        $category->name = $request->get('name');
        $category->save();
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
        $category = Category::findOrFail($id);
        return \Response::json($category);
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
        $category = Category::findOrFail($id);
        $category->name = $request->get('name');
        $category->updated_at = \Carbon\Carbon::now();
        $category->save();
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
        $Category = Category::findOrFail($id);
        $Category->delete();
        return 'success';
    }

    public function addcategory()
    {
        return view('admin.add.category');
    }
}
