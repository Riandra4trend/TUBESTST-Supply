<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'supply';
    protected $primaryKey = 'id_supply';

    public function getOrders()
    {
        return $this->findAll();
    }

    public function getOrderDetails($id_supply)
{
    $response = \Config\Services::curlrequest()->get("http://localhost:8080/supplierAPI");

        if ($response->getStatusCode() == 200) {
            $supplier = json_decode($response->getBody(), true);
        }
        
        // dd($supplier);
        $suppliers = [];
        foreach ($supplier['supplier'] as $s) {
            if ($s['id_supply'] == $id_supply) {
                array_push($suppliers, $s);
            }
        }
        

        return $suppliers;
}

    public function getTotalPrice($id_supply)
    {
        $response1 = \Config\Services::curlrequest()->get("http://localhost:8080/produkPriceAPI");

        if ($response1->getStatusCode() == 200) {
            $totalPrice = json_decode($response1->getBody(), true);
        }

        foreach ($totalPrice['totalPrice'] as $t) {
            if ($t['id_supply'] == $id_supply) {
                $total_harga = $t['total_harga'];
            }
        }

        return $total_harga;

    }
}
