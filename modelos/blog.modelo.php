<?php   
    require_once "conexion.php";

    Class ModeloBlog {

        /**
         * Mostrar contenido tabla blog
         */

        static public function mdlMostrarBlog($tabla) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetch(); // Se retorna una sola fila 
            //$stmt -> close();
            $stmt = null;
        }
    }