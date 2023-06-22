<?php

namespace App\Controllers;

use App\Models\Account;
use App\Request;

class accountController extends Controller
{
    public function index()
    {
        $list_accounts = Account::all();

        return $this->views('admin/pages/account/list_user', ['list_accounts' => $list_accounts]);
    }

    public function delete(Request $request)
    {
        $id = $request->getBody()['id'];
        $p = new Account();
        $p->delete($id);
        header(("Location:/list-account"));
        exit;
    }

    // Update

    public function show(Request $request)
    {
        $id = $request->getBody()['id'];
        $list_accounts = Account::findOne($id);
        return $this->views(
            'admin/pages/account/update',
            [
                'list_accounts' => $list_accounts
            ]
        );
    }
    public function update(Request $request)
    {
        $data = $request->getBody();
        $p = new Account();
        $p->update($data['id'], $data);
        header(("Location:/list-account"));
        exit;
    }
}
