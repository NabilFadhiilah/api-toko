<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends BaseController
{
    public function auth()
    {
        $authheader = \request()->header('Authorization'); //basic auth
        $keyauth = substr($authheader, 6); //hilangkan txt basic

        $plainauth = base64_decode($keyauth); //decode text info login
        $tokenauth = explode(":", $plainauth);
        dd($authheader, $keyauth, $plainauth, $tokenauth);
        $email = $tokenauth[0];
        $pass = $tokenauth[1];

        $data = (new Customers())->newQuery()
            ->where(['email' => $email])
            ->get(['id', 'first_name', 'last_name', 'email', 'password'])->first();

        if ($data == null) { //data customer tidak ditemukan
            # code...
            return $this->out(status: 'Gagal', code: 404, error: ['Pengguna Tidak Ditemukan']);
        } else { //data custumer ditemukan
            if (Hash::check($pass, $data->password)) { //pengecocokan password
                # code...
                $data->token = hash('sha256', Str::random(10));
                unset($data->password);
                $data->update();
                return $this->out(data: $data, status: 'OK',);
            } else { //jika password tidak cocok
                return $this->out(status: 'Gagal', code: 401, error: ['Anda Tidak Memiliki Wewenang'],);
            }
        }
    }
}
