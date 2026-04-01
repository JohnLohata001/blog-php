<?php

class Settings extends Controller{

    public function index()
    {
        $data = [];
        $this->view('admin/settings/index', $data);
    }
}