@extends('layouts.admin')

@section('content')

    <div class="col-md-8">

        <h3>Listado de Materias <a href="materias/create">
                <button class="btn btn-success">Nuevo</button>
            </a></h3>
        <table id="mytable" class="table table-bordred table-striped">
            <thead>
            <th>Nombre Materia</th>
            <th>Descripcion</th>
            <th>Codigo</th>
            <th>Clase</th>
            <th>Docente</th>
            <th colspan="2" class="text-center">Opciones</th>
            </thead>
            <tbody>
            @if($materia->count())
                @foreach($materia as $mat)
                    <tr>
                        <td>{{$mat->nombre}}</td>
                        <td>{{$mat->descripcion}}</td>
                        <td>{{$mat->codigo}}</td>
                        <td>{{$mat->Clase}}</td>
                        <td>{{$mat->Docente}}</td>
                        <td>
                            <a href="{{ URL::action('MateriaController@edit',$mat->idmateria) }}"><button class="btn btn-info">Editar</button></a></td>
                        <td>
                            <form action="{{action('MateriaController@destroy', $mat->idmateria)}}" method="post">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="DELETE">

                                <button class="btn btn-danger" type="submit"><span
                                        class="glyphicon glyphicon-trash"></span>Borrar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="8">No hay registro !!</td>
                </tr>
            @endif
            </tbody>

        </table>

    </div>


@endsection
