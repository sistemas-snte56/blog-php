@extends('plantilla')
@section('content')
    <div class="content-wrapper" style="min-height: 733px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Administradores</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                            <li class="breadcrumb-item active">Administradores</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Default box -->
                        <div class="card card-warning card-outline">
                            <div class="card-header">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#crearAdministrador">Crear nuevo administrador</button>
                            </div>
                            <div class="card-body">

                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Apellido Paterno</th>
                                            <th scope="col">Apellido Materno</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Rol de Usuario</th>
                                            <th scope="col" width="15px">Imágen</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($administradores as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->name_ap }}</td>
                                                <td>{{ $item->name_am }}</td>
                                                <td>{{ $item['email'] }}</td>

                                                @php
                                                
                                                    if ($item->rol == "") {
                                                        echo '<td>administrador</td>';
                                                    } else {
                                                        echo '<td>'.$item->rol.'</td>';
                                                    }
                                                    
                                                    if ($item->foto == "") {
                                                        echo '
                                                            <td>
                                                                <img src=" '.url('/').'/img/administradores/default.png"
                                                                    class="img-fluid py-2 rounded-circle">
                                                            </td>                                                                                                               
                                                        ';
                                                    } else {
                                                        echo '
                                                        <td>
                                                            <img src=" '.url('/').'/'.$item->foto.'"
                                                                class="img-fluid py-2 rounded-circle">
                                                        </td>                                                    
                                                        ';
                                                    }                                                    

                                                @endphp


                                                
                                                {{-- @if ({{$item->rol}}=="")
                                                    <td>administrador</td>                                                
                                                @else
                                                    <td>{{ $item->rol }}</td>                                                    
                                                @endif --}}


                                                {{-- @if ({{ $item->foto }} == "")
                                                    <td>
                                                        <img src="{{ url('/') }}/img/administradores/default.png"
                                                            class="img-fluid py-2 rounded-circle">
                                                    </td>                                                    
                                                @else
                                                    <td>
                                                        <img src="{{ url('/') }}/{{ $item->foto }}"
                                                            class="img-fluid py-2 rounded-circle">
                                                    </td>                                                    
                                                @endif --}}




                                                <td>
                                                    <button class="btn btn-warning btn-sm"><i
                                                            class="fas fa-pencil-alt text-white"></i></button>
                                                    <button class="btn btn-danger btn-sm"><i
                                                            class="fas fa-trash-alt text-white"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- @foreach ($administradores as $item)
                                    {{$item}}
                                @endforeach --}}
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                Footer
                            </div>
                            <!-- /.card-footer-->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

    <!-- Modal Crear Administrador-->
    <div class="modal fade" id="crearAdministrador" tabindex="-1" role="dialog" aria-labelledby="crearAdministradorTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="modal-header bg-warning">
                        <h5 class="modal-title" id="exampleModalLongTitle">Nuevo Administrador</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        {{-- Nombre --}}
                        <div class="col-auto">
                            <label class="sr-only" for="inlineFormInputGroup">Nombre de Usuario</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                                </div>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nombre">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Apellido Paterno --}}
                        <div class="col-auto">
                            <label class="sr-only" for="inlineFormInputGroup">Apellido Paterno</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                                </div>
                                <input id="name_ap" type="text"
                                    class="form-control @error('name_ap') is-invalid @enderror" name="name_ap"
                                    value="{{ old('name_ap') }}" required autocomplete="name_ap" autofocus placeholder="Apellido Paterno">
        
                                @error('name_ap')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Apellido Materno --}}
                        <div class="col-auto">
                            <label class="sr-only" for="inlineFormInputGroup">Apellido Materno</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                                </div>
                                <input id="name_am" type="text"
                                    class="form-control @error('name_am') is-invalid @enderror" name="name_am"
                                    value="{{ old('name_am') }}" required autocomplete="name_am" autofocus placeholder="Apellido Materno">
        
                                @error('name_am')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Emial --}}
                        <div class="col-auto">
                            <label class="sr-only" for="inlineFormInputGroup">Correo Electrónico</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-envelope"></i></div>
                                </div>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" placeholder="Correo eletrónico">
        
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Password --}}
                        <div class="col-auto">
                            <label class="sr-only" for="inlineFormInputGroup">Contraseña</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-key"></i></div>
                                </div>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password" placeholder="Contraseña">
        
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Password --}}
                        <div class="col-auto">
                            <label class="sr-only" for="inlineFormInputGroup">Confirmar Contraseña</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-key"></i></div>
                                </div>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="Confirmar Password">
                            </div>
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
