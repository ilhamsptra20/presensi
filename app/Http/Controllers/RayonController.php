<?php

namespace App\Http\Controllers;

use App\Models\Rayon;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class RayonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rayons = Rayon::get();

        return view('dashboard.rayon', compact('rayons'));
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
        $attr = $request->validate([
            'name' => 'required|min:3',
            'mentor' => 'required|min:3',
        ]);

        $attr['slug'] = SlugService::createSlug(Rayon::class, 'slug', $request->name);
        
        Rayon::create($attr);

        return back()->with('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rayon  $rayon
     * @return \Illuminate\Http\Response
     */
    public function show(Rayon $rayon)
    {
        $students = $rayon->students()->get();
        
        return view('dashboard.rayon', compact('students', 'rayon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rayon  $rayon
     * @return \Illuminate\Http\Response
     */
    public function edit(Rayon $rayon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rayon  $rayon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rayon $rayon)
    {
        $attr = $request->validate([
            'name' => 'required|min:3',
            'mentor' => 'required|min:3',
        ]);

        $attr['slug'] = SlugService::createSlug(Rayon::class, 'slug', $request->name);
        
        $rayon->update($attr);

        return back()->with('success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rayon  $rayon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rayon $rayon)
    {
        $rayon->delete();
        return back()->with('success');
    }
}
