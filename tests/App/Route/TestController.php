<?php

namespace Tests\App\Route;

use Core\Controller;

class TestController extends Controller
{
    public function index(){
        return 'green';
    }

    public function show($id){
        return 'red '.$id;
    }

    public function post(array $data){
        return $data['name'];
    }

    public function multiple($id, $fa)
    {
        return [$id, $fa];
    }
}