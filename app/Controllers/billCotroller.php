<?php

namespace App\Controllers;

use App\Models\Bills;
use App\Request;

class billCotroller extends Controller
{
    public function index()
    {
        $list_bill = Bills::getAllBill();

        return $this->views('admin/pages/bill/list_bill', ['list_bill' => $list_bill]);
    }

    // Update
    public function show(Request $request)
    {
        $id = $request->getBody()['id'];

        $list_bills = Bills::findOne($id);

        return $this->views(
            'admin/pages/bill/update',
            [
                'list_bills' => $list_bills
            ]
        );
    }
    public function update(Request $request)
    {
        $data = $request->getBody();
        $p = new Bills;
        $p->update($data['id'], $data);
        header(("Location:/list-bill"));
        exit;
    }
 
}
