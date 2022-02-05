<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;

class CustomerController extends BaseController
{
    //
    public function findall()
    {
        # code...
        $data = Customers::paginate(20, [
            'id', 'first_name', 'last_name'
        ]);
        if (count($data) == 0) {
            # code...
            return $this->out(data: [], status: 'Kosong', code: 204);
        } else {
            return $this->out(data: $data, status: 'OK');
        }
    }
}
