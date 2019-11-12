<?php

namespace App\Http\Controllers;

use App\Clase;
use Illuminate\Http\Request;

class ClasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $clases = Clase::orderBy('idclase', 'DESC')
                ->where('nombre', 'LIKE', '%' . $query . '%')
                ->paginate(10);

            return view('clases.index', ['clases' => $clases, 'searchText' => $query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clases.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clase = new Clase();
        $clase->nombre = $request->get('nombre');


        $clase->save();
        return redirect()->route('clases.index');
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
        $clases= Clase::findOrFail($id);
        return view('clases.edit',compact('clases'));
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
        $clases = Clase::find($id);
        $clases->nombre = $request->get('nombre');
        $clases->tareas = $request->get('tareas');
        $clases->save();

        return redirect()->route('clases.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Clase::find($id)->delete();
        return redirect()->route('clases.index');
        //
    }
}
