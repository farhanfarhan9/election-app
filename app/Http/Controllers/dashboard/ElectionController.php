<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Election;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ElectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->email==='admin@admin.com'){
            $elections = Election::with('user')->get();
        }else{
            $elections = Election::with('user')->where('owner_id', auth()->id())->get();
        }
        return view('dashboard.admin.elections.index',['elections'=> $elections]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.elections.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => ['required', 'min:3', 'max:50'],
            'desc' => ['required', 'min:3', 'max:255'],
            'vote_start' => 'required',
            'vote_end' => 'required',
        ]);
        $validated['owner_id'] = auth()->id();
        $validated['election_code'] = str_split(mt_rand(), 6)[0];

        Election::create($validated);
        return redirect('/home/elections');
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
    public function edit(Election $election)
    {
        return view('dashboard.admin.elections.edit', compact('election'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Election $election)
    {
        $validated = $request->validate([
            'name'=>'required',
            'desc'=>'required',
            'vote_start'=>'required',
            'vote_end'=>'required',
        ]);

        $election->update($validated);
        return redirect('/home/elections');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Election $election)
    {
        $election->delete();
        return redirect('/home/elections');
    }
}
