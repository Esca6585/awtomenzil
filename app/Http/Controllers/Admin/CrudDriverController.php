<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Models\Driver;

class CrudDriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Driver::orderBy('id','DESC')->get();

        return view('admin.drivers.driver', compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.drivers.driverCreate');
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
            'ady' => 'required',
            'familiyasy' => 'required',
            'atasynyn_ady' => 'required',
            'tabel_belgisi' => 'required|unique:drivers',
            'doglan_guni' => 'required',
            'doglan_yeri' => 'required',
            'bilimi' => 'required',
            'pasport_belgisi' => 'required',
            'pasport_alynan_yeri' => 'required',
            'pasport_alynan_wagty' => 'required',
            'telefon_belgisi' => 'required',
            'yashayan_salgysy' => 'required',
            'suraty' => 'required',
            'user_id' => 'required',
        ]);
        
        if($request->hasFile('suraty')){
            $random = strtolower(md5(uniqid($request->suraty->getClientOriginalName())));
            $newName = $random.'.'.$request->suraty->getClientOriginalExtension();
                
            $path = 'uploads/drivers/'. $request->tabel_belgisi . '_' . $request->ady . '_' . $request->familiyasy  . '/';

            $request->suraty->move($path, $newName);

            $path .= $newName;
        }

        if(!Driver::where('tabel_belgisi', $request->tabel_belgisi)->exists()){
            Driver::create([
                'ady' => ucfirst($request->ady),
                'familiyasy' => ucfirst($request->familiyasy),
                'atasynyn_ady' => ucfirst($request->atasynyn_ady),
                'tabel_belgisi' => trim($request->tabel_belgisi),
                'doglan_guni' => $request->doglan_guni,
                'doglan_yeri' => $request->doglan_yeri,
                'bilimi' => strtolower($request->bilimi),
                'pasport_belgisi' => $request->pasport_belgisi,
                'pasport_alynan_yeri' => $request->pasport_alynan_yeri,
                'pasport_alynan_wagty' => $request->pasport_alynan_wagty,
                'telefon_belgisi' => $request->telefon_belgisi,
                'yashayan_salgysy' => $request->yashayan_salgysy,
                'suraty' => $path,
                'user_id' => $request->user_id,
            ]);

            return redirect()->route('admin.drivers.index')->withSuccess('Üstünlikli goşuldy');
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
        $driver = Driver::where('id',$id)->first();
        // dump($driver);
        return view('admin.drivers.driverShow', compact('driver'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $driver = Driver::where('id',$id)->first();
        
        return view('admin.drivers.driverEdit', compact('driver'));
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
        // dump($request);
        // dump($id);

        $request->validate([
            'ady' => 'required',
            'familiyasy' => 'required',
            'atasynyn_ady' => 'required',
            'tabel_belgisi' => 'required',
            'doglan_guni' => 'required',
            'doglan_yeri' => 'required',
            'bilimi' => 'required',
            'pasport_belgisi' => 'required',
            'pasport_alynan_yeri' => 'required',
            'pasport_alynan_wagty' => 'required',
            'telefon_belgisi' => 'required',
            'yashayan_salgysy' => 'required',
            'user_id' => 'required',
        ]);

        if(!Driver::where('tabel_belgisi', $request->tabel_belgisi)->where('id', '!=', $id)->exists()){
            if($request->hasFile('suraty')){
                $random = strtolower(md5(uniqid($request->suraty->getClientOriginalName())));
                $newName = $random.'.'.$request->suraty->getClientOriginalExtension();
                    
                $path = 'uploads/drivers/'. $request->tabel_belgisi . '_' . $request->ady . '_' . $request->familiyasy  . '/';

                $request->suraty->move($path, $newName);

                $path .= $newName;
                
                $driver = Driver::findOrFail($id);
                
                if(file_exists($driver->suraty)){
                    unlink($driver->suraty);
                }

                Driver::where('id',$id)->update([
                    'suraty' => $path
                ]);
            }

            Driver::where('id',$id)->update([
                'ady' => ucfirst($request->ady),
                'familiyasy' => ucfirst($request->familiyasy),
                'atasynyn_ady' => ucfirst($request->atasynyn_ady),
                'tabel_belgisi' => trim($request->tabel_belgisi),
                'doglan_guni' => $request->doglan_guni,
                'doglan_yeri' => $request->doglan_yeri,
                'bilimi' => strtolower($request->bilimi),
                'pasport_belgisi' => trim($request->pasport_belgisi),
                'pasport_alynan_yeri' => $request->pasport_alynan_yeri,
                'pasport_alynan_wagty' => $request->pasport_alynan_wagty,
                'telefon_belgisi' => $request->telefon_belgisi,
                'yashayan_salgysy' => $request->yashayan_salgysy,
                'user_id' => $request->user_id,
            ]);

            return redirect()->route('admin.drivers.index')->withSuccess('Üstünlikli üýtgedildi');
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
        $driver = Driver::findOrFail($id);

        Driver::where('id',$id)->delete();
        
        if(file_exists($driver->suraty)){
            unlink($driver->suraty);
        }

        return back()->withSuccess('Üstünlikli pozuldy');
    }
}
