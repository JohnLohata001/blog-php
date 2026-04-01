<?php


class Articles extends Controller{
    
    public function index(){
        
        $this->view('articles', []);
    }
}