<?

//rutear las rutas
    class App{

        function __construct()
        {
            $$url = isset($_GET['url']) ? $_GET['url'] : null;
            $url = rtrim($url, '/'); //elimina el / al final de la url
            $url = explode('/', $url); //separa la url en partes por el /
            //con el url se obtiene para mandarlo al controllador

            if(empty($url[0])){
                error_log('APP::construct-> No hay controlador, se manda al home');
                $controllerName = 'controllers/login.php'; //si no hay controlador se manda al home
                require_once $controllerName;
                $controller = new Login();
                $controller->loadModel('login'); //carga el modelo de login
                $controller->render(''); //renderiza la vista de login
                return false;
            }

        }
    }

?>