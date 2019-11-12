@extends('layouts.admin')

@section('content')
    <div class="md-12 mb-5">
        {!! Form::open(['route'=>'clases', 'method' => 'GET','autocomplete'=>'off','role'=>'search','class' => 'form-control bg-light border-0 small', 'placeholder'=> 'Nombre de la materia']) !!}
        <div class="input-group">
            <input type="text" name="searchText" value="{{ $searchText }}"
                   aria-label="Search" aria-describedby="basic-addon2" placeholder="Nombre de la materia">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
        {{ Form::close() }}
    </div>

    <div class="col-md-8">

        <h3>Listado de Clases <a href="clases/create">
                <button class="btn btn-success">Nueva</button>
            </a></h3>
        <table id="mytable" class="table table-bordred table-striped">
            <thead>
            <th>Nombre</th>
            <th>Alumnos</th>
            <th>Tareas</th>
            <th colspan="2" class="text-center">Opciones</th>
            </thead>
            <tbody>
            @if($clases->count())
                @foreach($clases as $cs)
                    <tr>
                        <td>{{$cs->nombre}}</td>
                        <td></td>
                        <td>{{$cs->tareas}}</td>
                        <td></td>
                        <td>
                            <a href="{{ URL::action('ClasesController@edit',$cs->idclase) }}">
                                <button class="btn btn-info">Editar</button>
                            </a>
                            <a href="#" data-toggle="modal" data-target="#exampleModalLong">
                                <button class="btn btn-warning">Agregar Alumnos</button>
                            </a>
                        </td>
                        <td>
                            <form action="{{action('ClasesController@destroy', $cs->idclase)}}" method="post">
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


    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Lista de Alumnos en el sistema</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-outline-primary">Agregar</button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $('#myModal').on('shown.bs.modal', function () {
                $('#myInput').trigger('focus')
            })
        </script>
    @endpush
@endsection
