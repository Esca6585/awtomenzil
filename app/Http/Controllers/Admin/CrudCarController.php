<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Car;

class CrudCarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::orderBy('id','DESC')->get();

        return view('admin.cars.car', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cars.carCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'awtoulagyn_kysymy' => 'required',
            'awtoulagyn_gornushi' => 'nullable',
            'awtoulogyn_shahsy_belgisi' => 'required|unique:cars',
            'cykan_yyly' => 'required',
            'win_kody' => 'required|unique:cars',
            'user_id' => 'required',
        ]);

        
        if(Car::where('awtoulogyn_shahsy_belgisi', $request->awtoulogyn_shahsy_belgisi)->where('win_kody', $request->win_kody)->doesntExist()){
            Car::create([
                'awtoulagyn_kysymy' => ucfirst($request->awtoulagyn_kysymy),
                'awtoulagyn_gornushi' => ucfirst($request->awtoulagyn_gornushi),
                'awtoulogyn_shahsy_belgisi' => $request->awtoulogyn_shahsy_belgisi,
                'cykan_yyly' => $request->cykan_yyly,
                'win_kody' => strtoupper($request->win_kody),
                'user_id' => $request->user_id,
            ]);
            return redirect()->route('admin.cars.index')->withSuccess('Üstünlikli goşuldy');
        }

        return back()->withErrors('errors');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::where('id',$id)->first();
        
        return view('admin.cars.carShow', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::where('id',$id)->first();
        
        return view('admin.cars.carEdit', compact('car'));
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
            'awtoulagyn_kysymy' => 'required',
            'awtoulagyn_gornushi' => 'nullable',
            'awtoulogyn_shahsy_belgisi' => 'required',
            'cykan_yyly' => 'required',
            'win_kody' => 'required',
            'user_id' => 'required',
        ]);
        
        if(!Car::where('awtoulogyn_shahsy_belgisi', $request->awtoulogyn_shahsy_belgisi)->where('win_kody', $request->win_kody)->where('id', '!=', $id)->exists()){
            Car::where('id',$id)->update([
                'awtoulagyn_kysymy' => ucfirst($request->awtoulagyn_kysymy),
                'awtoulagyn_gornushi' => ucfirst($request->awtoulagyn_gornushi),
                'awtoulogyn_shahsy_belgisi' => $request->awtoulogyn_shahsy_belgisi,
                'cykan_yyly' => $request->cykan_yyly,
                'win_kody' => strtoupper($request->win_kody),
            ]);

            return redirect()->route('admin.cars.index')->withSuccess('Üstünlikli üýgedildi');
        }

        return back()->withErrors('errors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Car::where('id',$id)->delete();
        return back()->withSuccess('Üstünlikli pozuldy');
    }
}
