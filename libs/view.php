<?php

class View{

    public $d; //se crea la variable d para guardar los datos
    function __construct()
    {
        //echo 'Vista cargada'; //se carga la vista
    }

    //se carga la vista
    //se le pasa el nombre de la vista y los datos que se van a mostrar
    function render($nombre, $data = []){
        $this->d = $data; //se guardan los datos
        
        require 'views/' . $nombre . '.php'; //se requiere la vista

    }
}
?>