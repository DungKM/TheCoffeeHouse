<?php

namespace App\Controllers;

use App\Models\Products;

class homeController  extends Controller{
    public function index()
    {
        $products = Products::all();
        $this->views('home',['products' => $products]);
    }
    public function contact()
    {
        $this->views('contact');
    }
    public function dash(){
        $statisticals = Products::loadall_statistical();
        return $this->views('admin/pages/home/master',['statisticals'=>$statisticals]);
    }
}