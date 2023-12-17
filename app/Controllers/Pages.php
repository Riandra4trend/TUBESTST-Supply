<?php

namespace App\Controllers;
use App\Models\OrderModel;

class Pages extends BaseController
{

    public function index(): string
    {
        return view('layout/header').view('pages/landingPage').view('layout/footer');
    }

    public function login(): string
    {
        return view('layout/header').view('pages/login').view('layout/footer');
    }

    public function register(): string
    {
        if (session()->get('num_user') == '') {
            return redirect()->to('/login');
        }
        return view('layout/sidebar').view('pages/register').view('layout/footer');
    }

    public function dashboard(): string
    {
        if (session()->get('num_user') == '') {
            return redirect()->to('/login');
        }

        //BUKAN API API API API API API
        // $orderModel = model(OrderModel::class);

        // // Mendapatkan semua pesanan
        // $data['orders'] = $orderModel->getOrders();
        // // Mendapatkan detail pesanan berdasarkan id_supply (ganti dengan id_supply yang sesuai)

        // $orders = [];
        // foreach ($data['orders'] as &$order) {
        //     $id_supply = $order['id_supply'];
        //     $order['order_details'] = $orderModel->getOrderDetails($id_supply);
        //     $order['total_price'] = $orderModel->getTotalPrice($id_supply);
        //     array_push($orders, $order);
        // }

        // $data['orders'] = $orders;

        // API API API API API API
        $numuser = session()->get('num_user');
        $response = \Config\Services::curlrequest()->get("http://localhost:8080/SupplierAPI/{$numuser}");

        if ($response->getStatusCode() == 200) {
            $data['orders'] = json_decode($response->getBody(), true);
             // Lakukan sesuatu dengan data dari API
        } else {
            echo 'Error: ' . $response->getStatusCode();
        }
       

        return view('layout/header',$data) . view('layout/sidebar') . view('pages/dashboard') . view('layout/footer');
    }

    public function restock(): string
    {
        if (session()->get('num_user') == '') {
            return redirect()->to('/login');
        }
        return view("layout/header").view('layout/sidebar').view('pages/restock').view('layout/footer');
    }

    public function historyRestock(): string
    {
        if (session()->get('num_user') == '') {
            return redirect()->to('/login');
        }
        return view("layout/header").view('layout/sidebar').view('pages/historyRestock').view('layout/footer');
    }

    public function historyPurchase(): string
    {
        if (session()->get('num_user') == '') {
            return redirect()->to('/login');
        }
        return view("layout/header").view('layout/sidebar').view('pages/historyPurchase').view('layout/footer');
    }


}
