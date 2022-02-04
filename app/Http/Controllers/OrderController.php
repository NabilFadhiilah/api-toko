<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Products;
use Carbon\Carbon;

class OrderController extends BaseController
{
    //

    public function __construct()
    {
        # code...
        $this->middleware('authorization');
    }

    public function store()
    {
        # code...
        // Cari Data Dari Produk ID
        $product = Products::find(\request('product_id'));
        if ($product == null) {
            # code...
            return $this->out(status: 'Gagal', code: 404, error: ['Produk Tidak Ditemukan']);
        }
        $order = new Orders();
        $order->order_date = Carbon::now("Asia/Jakarta");
        $order->product_id = $product->id;
        $order->customer_id = request('customer_id');
        $order->qty = request('qty');
        $order->price = $product->price;
        if ($order->save() == true) { //insert berhasil
            # code...
            return $this->out(data: $order, status: 'OK', code: 201);
        } else {
            return $this->out(status: 'Gagal', error: ['Order Gagal Disimpan'], code: 504);
        }
    }
    public function findAll()
    {
        # code...
        $order = Orders::query()
            ->leftJoin('customers', 'customers.id', '=', 'orders.customer_id')
            ->leftJoin('products', 'products.id', '=', 'orders.product_id');
        if (request()->has('q')) { //ada query 'q' untuk pencarian judul produk
            # code...
            $q = request('q');
            $order->where('products.title', 'like', "%$q%");
        }
        $data = $order->paginate(
            10,
            [
                'orders.*',
                'customers.first_name',
                'customers.last_name',
                'customers.address',
                'customers.city',
                'products.title as product_title'
            ]
        );
        return $this->out(data: $data, status: 'OK');
    }

    public function update(Orders $order, Request $request)
    {
        # code...
        // dd($request->all());
        $product = Products::find($request->all()['product_id']);
        if ($product == null) {
            # code...
            return $this->out(status: 'Gagal', code: 404, error: ['Produk Tidak Ditemukan']);
        }

        $order->product_id = $product->id;
        $order->customer_id = request('customer_id');
        $order->qty = request('qty');
        $order->price = $product->price;

        $hasil = $order->save();
        return $this->out(
            status: $hasil ? 'OK' : 'Gagal',
            data: $hasil ? $order : null,
            error: $hasil ? null : ['Gagal Merubah Data'],
            code: $hasil ? 201 : 504
        );
    }
    public function delete(Orders $order)
    {
        # code...
        $hasil = $order->delete();
        return $this->out(status: $hasil ? 'OK' : 'Gagal', data: $hasil ? $order : null, error: $hasil ? null : ['Gagal Hapus Data'], code: $hasil ? 200 : 504);
    }
}
