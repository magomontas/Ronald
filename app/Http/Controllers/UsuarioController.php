<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::orderBy('id', 'DESC')->paginate(10);
        return view('usuarios.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required',
            'email'=> 'required',
            'password' => 'required',
            'apellidos' => 'required'
        ]);

        $user = new User();
        $user->name = $request->get('nombre');
        $user->email = $request->get('email');
        $user->password = $request->get('password');
        $user->apellidos = $request->get('apellidos');
        $user->isAdmin = $request->get('isAdmin');

        $user->save();
        return redirect()->route('usuarios.index')->with('success', 'Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuarios= User::findOrFail($id);
        return view('usuarios.edit',compact('usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        $request->validate([
//            'nombre'=>'required',
//            'apellidos'=> 'required',
//        ]);

        $user = User::find($id);
        $user->name = $request->get('nombre');
        $user->email = $request->get('email');
        $user->password = $request->get('password');
        $user->apellidos = $request->get('apellidos');
        $user->isAdmin = $request->get('isAdmin');
        $user->save();

        return redirect()->route('usuarios.index')->with('success', 'Stock has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('usuarios.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
