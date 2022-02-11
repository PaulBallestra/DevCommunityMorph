<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserprofilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
        //
        $user = User::find($id);

        return view('editprofil', compact('user'));
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
        //dd($request->request);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required',
            'photo' => '|mimes:jpg,png,jpeg|max:5048',
        ]);

        //VALIDATE PASSWORD = CONFIRM PASSWORD

        //VALIDATE EMAIL EXISTE DEJA OU PAS


        if (!$request->photo)
        {
            $user = User::find($id);
            $user->update([
                'name' => $request->input('name'),
                'bio' => $request->input('bio'),
                'email' => $request->input('email'),
            ]);

            User::where('id', Auth::user()->id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
            return redirect()->route('profil')->withMessage('Votre profil à été mis à jour');
        }

        $newImageName  = time() . '-' . $request->name . '.' .
            $request ->photo->extension();
        $request->photo->move(public_path('imgs'), $newImageName);

        $user = User::find($id);
        $user->update([
            'name' => $request->input('name'),
            'bio' => $request->input('bio'),
            'email' => $request->input('email'),
            'photo' => $newImageName,
        ]);
        /*
            if($request->password){
                $user->update([
                    'name' => $request->input('name'),
                    'bio' => $request->input('bio'),
                    'email' => $request->input('email'),
                    'photo' => $newImageName,
                    'password' => $request->input('password')
                ]);
            }else{
                $user->update([
                    'name' => $request->input('name'),
                    'bio' => $request->input('bio'),
                    'email' => $request->input('email'),
                    'photo' => $newImageName,
                ]);
            }
        */
        return redirect()->route('profil', $user)->withMessage('Votre profil à été mis à jour');
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
