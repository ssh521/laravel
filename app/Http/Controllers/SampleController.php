<?php

namespace App\Http\Controllers;

use App\Models\sample;
use Doctrine\DBAL\Schema\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $samples = Sample::latest()->paginate(5);
        return view("samples.index", compact("samples"))
            ->with("i", (request()->input('page', 1) - 1) * 5);
        ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('samples.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'detail'=> 'required',
        ]);

        $sample = Sample::create($request->except(['_token']));

        return redirect()->route('samples.index')->with('success','저장되었습니다.!!');
    }



    /**
     * Display the specified resource.
     */
    public function show(Sample $sample)
    {
        return view('samples.show', compact('sample'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sample $sample)
    {
        return view('samples.edit', compact('sample'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, sample $sample) : RedirectResponse
    {
        $request->validate([
            'name'  => 'required',
            'detail'    => 'required',  
        ]);

        $sample->update($request->except(['_token', '_method']));

        return redirect()->route('samples.index')->with('success','수정되었습니다.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sample $sample) : RedirectResponse
    {
        $sample->delete();

        return redirect()->route('samples.index')->with('success','삭제되었습니다.');
    }
}
