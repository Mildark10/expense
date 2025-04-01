<?php
//solo se va conectar a la base de datos y ejecutar consultas
class Model{

    public	$db; //se crea la base de datos

    function __construct()
    {
        $this->db = new Database(); //se crea la base de datos
    }

    function query($query){
        return $this->db->connect()->query($query); //se ejecuta la consulta
    }

    function prepare($query){
        return $this->db->connect()->prepare($query); //se prepara la consulta
    }
}