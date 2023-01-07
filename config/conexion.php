<?php
    session_start();
    class Conectar{
        protected $dbh;

        protected function Conexion(){
            try{
                $conectar = $this->dbh=new PDO("sqlsrv:Server=DESKTOP-U8A5JVU;Database=CompraVenta","sa","Danni.65");
                return $conectar;
            }catch(Exception $e){
                print "Error Conexion BD ". $e->getMessage() ."<br/>";
                die();
            }
        }

        public static function ruta(){
            return "http://localhost:8080/PERSONAL_CompraVenta/";        
        }
    }
?>