<?php

namespace App\Http\Controllers;

use App\Http\Requests\CollectiveRequest;
use App\Models\Categorie;
use App\Models\Collective;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CollectiveController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth', 'verified'])->except('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $collectives = Collective::where('user_id', auth()->user()->id)
            ->latest()->paginate(10);

        return view('collectives.index')->with([
            'collectives' => $collectives
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
        $categories = Categorie::all();

        return view('collectives.create')->with([
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CollectiveRequest $request)
    {
        //
        $data = $request -> validated();
        $data['user_id'] =auth()->user()->id;
        $data['slug'] = Str::slug($request->titre);
        Collective::create($data);
        return redirect()->route('collectives.index')->with([
            'success' => 'Collective ajouté avec succès.'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collective  $collective
     * @return \Illuminate\Http\Response
     */
    public function show(Collective $collective)
    {
        //

        return view('collectives.show')->with([
            'collective' => $collective
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collective  $collective
     * @return \Illuminate\Http\Response
     */
    public function edit(Collective $collective)
    {
        //
        $categories = Categorie::all();

        return view('collectives.edit')->with([
            'categories' => $categories,
            'collective' => $collective
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Collective  $collective
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collective $collective)
    {
        //
        if($collective ->owner($collective->user_id)){
            $this->validate($request,[
                'titre' => 'required|unique:collectives,id,'.$collective->id,
                'description' => 'required',
                'category_id' => 'required|numeric'
            ]);
            $data = $request -> except('_token','_method');
            $data['user_id'] =auth()->user()->id;
            $data['slug'] = Str::slug($request->titre);
            $collective->update($data);
            return redirect()->route('collectives.index')->with([
                'success' => 'Collective mis à jour avec succès.'
            ]);
        }
        abort(403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collective  $collective
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collective $collective)
    {
        //
        if($collective ->owner($collective->user_id)){
            $collective->delete();
            return redirect()->route('collectives.index')->with([
                'success' => 'Collective supprimé avec succès.'
            ]);
        }
        abort(403);
    }
}
