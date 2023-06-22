<?php

namespace App\Controllers;

use App\Models\Categories;
use App\Request;

class categoriesController extends Controller
{
    public function index()
    {
        $list_categories = Categories::all();
        return $this->views('admin/pages/category/list_category', ['list_categories' => $list_categories]);
    }
    

    public function create()
    {
        $this->views('admin/pages/category/add_category');
    }
    public function store(Request $request)
    {
        $list_categories = $request->getBody();
        $list_categories['image'] = $_FILES['image']['name'];

        move_uploaded_file($_FILES['image']['tmp_name'], "upload/" . $_FILES['image']['name']);
        $category = new Categories();
        $category->insert($list_categories);
        header("Location:/list-categories");
    }
    public function delete(Request $request)
    {
        $id = $request->getBody()['id'];
        $p = new Categories();
        $p->delete($id);
        header(("Location:/list-categories"));
        exit;
    }

    // Update
    public function show(Request $request)
    {
        $id = $request->getBody()['id'];
        $list_categories = Categories::findOne($id);
        return $this->views(
            'admin/pages/category/update',
            [
                'list_categories' => $list_categories
            ]
        );
    }
    public function update(Request $request)
    {
        $data = $request->getBody();
        if ($_FILES['image']['size'] > 0) {
            $data['image'] = $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], 'upload/' . $data['image']);
        }
        $p = new Categories();
        $p->update($data['id'], $data);
        header(("Location:/list-categories"));
        exit;
    }
}
