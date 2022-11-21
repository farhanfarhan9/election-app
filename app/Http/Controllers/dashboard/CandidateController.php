<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Election;
use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = Candidate::with('election')->get();
        return view('dashboard.admin.candidates.index', compact('candidates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->email==='admin@admin.com'){
            $elections = Election::get();
        }else{
            $elections = Election::where('owner_id', auth()->id())->get();
        }
        return view('dashboard.admin.candidates.create', compact('elections'));
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
            'picture' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'election_id'=>['required']
        ]);

        if($request->file('picture')){
            $validated['picture'] = $request->file('picture')->storeAs('candidates', time().'.'.$request->picture->extension() ,'public');
        }

        Candidate::create($validated);
        return redirect('/home/candidates');
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
    public function edit(Candidate $candidate)
    {
        if(Auth::user()->email==='admin@admin.com'){
            $elections = Election::get();
        }else{
            $elections = Election::where('owner_id', auth()->id())->get();
        }
        return view('dashboard.admin.candidates.edit', ['candidate'=>$candidate, 'elections'=>$elections]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidate $candidate)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => ['required', 'min:3', 'max:50'],
            'desc' => ['required', 'min:3', 'max:255'],
            'election_id'=>['required']
        ]);

        if($request->file('picture')){
            $validated['picture'] = $request->file('picture')->storeAs('candidates', time().'.'.$request->picture->extension() ,'public');
        }

        $candidate->update($validated);
        return redirect('home/candidates');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate)
    {
        $candidate->delete();
        return redirect('/home/candidates');
    }
}
