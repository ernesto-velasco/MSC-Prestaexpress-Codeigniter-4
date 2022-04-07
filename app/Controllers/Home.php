<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }
    public function admin()
    {
        return view('admin');
    }

    public function form()
    {
        return view('form');
    }

    public function formReceive()
    {
        foreach ($this->request->getPost('productos') as $key => $value) {
            echo ' id_producto ' . $value['id_producto'];
            echo ' cantidad ' . $value['cantidad'];
        }
        echo json_encode($this->request->getPost());
    }
}
