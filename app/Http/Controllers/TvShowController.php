<?php

namespace App\Http\Controllers;

use App\TvShow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class TvShowController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
        return view('tvshow/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'season'       => 'required',
            'episode'      => 'required',
            'quote' => 'required'
        ]);

        $tvShow = new TvShow();
        $tvShow->episode = $request->get('episode');
        $tvShow->season = $request->get('season');
        $tvShow->quote = $request->get('quote');
        $tvShow->save();

        $user = Auth::user();
        $user->favouriteTvShows()->save($tvShow);

        return redirect('home');
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
        // get the nerd
        $tvShow = TvShow::find($id);

        // show the edit form and pass the nerd
        return view('tvshow/edit', [
            'tvShow' => $tvShow
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
        $request->validate([
            'season'       => 'required',
            'episode'      => 'required',
            'quote' => 'required'
        ]);

        $tvShow = TvShow::find($id);
        $tvShow->episode = $request->get('episode');
        $tvShow->season = $request->get('season');
        $tvShow->quote = $request->get('quote');
        $tvShow->save();

        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
        $tvShow = TvShow::find($id);
        $tvShow->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the nerd!');
        return Redirect::to('home');
    }
}
