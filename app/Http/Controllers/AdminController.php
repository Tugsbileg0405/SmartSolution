<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Subscriber;
use Mail;
use App\Mail\MailToSubscriber;
use App\Jobs\SendSubscriberMail;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
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

    public function mail()
    {
        return view('admin.email');
    }

    public function sendmail(Request $request)
    {
        $title = $request->get('title');
        $description = $request->get('description');
        $subscribers = Subscriber::where('is_subscribered', 1)->get();
        $emails = Subscriber::where('is_subscribered', 1)->get()->pluck('email')->toArray();
        if (!$subscribers->isEmpty()) {
            dispatch(new SendSubscriberMail($emails, $title, $description));
        }
        return redirect()->back()->with('status', 'Амжилттай илгээлээ !');
    }
}
