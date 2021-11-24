<?php

namespace App\Http\Controllers;

use App\Models\Rombel;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class RombelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rombels = Rombel::get();

        return view('dashboard.rombel', compact('rombels'));
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
        ]);

        $attr['slug'] = SlugService::createSlug(Rombel::class, 'slug', $request->name);
        
        Rombel::create($attr);

        return back()->with('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rombel  $rombel
     * @return \Illuminate\Http\Response
     */
    public function show(Rombel $rombel)
    {
        $students = $rombel->students()->get();
        
        return view('dashboard.groupStudent.students', compact('students', 'rombel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rombel  $rombel
     * @return \Illuminate\Http\Response
     */
    public function edit(Rombel $rombel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rombel  $rombel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rombel $rombel)
    {
        $attr = $request->validate([
            'name' => 'required|min:3',
        ]);

        $attr['slug'] = SlugService::createSlug(Rombel::class, 'slug', $request->name);
        
        $rombel->update($attr);

        return back()->with('success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rombel  $rombel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rombel $rombel)
    {
        $rombel->delete();
        return back()->with('success');
    }
}
