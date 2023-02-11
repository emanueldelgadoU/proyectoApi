<?php
    class ControladorCanciones{


        
        public static function mostrarCanciones() {
            VistaMostrarCanciones::render();
        }


        public static function mostrarCancionesTop() {
            VistaMostrarCanciones::renderTop();
        }


        public static function modificarCancion($id,$puntuacion){

            require_once('vendor/autoload.php');
            $client = new \GuzzleHttp\Client();

            $response = $client->request('PUT', 'http://node:3000/api/cancion/updateCancion/'.$id.'', [
                'json' => [
                    "puntuacion"=>$puntuacion
                ],
                'headers' => [
                    'authorization' => $_SESSION['tok'],
                ],
            ]);
            
            VistaMostrarCanciones::render();
        
        }

        public static function modificarCancionTop($id,$puntuacion){

            require_once('vendor/autoload.php');
            $client = new \GuzzleHttp\Client();

            $response = $client->request('PUT', 'http://node:3000/api/cancion/updateCancion/'.$id.'', [
                'json' => [
                    "puntuacion"=>$puntuacion
                ],
                'headers' => [
                    'authorization' => $_SESSION['tok'],
                ],
            ]);
            
            VistaMostrarCanciones::renderTop();
        }
    }
?>