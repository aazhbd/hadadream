<?php

namespace App\Http\Controllers;

use App\Dream;
use App\Post;
use App\Viewer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class DreamController extends Controller
{
    public function __construct()
    {
        $populars = Dream::orderBy('views')->get();
        View::share ( 'populars', $populars);

        $randoms = Dream::inRandomOrder()->get();
        View::share ( 'randoms', $randoms);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'dreamer' => 'required',
            'agree' => 'required'
        ]);

        $dream = new Dream;

        $dream->title = request('title');

        if (request('isanonymnous') ) {
            $dream->dreamer = 'Anonymnous';
        } else {
            $dream->dreamer = request('dreamer');
        }

        $dream->slug = str_replace(' ', '-', trim(request('title')));
        $dream->body = request('body');
        $dream->views = 0;
        $dream->ordering = 1;

        $dream->save();

        $request->session()->flash('status', 'Dream successfully added!');

        return redirect('/');
    }

    function getUserIP()
    {
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }

        return $ip;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Dream::where('slug', '=', $id)->firstOrFail();

        try {
            $viewer = new Viewer;
            $viewer->ipaddress = $this->getUserIP();
            $viewer->useragent = $_SERVER['HTTP_USER_AGENT'];
            $viewer->save();

            $post->views = $post->views + 1;
            $post->save();
        } catch(\Exception $ex) {
            // view count doesn't get incremented for duplicate ip
        }

        return view('post', compact('post'));
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
}
