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
                        @foreach ($blog as $item)
                            <!-- {{ $item}} -->
                        @endforeach
                        {{-- Inicia tag form --}}
                        <form action="{{url('/')}}/blog/{{$item->id}}" method="post" enctype= multipart/form-data>
                            @method('PUT')
                            @csrf
                            <!-- Default box -->
                            <div class="card card-warning card-outline">
                                <div class="card-header">
                                    <button type="submit" class="btn btn-primary float-left">Guardar cambios</button>
                                </div><!-- /.card-header -->
                                <div class="card-body">
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
                                                        
                                                        <input type="text" class="form-control" name="palabras_claves" value="{{$palabras_claves}}" data-role="tagsinput" required>
    
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
                                                                        <option value="fab fa-whatsapp, #128C7E">Whatsapp</option>
                                                                        <option value="fab fa-youtube, #F95F62">Youtube</option>
                                                                        <option value="fab fa-facebook, #1475E0">Facebook</option>
                                                                        <option value="fab fa-instagram, #B18768">Instagram</option>
                                                                        <option value="fab fa-twitter, #00A6FF">Twitter</option>
                                                                        <option value="fab fa-facebook-messenger, #00B2FF">Facebook Messenger</option>
                                                                        <option value="fab fa-linkedin-in, #0E76A8">LinkedIn</option>
                                                                        <option value="fab fa-pinterest, #E60023">Pinterest</option>
                                                                        <option value="fab fa-skype, #00aff0">Skype</option>
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
                                                                <button type="button" class="btn btn-primary w-100 agregarRed" id="agregarRed">Agregar</button>
                                                            </div><!-- Fin col-2 -->
                                                        </div><!-- Fin row -->
                                                        <div class="row listadoRed">
                                                            {{-- <div class="col-log-12"> --}}
                                                                @php
                                                                    echo "<input type='hidden' name='redes_sociales' value='".$item->redes_sociales."' id='listaRed'>";
                                                                    $redes = json_decode($item->redes_sociales, true);
                                                                    
                                                                    // echo '<pre>'; print_r($redes); echo '</pre>';
                                                                    // echo '<div class="col-log-12">';
                                                                        foreach ($redes as $key => $value) {
                                                                            
                                                                            /*echo 
                                                                            '
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text text-white" style="background-color: '.$value["background"].'" >
                                                                                            <i class=" '.$value["icono"].' "></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <input type="text" class="form-control" value=" '.$value["url"].' ">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text" style="cursor: pointer;">
                                                                                            <span class="bg-danger px-2 rounded-circle eliminarRed" red="'.$value["icono"].'"  url="'.$value["url"].'">&times;</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>            
                                                                            ';*/

                                                                            echo '
                                                                                <div class="col-lg-12 mb-1"> 

                                                                                    <div class="input-group">

                                                                                        <div class="input-group-prepend">
                                                                                            <div class="input-group-text text-white" style="background-color: '.$value["background"].'" >
                                                                                                <i class=" '.$value["icono"].' "></i>
                                                                                            </div>
                                                                                        </div>

                                                                                        <input type="text" class="form-control" value=" '.$value["url"].' ">

                                                                                        <div class="input-group-prepend">
                                                                                            <div class="input-group-text" style="cursor: pointer;">
                                                                                                <span class="bg-danger px-2 rounded-circle eliminarRed" red="'.$value["icono"].'"  url="'.$value["url"].'">&times;</span>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>

                                                                                </div>                                                                            
                                                                            ';

                                                                                


                                                                                    
                                                                        }
                                                                            
                                                                    // echo '</div>';                                                                                                                                       
                                                                @endphp
                                                            {{-- </div> --}}
                                                        </div><!-- Fin row -->
                                                    </div><!-- Fin Redes Sociales -->
                                                </div><!-- Fin card-body -->
                                            </div>
                                        </div><!-- Fin col-lg-7 -->
                                        <div class="col-lg-5">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            {{-- Cambiar logo --}}
                                                            <div class="form-group my-2 text-center">
                                                                <div class="btn btn-default btn-file mb-3">
                                                                    <i class="fas fa-paperclip">Adjuntar imágen de logo</i>
                                                                    <input type="file" name="logo" id="logo">
                                                                    <input type="hidden" name="logo_actual" id="logo_actual" value="{{$item->logo}}" required>
                                                                </div> <br>
                                                                <img src="{{url('/')}}/{{$item->logo}}" class="img-fluid py-2 bg-secondary previsualizarImg_logo">
                                                                <p class="help-block small mt-3">Dimensiones: 700px * 200px | Peso max. 2MB | Formato: JPG o PNG</p>
                                                            </div>{{-- Fin cambiar logo --}}
                                                            <hr class="pb2">
                                                            {{-- Cambiar portada --}}
                                                            <div class="form-group my-2 text-center">
                                                                <div class="btn btn-default btn-file mb-3">
                                                                    <i class="fas fa-paperclip">Adjuntar imágen de portada</i>
                                                                    <input type="file" name="portada" id="portada">
                                                                    <input type="hidden" name="portada_actual" id="portada_actual" value="{{$item->portada}}" required>
                                                                </div> <br>
                                                                <img src="{{url('/')}}/{{$item->portada}}" class="img-fluid py-2 previsualizarImg_portada">
                                                                <p class="help-block small mt-3">Dimensiones: 700px * 420px | Peso max. 2MB | Formato: JPG o PNG</p>
                                                            </div>{{-- Fin cambiar portada --}}
                                                            <hr class="pb2">
                                                            {{-- Cambiar icono --}}
                                                            <div class="form-group my-2 text-center">
                                                                <div class="btn btn-default btn-file mb-3">
                                                                    <i class="fas fa-paperclip">Adjuntar imágen de icono</i>
                                                                    <input type="file" name="icono" id="icono">
                                                                    <input type="hidden" name="icono_actual" id="icono_actual" value="{{$item->icono}}" required>
                                                                </div> <br>
                                                                <img src="{{url('/')}}/{{$item->icono}}" class="img-fluid py-2 rounded-circle previsualizarImg_icono">
                                                                <p class="help-block small mt-3">Dimensiones: 150px * 150px | Peso max. 2MB | Formato: JPG o PNG</p>
                                                            </div>{{-- Fin cambiar icono --}}
                                                        </div>
                                                    </div><!-- Fin row -->
                                                </div>
                                            </div>
                                        </div><!-- Fin col-lg-5 -->
                                   
                                   
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <label for="sobre_mi">Sobre Mi<span class="small">(Intro)</span></label>
                                                    <textarea class="form-control summernote-sm" name="sobre_mi" id="sobre_mi" rows="10">
                                                        {{$item->sobre_mi}}
                                                    </textarea>
                                                </div>
                                            </div>
                                        </div><!-- Fin col-lg-6 -->
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <label for="sobre_mi">Sobre Mi<span class="small">(Completo)</span></label>
                                                    <textarea class="form-control summernote-smc" name="sobre_mi_completo" id="sobre_mi_completo" rows="10">
                                                        {{$item->sobre_mi_completo}}
                                                    </textarea>
                                                </div>
                                            </div>
                                        </div><!-- Fin col-lg-6 -->
                                   
                                    </div><!-- Fin row -->
                                </div><!-- /.card-body -->
                                <div class="card-footer">
                                    Footer
                                </div><!-- /.card-footer-->
                            </div><!-- /.card -->
                        </form>{{-- Fin tag /form --}}
                    </div>
                </div>
            </div>
        </section><!-- /.content -->
    </div>   
    @if (Session::has("no-validacion"))
        <script>
            notie.alert({
                type:2,
                text: 'Hay campos no validos en el formulario',
                time: 4
            });
        </script>
    @endif
    @if (Session::has("no-validacion-imagen"))
        <script>
            notie.alert({
                type:2,
                text: 'Las imagenes no tienen el formato correcto',
                time: 4
            });
        </script>
    @endif
    @if (Session::has("sin-imagen"))
        <script>
            notie.alert({
                type:2,
                text: 'No se encuentra la imagen solicitada',
                time: 4
            });
        </script>
    @endif
    @if (Session::has("error"))
        <script>
            notie.alert({
                type:3,
                text: 'Error en el gestor del blog',
                time: 4
            });
        </script>
    @endif

    @if (Session::has("ok-editar"))
        <script>
            notie.alert({
                type:1,
                text: 'Blog actualizado correctamente',
                time: 4
            });
        </script>
    @endif

@endsection