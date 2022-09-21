<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function traerBlog()
    {
        $blog = Blog::all(); // Traemos todos los registros
        return view("paginas.blog",array('$blog'=>$blog));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::all(); // Traemos todos los registros
        //dd($blog);
        
        return view( 'paginas.blog', array('blog' => $blog) ); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Recoger datos
        $datos = array(
            "dominio"=>$request->input("dominio"),
            "servidor"=>$request->input("servidor"),
            "titulo"=>$request->input("titulo"),
            "descripcion"=>$request->input("descripcion"),
            "palabras_claves"=>$request->input("palabras_claves"),
            "redes_sociales"=>$request->input("redes_sociales"),
            "logo_actual"=>$request->input("logo_actual"),
            "portada_actual"=>$request->input("portada_actual"),
            "icono_actual"=>$request->input("icono_actual"),
            "sobre_mi"=>$request->input("sobre_mi"),
            "sobre_mi_completo"=>$request->input("sobre_mi_completo"),
        );
        
        // Recoger las imágenes
        $logo = array ("logo_temporal"=>$request->file("logo"));
        $portada = array ("portada_temporal"=>$request->file("portada"));
        $icono = array ("icono_temporal"=>$request->file("icono"));


        /**
         *  Para poder guardar en un array es con EXPLODE y 
         *  para poder guardarlo en la base de datos es con JSON_ENCODE
         */

        // echo '<pre>'; print_r( json_encode( explode(",", $datos["palabras_claves"] )) ); echo '</pre>';
        // return ;



        // Validacion de datos
        if (!empty($datos)) {
            // $validar = \Validator::make($datos, [

            // "dominio" => 'required|regex:/^[-\\_\\:\\.\\0-9a-z]+$/i',
            // "servidor" => 'required|regex:/^[-\\_\\:\\.\\0-9a-z]+$/i',
            // "titulo" => 'required|regex:/^[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
            // "descripcion" => 'required|regex:/^[=\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
            // "palabras_claves" => 'required|regex:/^[,\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
            // "redes_sociales" => 'required',
            // "logo_actual" => 'required',
            // "portada_actual" => 'required',
            // "icono_actual" => 'required',
            // "sobre_mi" => 'required|regex:/^[(\\)\\=\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
            // "sobre_mi_completo" => 'required|regex:/^[(\\)\\=\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i' 
            
            // ]);
            $validar = \Validator::make($datos, [
                
                "dominio" => 'required|regex:/^[-\\_\\:\\.\\0-9a-z]+$/i',
    			"servidor" => 'required|regex:/^[-\\_\\:\\.\\0-9a-z]+$/i',
    			"titulo" => 'required|regex:/^[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
    			"descripcion" => 'required|regex:/^[=\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
                "palabras_claves" => 'required|regex:/^[,\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
                "redes_sociales" => 'required',
                "logo_actual" => 'required',
                "portada_actual" => 'required',
                "icono_actual" => 'required',
                "sobre_mi" => 'required|regex:/^[(\\)\\=\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
                "sobre_mi_completo" => 'required|regex:/^[(\\)\\=\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i' 

            ]);

            // Validar imágenes-logo
            if($logo["logo_temporal"] != ""){
                
                $validar_logo = \Validator::make($logo, [
                    "logo_temporal" => 'required|image|mimes:jpg,jpeg,png|max:2000000'
                ]);
                if ($validar_logo->fails()) {
                    return redirect("/")->with("no-validacion-imagen","");
                }
            }

            // Validar imágenes-portada
            if($portada["portada_temporal"] != ""){
                
                $validar_portada = \Validator::make($portada, [
                    "portada_temporal" => 'required|image|mimes:jpg,jpeg,png|max:2000000'
                ]);
                if ($validar_portada->fails()) {
                    return redirect("/")->with("no-validacion-imagen","");
                }
            }

            // Validar imágenes-icono
            if($icono["icono_temporal"] != ""){
                
                $validar_icono = \Validator::make($icono, [
                    "icono_temporal" => 'required|image|mimes:jpg,jpeg,png|max:2000000'
                ]);
                if ($validar_icono->fails()) {
                    return redirect("/")->with("no-validacion-imagen","");
                }
            }

            // Revisar validación
            if ($validar->fails()) {
                return redirect("/")->with("no-validacion","");
                
            } else {

                // Subir al servidor la imagen logo
                if ($logo["logo_temporal"] != "") {
                    // Unlink para eliminar el Logo actual
                    unlink($datos["logo_actual"]);
                    $aleatorio = mt_rand(100,999);
                    $ruta_logo = "img/blog/".$aleatorio.".".$logo["logo_temporal"]->guessExtension();

                    // move_uploaded_file sirve para archivos en pdf, excel, xml
                    // move_uploaded_file($logo["logo_temporal"],$ruta_logo);

                    /**
                     * Para subir imagenes y poderlas redimencionar en una forma que 
                     * se vea mas estetica se utiliza "list()" = getimagesize() propiedad de php
                     */
                    list($ancho,$alto) = getimagesize($logo["logo_temporal"]); #$ancho,$alto son los valores originales del archivo
                    $nuevo_ancho = 700;
                    $nuevo_alto = 200;

                    // Saber en que formato viene la imagen guessExtension().
                    if ($logo["logo_temporal"]->guessExtension() == "jpeg" || $logo["logo_temporal"]->guessExtension() == "jpg") {
                        $origen = imagecreatefromjpeg($logo["logo_temporal"]);
                        $destino = imagecreatetruecolor($nuevo_ancho,$nuevo_alto);
                        imagecopyresized($destino,$origen,0,0,0,0,$nuevo_ancho,$nuevo_alto,$ancho,$alto);
                        imagejpeg($destino,$ruta_logo);
                    }

                    if ($logo["logo_temporal"]->guessExtension() == "png") {
                        $origen = imagecreatefrompng($logo["logo_temporal"]);
                        $destino = imagecreatetruecolor($nuevo_ancho,$nuevo_alto);
                        imagealphablending($destino,false);
                        imagesavealpha($destino,true);
                        imagecopyresampled($destino,$origen,0,0,0,0,$nuevo_ancho,$nuevo_alto,$ancho,$alto);
                        imagepng($destino,$ruta_logo);
                    }

                } else {
                    $ruta_logo = $datos["logo_actual"];
                    
                }
                
                // Subir al servidor la imagen portada
                if ($portada["portada_temporal"] != "") {
                    // Unlink para eliminar la portada actual
                    unlink($datos["portada_actual"]);
                    $aleatorio = mt_rand(100,999);
                    $ruta_portada = "img/blog/".$aleatorio.".".$portada["portada_temporal"]->guessExtension();
                    // move_uploaded_file sirve para archivos en pdf, excel, xml
                    // move_uploaded_file($portada["portada_temporal"],$ruta_portada);

                    /**
                     * Para subir imagenes y poderlas redimencionar en una forma que 
                     * se vea mas estetica se utiliza "list()" = getimagesize() propiedad de php
                     */
                    list($ancho,$alto) = getimagesize($portada["portada_temporal"]); #$ancho,$alto son los valores originales del archivo
                    $nuevo_ancho = 700;
                    $nuevo_alto = 420;

                    if ($portada["portada_temporal"]->guessExtension() == "jpeg" || $portada["portada_temporal"]->guessExtension() == "jpg") {
                        $origen = imagecreatefromjpeg($portada["portada_temporal"]);
                        $destino = imagecreatetruecolor($nuevo_ancho,$nuevo_alto);
                        imagecopyresized($destino,$origen,0,0,0,0,$nuevo_ancho,$nuevo_alto,$ancho,$alto);
                        imagejpeg($destino,$ruta_portada);
                    }

                    if ($portada["portada_temporal"]->guessExtension() == "png") {
                        $origen = imagecreatefrompng($portada["portada_temporal"]);
                        $destino = imagecreatetruecolor($nuevo_ancho,$nuevo_alto);
                        imagealphablending($destino,false);
                        imagesavealpha($destino,true);
                        imagecopyresampled($destino,$origen,0,0,0,0,$nuevo_ancho,$nuevo_alto,$ancho,$alto);
                        imagepng($destino,$ruta_portada);
                    }
                } else {
                    $ruta_portada = $datos["portada_actual"];
                    
                }
                
                // Subir al servidor la imagen icono
                if ($icono["icono_temporal"] != "") {

                   
                    // Unlink para eliminar el icono actual
                    unlink($datos["icono_actual"]);
                    $aleatorio = mt_rand(100,999);
                    $ruta_icono = "img/blog/".$aleatorio.".".$icono["icono_temporal"]->guessExtension();
                    // move_uploaded_file sirve para archivos en pdf, excel, xml
                    // move_uploaded_file($icono["icono_temporal"],$ruta_icono);

                    /**
                     * Para subir imagenes y poderlas redimencionar en una forma que 
                     * se vea mas estetica se utiliza "list()" = getimagesize() propiedad de php
                     */
                    list($ancho,$alto) = getimagesize($icono["icono_temporal"]); #$ancho,$alto son los valores originales del archivo
                    $nuevo_ancho = 150;
                    $nuevo_alto = 150;

                    if ($icono["icono_temporal"]->guessExtension() == "jpeg" || $icono["icono_temporal"]->guessExtension() == "jpg") {
                        $origen = imagecreatefromjpeg($icono["icono_temporal"]);
                        $destino = imagecreatetruecolor($nuevo_ancho,$nuevo_alto);
                        imagecopyresized($destino,$origen,0,0,0,0,$nuevo_ancho,$nuevo_alto,$ancho,$alto);
                        imagejpeg($destino,$ruta_icono);
                    }

                    if ($icono["icono_temporal"]->guessExtension() == "png") {
                        $origen = imagecreatefrompng($icono["icono_temporal"]);
                        $destino = imagecreatetruecolor($nuevo_ancho,$nuevo_alto);
                        imagealphablending($destino,false);
                        imagesavealpha($destino,true);
                        imagecopyresampled($destino,$origen,0,0,0,0,$nuevo_ancho,$nuevo_alto,$ancho,$alto);
                        imagepng($destino,$ruta_icono);
                    }
                } else {
                    $ruta_icono = $datos["icono_actual"];
                    
                }

                // Mover todos los ficheros temporales de blog al destino final
                // La función "glob" sirve para tomar todos los archivos en una carpeta
                $origen = glob('img/temp/blog/*');

                foreach ($origen as $fichero) {
                    
                    #con el comando substr quitarmos los caracteres de la ruta "img/temp/blog/"
                    #para que se pueda encontrar la ruta y copiar los archivos temporales.

                    copy($fichero, "img/blog/".substr($fichero, 14));
                    unlink($fichero);
                }


                $blog = Blog::all();


                $actualizar = array(
                    "dominio" => $datos["dominio"],
                    "servidor" => $datos["servidor"],
                    "titulo" => $datos["titulo"],
                    "descripcion" => $datos["descripcion"],
                    "palabras_claves" => json_encode( explode(",", $datos["palabras_claves"] )),
                    "redes_sociales" => $datos["redes_sociales"],
                    "logo" => $ruta_logo,
                    "portada" => $ruta_portada,
                    "icono" => $ruta_icono,
                    "sobre_mi" => str_replace( 'src="'.$blog[0]["servidor"].'img/temp/blog', 'src="'.$blog[0]["servidor"].'img/blog'  ,$datos["sobre_mi"]),
                    "sobre_mi_completo" => str_replace( 'src="'.$blog[0]["servidor"].'img/temp/blog', 'src="'.$blog[0]["servidor"].'img/blog'  ,$datos["sobre_mi_completo"]),
                );

                $blog = Blog::where("id",$id)->update($actualizar);
                return redirect("/")->with("ok-editar","");            
            }
            
        } else {
            return redirect("/")->with("error","");
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
