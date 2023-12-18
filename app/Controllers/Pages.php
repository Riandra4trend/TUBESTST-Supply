<?php

namespace App\Controllers;

use App\Models\OrderModel;

class Pages extends BaseController
{

    public function index(): string
    {
        return view('layout/header') . view('pages/landingPage') . view('layout/footer');
    }

    public function login(): string
    {
        return view('layout/header') . view('pages/login') . view('layout/footer');
    }

    public function register(): string
    {
        if (session()->get('num_user') == '') {
            return redirect()->to('/login');
        }
        return view('layout/sidebar') . view('pages/register') . view('layout/footer');
    }

    // if (session()->get('num_user') == '') {
    //     return redirect()->to('/login');
    // }
    public function dashboard(): string
    {

        $response2 = \Config\Services::curlrequest()->get("http://localhost:8080/supplyAPI");
if ($response2->getStatusCode() == 200) {
    $supplyID = json_decode($response2->getBody(), true);
}

$supplyArray = [];

$orderModel = model(OrderModel::class);

foreach ($supplyID['supply'] as $item) {
    $supply = [
        'id_supply' => $item['id_supply'],
        'id_kurir' => $item['id_kurir'],
        'status_pengiriman' => $item['status_pengiriman'],
        'status_pembayaran' => $item['status_pembayaran'],
        'order_details' => $orderModel->getOrderDetails($item['id_supply']),
        'total_price' => $orderModel->getTotalPrice($item['id_supply']),
    ];

    $supplyArray[] = $supply;
}

$data['supply'] = $supplyArray;
// dd($data['supply']);

        // $data['title'] = 'Dashboard';
        //
// dd($data['supply']);

        // $data['title'] = 'Dashboard';
        //

return view('layout/header', $data) . view('layout/sidebar') . view('pages/dashboard') . view('layout/footer');
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
    }
    // Controller: app/Controllers/Pages.php

public function updateStatus($id_supply, $status)
{
    // Validasi atau otentikasi jika diperlukan

    // Lakukan pemanggilan API untuk mengubah status_pengiriman
    $postData = [
        'id_supply' => $id_supply,
        'status_pengiriman' => $status,
    ];

    $curl = \Config\Services::curlrequest();
    $response = \Config\Services::curlrequest()->post("http://localhost:8080/supplyAPI/edit/{$id_supply}/{$status}");

    if ($response->getStatusCode() == 200) {
        // Sukses, tambahkan logika lain jika diperlukan
        return redirect()->to('pages/dashboard')->with('success', 'Status updated successfully');
    } else {
        // Gagal, tambahkan logika lain jika diperlukan
        return redirect()->to('pages/dashboard')->with('error', 'Failed to update status');
    }
}


    public function restock(): string
    {
        if (session()->get('num_user') == '') {
            return redirect()->to('/login');
        }
        return view("layout/header") . view('layout/sidebar') . view('pages/restock') . view('layout/footer');
    }

    public function historyRestock(): string
    {
        if (session()->get('num_user') == '') {
            return redirect()->to('/login');
        }
        return view("layout/header") . view('layout/sidebar') . view('pages/historyRestock') . view('layout/footer');
    }

    public function historyPurchase(): string
    {
        if (session()->get('num_user') == '') {
            return redirect()->to('/login');
        }
        return view("layout/header") . view('layout/sidebar') . view('pages/historyPurchase') . view('layout/footer');
    }
}
