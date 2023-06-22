<?php

namespace App\Controllers;

use App\Models\Categories;
use App\Models\Products;
use App\Request;

class productController extends Controller
{
    public function index()
    {
        $list_products = Products::all();
        $list_categories = Categories::all();
       return $this->views('admin/pages/product/list_product',['list_products' => $list_products,'list_categories' => $list_categories]);
    }
    
    public function delete(Request $request){
        $id = $request->getBody()['id'];
        $p = new Products();
        $p->delete($id);
        header(("Location:/list-product"));
        exit;
    }
    public function create()
    {
        $list_categories = Categories::all();
        return $this->views('admin/pages/product/add_product',['list_categories' => $list_categories]);
    }

    public function store(Request $request)
    {
        $products = $request -> getBody();
        $products['image'] = $_FILES['image']['name'];

        move_uploaded_file($_FILES['image']['tmp_name'], "upload/".$_FILES['image']['name']);

        $p = new Products();

        $p->insert($products);

        header(("Location:/list-product"));
    }
    // Update
    public function show(Request $request){
        $id = $request->getBody()['id'];
        $list_products = Products::findOne($id);
        $list_categories = Categories::all();

        return $this->views('admin/pages/product/update',
        ['list_products'=>$list_products,
        'list_categories'=>$list_categories
        ]
    );
    }
    public function update(Request $request){
        $data = $request->getBody();
        if($_FILES['image']['size'] > 0){
            $data['image'] = $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], 'upload/'.$data['image']);
        }
        $p = new Products();
        $p->update($data['id'],$data);
        header(("Location:/list-product"));
        exit;
    }
}
