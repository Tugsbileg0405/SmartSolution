<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Slide;
use Yajra\Datatables\Datatables;
use CloudConvert;
use File;

class AdminSlideController extends Controller
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
        return view('admin.slide');
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
        $slide = new Slide;
        $slide->name = $request->get('name');
        $slide->title = $request->get('title');
        $slide->description = $request->get('description');
        $slide->file = $request->get('filePath');
        $slide->fileType = $request->get('fileType');
        $slide->isButton = $request->get('isButton');
        $slide->btnText = $request->get('btnText');
        $slide->btnLink = $request->get('btnLink');
        if (!$request->get('filePath')) {
            return redirect()->back()->with('status', 'Файл оруулна уу!');
        }
        $slide->save();
        return back()->with('success', 'Амжилттай хадгалагдлаа');
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
    }


    public function addslide()
    {
        return view('admin.add.slide');
    }


    public function getSlides()
    {
        $slides = Slide::select(['id','title', 'fileType', 'created_at', 'updated_at']);
        return Datatables::of($slides)->editColumn('action', function ($data) {
            return '<a class="btn btn-simple btn-warning btn-icon edit"  onclick="openEdit('.$data->id.')"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-simple btn-danger btn-icon remove" onclick="deleteSlide('.$data->id.')"  ><i class="fa fa-times"></i></a>';
        })->make(true);
    }

    public function imageUpload(Request $request)
    {
        $image = $request->file('file');
        $input['file'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/img/uploads');
        $image->move($destinationPath, $input['file']);
        return response()->json([
            'success' => true,
            'path' => 'img/uploads/'.$input['file'],
        ]);
    }

    public function videoUpload(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:mp4,avi,asf,mov,qt,avchd,flv,swf,mpg,mpeg,mpeg-4,wmv,divx,3gp|max:100000',
        ]);
        $videotmp = time();
        $video = $request->file('file');
        $input['file'] = $videotmp.'.'.$video->getClientOriginalExtension();
        $destinationPath = public_path('/videos');
        $video->move($destinationPath, $input['file']);
        if ($video->getClientOriginalExtension() != "mp4") {
            CloudConvert::file($destinationPath.'/'.$input['file'])->to('mp4');
            File::delete($destinationPath.'/'. $input['file']);
            $input['file'] = $videotmp.'.mp4';
        }
        return response()->json([
            'success' => true,
            'path' => 'videos/'.$input['file']
        ]);
    }
}
