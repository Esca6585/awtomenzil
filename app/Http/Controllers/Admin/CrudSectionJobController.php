<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Job;

class CrudSectionJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // return 1;

        $section = Job::findOrFail($request->id);

        // dump($section);s

        return view('admin.sectionJobs.sectionJobCreate', compact('section'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $checkValidate = $request->validate([
            'name' => 'required',
            'parent_id' => 'required',
        ]);

        if($checkValidate){
            Job::create([
                'name' => ucfirst($request->name),
                'parent_id' => $request->parent_id,
            ]);
                
            return redirect()->route('admin.sectionJobs.show', $request->parent_id)->withSuccess('Üstünlikli goşuldy');
        } else {
                return back()->withErrors('errors');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sectionJobs = Job::where('parent_id', $id)->get();
        $section = Job::findOrFail($id);
  
        return view('admin.sectionJobs.sectionJobShow',compact('sectionJobs', 'section'));
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
