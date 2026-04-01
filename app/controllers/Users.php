<?php

class Users extends Controller{

    public function index()
    {
        $data = [];
        $this->view('admin/users/index', $data);
    }

    public function create()
    {
       $this->view('admin/users/create', []);    
    }
    public function edit()
    {
        $this->view('admin/users/update', []);
    }
    public function delete()
    {
        $this->view('admin/users/delete', []);
    }
}