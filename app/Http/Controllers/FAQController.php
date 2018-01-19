<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Faq;

class FAQController extends Controller
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
        return view('admin.faq');
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
        $faq = new Faq;
        $faq->answer = $request->get('answer');
        $faq->question = $request->get('question');
        $faq->save();
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
        $Faq = Faq::findOrFail($id);
        return \Response::json($Faq);
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
        $Faq = Faq::findOrFail($id);
        $Faq->answer = $request->get('answer');
        $Faq->question = $request->get('question');
        $Faq->updated_at = \Carbon\Carbon::now();
        $Faq->save();
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
        $Faq = Faq::findOrFail($id);
        $Faq->delete();
        return 'success';
    }

    public function getFaqs()
    {
        $faq = Faq::select(['id','question','answer', 'created_at', 'updated_at']);
        return Datatables::of($faq)
        ->editColumn('action', function ($data) {
            return '<a class="btn btn-simple btn-warning btn-icon edit"  onclick="openEdit('.$data->id.')"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-simple btn-danger btn-icon remove" onclick="deleteFaq('.$data->id.')"  ><i class="fa fa-times"></i></a>';
        })
        ->rawColumns(['answer','action'])
        ->make(true);
    }

    public function addfaq()
    {
        return view('admin.add.faq');
    }
}
