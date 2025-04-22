
<?php

class Dashboard extends SessionController{


    function __construct(){
        parent::__construct();

        /* $this->user = $this->getUserSessionData();
        error_log("Dashboard::constructor() "); */
    }

     function render(){
        error_log("Dashboard::RENDER() ");
        $this->view->render('dashboard/index');
      
    }   
    
    
}

?>