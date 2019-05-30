<?php

namespace App\Http\Controllers;

use App\Dream;
use Illuminate\Http\Request;

class DreamController extends Controller
{
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Dream::where('slug', '=', $id)->firstOrFail();
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
