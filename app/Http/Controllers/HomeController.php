<?php

namespace App\Http\Controllers;

use App\Clase;
use Illuminate\Http\Request,DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $materias = DB::table('materias as m')
            ->join('clases as c', 'm.idclase', '=', 'c.idclase')
            ->join('users as u', 'm.idusuario', '=', 'u.id')
            ->select('m.idmateria','m.nombre','m.codigo','m.descripcion','c.nombre as Clase','u.name as Docente', 'u.apellidos')
            ->paginate(10);

            return view('home', ['materias' => $materias]);
    }
}
