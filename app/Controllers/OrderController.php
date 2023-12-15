// app/Controllers/OrderController.php
<?php
namespace App\Controllers;

use App\Models\OrderModel;

class OrderController extends BaseController
{
    public function index()
    {
        if (session()->get('num_user') == '') {
            return redirect()->to('pages/login');
        }
        
        $orderModel = model(OrderModel::class);

        // Mendapatkan semua pesanan
        $data['orders'] = $orderModel->getOrders();

        // Mendapatkan detail pesanan berdasarkan id_supply (ganti dengan id_supply yang sesuai)
        
        

        return view('layout/header', $data).view('layout/sidebar'). view('pages/dashboard') . view('layout/footer');
    }
}

