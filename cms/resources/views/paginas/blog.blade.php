@extends('plantilla')
@section('content')
    <div class="content-wrapper" style="min-height: 733px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Blog</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>
                            <li class="breadcrumb-item active">Blog</li>
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
                                <button class="btn btn-primary float-left">Guardar cambios</button>
                            </div>
                            <div class="card-body">
                               @foreach ($blog as $item)
                                   <!-- {{ $item}} -->
                               @endforeach
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="card">
                                            <div class="card-body">
                                                <!-- Dominio -->
                                                <div class="input-group mb-3">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Dominio</span>
                                                    </div>
                                                        <input type="text" class="form-control" name="dominio" value="{{$item->dominio}}">
                                                </div>

                                                <!-- Servidor -->
                                                <div class="input-group mb-3">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Servidor</span>
                                                    </div>
                                                        <input type="text" class="form-control" name="servidor" value="{{$item->servidor}}">
                                                </div>

                                                <!-- Título -->
                                                <div class="input-group mb-3">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Título</span>
                                                    </div>
                                                        <input type="text" class="form-control" name="titulo" value="{{$item->titulo}}">
                                                </div>

                                                <!-- Descripción -->
                                                <div class="input-group mb-3">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Descripción</span>
                                                    </div>
                                                        <textarea name="descripcion" id="descripcion" cols="30" rows="8" class="form-control">
                                                            {{$item->descripcion}}
                                                        </textarea>
                                                </div>
                                                <hr class="pb-2">

                                                <!-- Palabras Claves -->
                                                <div class="form-group mb-3">
                                                    <label for="palabras-claves">Palabras claves</label>

                                                    <?php
                                                        $tags = json_decode($item->palabras_claves, true);

                                                        $palabras_claves = " ";
                                                        foreach ($tags as $key => $value)
                                                            $palabras_claves .= $value.", ";
                                                    ?>
                                                    
                                                    <input type="text" class="form-control" name="palabras_claves" value="{{$palabras_claves}}" required>

                                                </div>

                                                <hr class="pb-2">

                                                <!-- Redes sociales -->
                                                <div class="form-group mb-3">
                                                    <label for="redes_sociales">Redes sociales</label>
                                                    <div class="row">
                                                        <div class="col-5">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">Icono</span>
                                                                </div>
                                                                <select name="icono_red" id="icono_red" class="form-control">
                                                                    <option value="fab fa-facebook, #1475E0">Facebook</option>
                                                                    <option value="fab fa-twitter, #00A6FF">Twitter</option>
                                                                    <option value="fab fa-instagram, #B18768">Instagram</option>
                                                                    <option value="fab fa-youtube, #F95F62">Youtube</option>
                                                                </select>
                                                            </div>
                                                        </div><!-- Fin col-5 -->
                                                        <div class="col-5">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">url</span>
                                                                </div>
                                                                <input type="text" class="form-control" id="url_red">
                                                            </div>
                                                        </div><!-- Fin col-5 -->
                                                        <div class="col-2">
                                                            <button class="btn btn-primary w-100 agregarRed">Agregar</button>
                                                        </div><!-- Fin col-2 -->
                                                    </div><!-- Fin row -->
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <div class="input group-text" style="background:#1475E0">
                                                                        <i class="fab fa-facebook"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="text" class="form-control" value="https://www.facebook.com">
                                                            </div>
                                                        </div>

                                                    </div><!-- Fin row -->
                                                </div><!-- Fin Redes Sociales -->
                                            </div><!-- Fin card-body -->
                                        </div>
                                    </div><!-- Fin col-lg-7 -->
                                    <div class="col-lg-5">
                                        <div class="card">
                                            <div class="card-body">
                                                hola
                                            </div>
                                        </div>
                                    </div><!-- Fin col-lg-5 -->
                                </div>
                            </div><!-- /.card-body -->
                            <div class="card-footer">
                                Footer
                            </div><!-- /.card-footer-->
                        </div><!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>   
@endsection