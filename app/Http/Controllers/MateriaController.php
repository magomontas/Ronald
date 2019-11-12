<?php


namespace App\Http\Controllers;
use App\Materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $materia = DB::table('materias as m')
            ->join('clases as c', 'm.idclase', '=', 'c.idclase')
            ->join('users as u', 'm.idusuario', '=', 'u.id')
            ->select('m.idmateria','m.nombre','m.codigo','m.descripcion','c.nombre as Clase','u.name as Docente')
            ->paginate(10);
        return view('materia.index', ['materia' => $materia]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clases=DB::table('clases')->get();
        $users=DB::table('users')
            ->where('isAdmin','=', 1)
            ->get();
        return view('materia.create',['clases'=>$clases,'users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $materia = new Materia();
        $materia->nombre=$request->get('nombre');
        $materia->descripcion=$request->get('descripcion');
        $materia->codigo=$request->get('codigo');
        $materia->idclase = $request->get('idclase');
        $materia->idusuario = $request->get('id');


        $materia->save();
        return redirect()->route('materias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $materia=Materia::find($id);
//        return  view('materia.show',compact('materia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clases = DB::table('clases')
        ->get();

        $materia=Materia::find($id);
        return view('materia.edit',compact('materia','clases'));
//
//      return view("materias.edit", ["materia"=>Materia::findOrFail($id)]);
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
        $request->validate([
            'nombre'=>'required',
            'descripcion'=> 'required',
            'codigo' => 'required|max:8|min:5'
        ]);

        $materia = Materia::find($id);
        $materia->nombre = $request->get('nombre');
        $materia->descripcion = $request->get('descripcion');
        $materia->codigo = $request->get('codigo');
        $materia->idclase = $request->get('idclase');
        $materia->save();

        return redirect()->route('materias.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Materia::find($id)->delete();
        return redirect()->route('materias.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
