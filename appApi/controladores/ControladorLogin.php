<?php
    class ControladorLogin {

        public static function mostrarFormularioLogin() {
            VistaLogin::mostrarFormularioLogin("");
        }

        public static function mostrarFormularioLoginError() {
            VistaLogin::mostrarFormularioLogin("Error de login, prueba otra vez");
        }


        public static function chequearLogin($email, $password) {

            require_once('vendor/autoload.php');
            try {

                $client = new \GuzzleHttp\Client();
                // 172.24.160.1
                $response = $client->request('POST', 'http://node:3000/api/login', [
                    'body' => '{"email":"'.$email.'","password":"'.$password.'"}',
                    'headers' => [
                        'accept' => 'application/json',
                        'content-type' => 'application/json',
                    ],
                ]);
         
                $respuesta = $response->getBody();
                $respuestaJ= json_decode($respuesta,true);
                $_SESSION["tok"]= $respuestaJ["token"];
                
                echo "<script>window.location='enrutador.php?accion=mostrar';</script>";
                
            } catch (Exception $e) {
                echo "<script>window.location='enrutador.php?accion=error';</script>";
            }


        }

    }


 





?>