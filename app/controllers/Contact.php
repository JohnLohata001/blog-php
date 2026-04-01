<?php

//app/contorllers/Contact.php

class Contact extends Controller{
    
    public function index(){
        
        $this->view('contact',[]);
    }
}