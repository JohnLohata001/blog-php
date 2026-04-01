<?php
// app/core/controller.php

class Controller {

    public function view( $name, $data = [] ){

        if (!empty($data)) {
            extract($data);
        }

        $filename = '../app/views/' . $name . '.view.php';

        if ( file_exists($filename)) {
           require $filename;
        }else {
            require '../app/views/404.view.php';
        }

    }

    public function load_model( $model ){

        $filename = '../app/models/' . $model . '.php';

        if (file_exists($filename)) {
            require $filename;
            return $model = new $model();
            // return new $model();
        }
    }

    
}