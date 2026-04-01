<?php
// app/core/App.php
class App 
{

    protected $controller = 'home';
    protected $method = 'index';
    protected $params = array();

    private function splitURL()
    {
        $url = $_GET['url'] ?? 'home';
        $url = explode('/', filter_var(trim($url, '/')), FILTER_SANITIZE_URL);
        return $url;
    }
    
    public function loadController()
    {
        $url = $this->splitURL();

        $filename = '../app/controllers/' . ucfirst( $url[0] ) . '.php';

        if (file_exists($filename)) {
            
            require $filename;
            $this->controller = ucfirst( $url[0] );
            unset($url[0]);

        }else{
            require '../app/controllers/_404.php';
            $this->controller = '_404';
        }
        
        $controller = new $this->controller;

        if (!empty($url[1])) {
            # code...
            if (method_exists($controller, $url[1])) {
                
                $this->method = $url[1];
                unset($url[1]);
            }

        }
        $this->params = array_values($url);
        call_user_func_array([ $controller, $this->method ], $this->params);

    }



    
}
