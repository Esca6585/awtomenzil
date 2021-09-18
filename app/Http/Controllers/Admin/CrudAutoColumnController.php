<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Autocolumn;
use App\Models\Driver;
use App\Models\Car;

class CrudAutoColumnController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->autocolumn_id == 12345){
            $autocolumns = Autocolumn::orderBy('id','DESC')->get();;
        } else {
            $autocolumns = Autocolumn::where('autocolumn_id', '=', Auth::user()->autocolumn_id )->orderBy('id','DESC')->get();
        }

        return view('admin.autocolumns.autocolumns', compact('autocolumns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->autocolumn_id == 12345){
            return back()->withErrors(array('errors' => 'Siziň mümkinçiligiňiz ýok'));
        }

        $drivers = Driver::get();
        $cars = Car::get();

        return view('admin.autocolumns.autocolumnsCreate', compact('drivers', 'cars'));
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
        if(Auth::user()->autocolumn_id == 12345){
            return back()->withErrors(array('errors' => 'Siziň mümkinçiligiňiz ýok'));
        }

        $checkValidate = $request->validate([
            'driver_ids' => 'required',
            'car_id' => 'required',
            'autocolumn_id' => 'required',
        ]);
        
        if($checkValidate){
            foreach($request->driver_ids as $driver_id){
                Autocolumn::create([
                    'driver_id' => $driver_id,
                    'car_id' => $request->car_id,
                    'autocolumn_id' => $request->autocolumn_id,
                ]);
            }
            return redirect()->route('admin.autocolumn.index')->withSuccess('Üstünlikli goşuldy');
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
    public function show(Autocolumn $autocolumn)
    {   
        return view('admin.autocolumns.autocolumnsShow', compact('autocolumn'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Autocolumn $autocolumn)
    {
        // dump($id);
        if(Auth::user()->autocolumn_id == 12345){
            return back()->withErrors(array('errors' => 'Siziň mümkinçiligiňiz ýok'));
        }

        $drivers = Driver::where('id', '!=', $autocolumn->driver_id )->get();
        $cars = Car::where('id', '!=', $autocolumn->car_id )->get();

        return view('admin.autocolumns.autocolumnsEdit', compact('autocolumn', 'drivers', 'cars'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Autocolumn $autocolumn)
    {
        if(Auth::user()->autocolumn_id == 12345){
            return back()->withErrors(array('errors' => 'Siziň mümkinçiligiňiz ýok'));
        }

        $checkValidate = $request->validate([
            'driver_id' => 'required',
            'car_id' => 'required',
            'autocolumn_id' => 'nullable|integer|max:7'
        ]);
        
        if($checkValidate){
            $autocolumn->update($request->all());

            return redirect()->route('admin.autocolumn.index')->withSuccess('Üstünlikli üýtgedildi');
        } else {
            return back()->withErrors('errors');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->autocolumn_id == 12345){
            return back()->withErrors(array('errors' => 'Siziň mümkinçiligiňiz ýok'));
        }
        
        Autocolumn::where('id',$id)->delete();
        return back()->withSuccess('Üstünlikli pozuldy');
    }
}
