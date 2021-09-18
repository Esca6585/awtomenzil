<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Job;

class CrudSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Job::where('parent_id', null)->orderBy('id', 'desc')->get();
        
        return view('admin.sections.section', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = Job::where('parent_id', null)->orderBy('id', 'desc')->get();
        
        return view('admin.sections.sectionCreate', compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dump($request);
        
        $request->validate([
            'name' => 'required',
        ]);
            
        Job::create([
            'name' => ucfirst($request->name),
        ]);
            
        return redirect()->route('admin.sections.index')->withSuccess('Üstünlikli goşuldy');
        
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
        $section = Job::where('id', $id)->first();

        return view('admin.sections.sectionEdit', compact('section'));
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
            'name' => 'required',
        ]);
            
        Job::findOrFail($id)->update([
            'name' => ucfirst($request->name),
        ]);
            
        return redirect()->route('admin.sections.index')->withSuccess('Üstünlikli üýtgedildi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Job::findOrFail($id)->delete();

        return back()->withSuccess('Üstünlikli pozuldy');
    }

}
