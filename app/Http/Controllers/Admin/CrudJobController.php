<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Job;

class CrudJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::where('parent_id', '!=', null)->orderBy('id','DESC')->get();;
        
        return view('admin.jobs.job', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $jobs = Job::where('parent_id',null)->get();
        
        return view('admin.jobs.jobCreate', compact('jobs'));
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
            'parent_id' => 'required',
        ]);

        Job::create([
            'name' => ucfirst($request->name),
            'parent_id' => $request->parent_id,
        ]);
        
        return redirect()->route('admin.jobs.index')->withSuccess('Üstünlikli goşuldy');
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
        $job = Job::findOrFail($id);
        
        $sections = Job::where('parent_id', null)->where('id', '!=',$job->parent->id)->get();

        return view('admin.jobs.jobEdit', compact('job', 'sections'));
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
            'parent_id' => 'required',
        ]);

        Job::findOrFail($id)->update([
            'name' => ucfirst($request->name),
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->route('admin.jobs.index')->withSuccess('Üstünlikli üýtgedildi');
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
