<?php
  class conexion extends PDO{
    private $tipo_de_datos='pgsql';
    private $host='localhost';
    private $base='pelispbs';
    private $usuario='postgres';
    private $clave='12345';
    private $puerto='5432';

    public function __construct(){
    	try{
         parent::__construct("{$this->tipo_de_datos}:
         	dbname={$this->base};
         	host={$this->host};
         	port={$this->puerto};", $this->usuario, $this->clave);
    	}catch(Exception $e){
            echo "Error de conexion<br>".$e;
            exit();
    	}
    }
  }
  ?>