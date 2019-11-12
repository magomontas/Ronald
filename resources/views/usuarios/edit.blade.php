@extends('layouts.admin')

@section('content')
    <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Error!</strong> Revise los campos obligatorios.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-info">
                        {{Session::get('success')}}
                    </div>
                @endif
            </div>

            <div class="col-md-8">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                            <div class="col-lg-7">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Editar Usuario!</h1>
                                    </div>
                                    <form method="POST" action="{{ route('usuarios.update', $usuarios->id) }}" role="form">
                                        @method('PATCH')
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user"
                                                       placeholder="Nombre" name="nombre" value="{{ $usuarios->name }}">
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user"
                                                       placeholder="Apellidos" name="apellidos" value="{{ $usuarios->apellidos }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user"
                                                       placeholder="Correo Electronico" name="email" value="{{ $usuarios->email }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user"
                                                       placeholder="Contraseña" name="password" value="{{ $usuarios->password }}">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-user"
                                                       placeholder="Nivel de usuario"
                                                       name="isAdmin" value="{{ $usuarios->isAdmin }}">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Registrar Materia
                                        </button>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection
