@extends('layouts.admin')

@section('content')

    <div class="col-md-8">

        <h3>Listado de Usuarios <a href="usuarios/create">
                <button class="btn btn-success">Nuevo</button>
            </a></h3>
        <table id="mytable" class="table table-bordred table-striped">
            <thead>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Codigo</th>
            <th>Nivel</th>
            <th colspan="2" class="text-center">Opciones</th>
            </thead>
            <tbody>
            @if($user->count())
                @foreach($user as $us)
                    <tr>
                        <td>{{$us->name}}</td>
                        <td>{{$us->email}}</td>
                        <td>{{$us->apellidos}}</td>
                        <td>{{$us->isAdmin}}</td>
                        <td>
                            <a href="{{ URL::action('UsuarioController@edit',$us->id) }}"><button class="btn btn-info">Editar</button></a>
                            <a href="#"><button class="btn btn-success">Añadir a una clase</button></a></td>
                        <td>
                            <form action="{{action('UsuarioController@destroy', $us->id)}}" method="post">
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
