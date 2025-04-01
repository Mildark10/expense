<?php


    class Login extends Controller{
        function __construct()
        {
            parent::__construct(); //se carga el controlador padre
            //echo 'Controlador Login cargado'; //se carga el controlador
            error_log('Login::construct-> Controlador Login cargado'); //se carga el controlador
        }

        function render(){
            $this->view->render('login/index'); //se carga la vista
        }

    }

?>