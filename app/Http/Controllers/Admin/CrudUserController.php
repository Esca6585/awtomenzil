<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;


class CrudUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('CheckIfSuperAdmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id','DESC')->get();

        return view('admin.users.user', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.userCreate');
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
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|password|min:5|max:15',
            'confirm_password' => 'required|same:password',
            'autocolumn_id' => 'required',
        ]);
            
        // dump($request);

        
        if(!User::where('email', $request->email)->exists()){
            if($request->hasFile('image')){
                $random = strtolower(md5(uniqid($request->image->getClientOriginalName())));
                $newName = $random.'.'.$request->image->getClientOriginalExtension();
                    
                $path = 'uploads/users/'. $request->name . '_' . $request->surname . '_' . $request->autocolumn_id  . '-AwtoToplum/';
    
                $request->image->move($path, $newName);
    
                $path .= $newName;
                
                User::create([
                    'name' => ucfirst($request->name),
                    'surname' => ucfirst($request->surname),
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'autocolumn_id' => $request->autocolumn_id,
                    'image' => $path,
                ]);
            }

            return redirect()->route('admin.users.index')->withSuccess('Üstünlikli goşuldy');
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
        $user = User::findOrFail($id);

        return view('admin.users.userShow', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.userEdit', compact('user'));
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
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'autocolumn_id' => 'required',
        ]);
        
        if(!User::where('email', $request->email)->where('id', '!=', $id)->exists()){
            if($request->hasFile('image')){
                $random = strtolower(md5(uniqid($request->image->getClientOriginalName())));
                $newName = $random.'.'.$request->image->getClientOriginalExtension();
                    
                $path = 'uploads/users/'. $request->name . '_' . $request->surname . '_' . $request->autocolumn_id  . '-AwtoToplum/';

                $request->image->move($path, $newName);

                $path .= $newName;
                
                $user = User::findOrFail($id);

                if(file_exists($user->suraty)){
                    unlink($user->suraty);
                }

                User::where('id',$id)->update([
                    'image' => $path
                ]);
            }

            User::where('id',$id)->update([
                'name' => ucfirst($request->name),
                'surname' => ucfirst($request->surname),
                'email' => $request->email,
                'autocolumn_id' => $request->autocolumn_id,
            ]);

            return redirect()->route('admin.users.index')->withSuccess('Üstünlikli üýtgedildi');
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
        $user = User::where('id',$id)->where('id','!=',Auth::user()->id)->first();

        if($user == null){
            return back()->withErrors(array('errors' => 'Siziň Super Admini ulanyjydan pozmaga mümkinçiligiňiz ýok'));
        } else {
            User::where('id',$id)->delete();

            if(file_exists($user->image)){
                unlink($user->image);
            }

            return back()->withSuccess('Üstünlikli pozuldy');
        }
    }
}
