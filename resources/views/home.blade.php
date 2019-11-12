@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($materias as $mat)
                <div class="col-md-4">
                    <div class="card-deck">
                        <div class="card">
                            <img src="{{ asset('img/game.png') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><a href="">{{ $mat->nombre }}</a></h5>
                                <p class="card-text">{{ $mat->descripcion }}</p>
                                <p class="card-text"><small class="text-muted">{{ $mat->Docente .', '. $mat->apellidos }}</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $materias->render() }}
    </div>
@endsection
