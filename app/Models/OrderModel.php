// app/Controllers/OrderController.php
<?php
// app/Models/OrderModel.php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'detail_produk';
    protected $primaryKey = 'id_produk';
    protected $allowedFields = ['id_cabang', 'nama', 'harga', 'stock', 'batas_bawah', 'kuantitas_restock'];

    public function getOrders()
    {
        return $this->findAll();
    }

    public function getOrderDetails($id_supply)
    {   
        
        return $this->db->table('detail_produk dp')
            ->select('dc.nama_cabang, dc.alamat, dp.nama, dp.harga, dp.stock, dp.batas_bawah, dp.kuantitas_restock, s.status_pembayaran, s.status_pengiriman')
            ->join('supply s', 's.id_produk = dp.id_produk', 'left')
            ->join('data_cabang dc', 'dc.id_cabang = dp.id_cabang', 'left')
            ->where('s.id_supply', $id_supply)
            ->get()
            ->getResultArray();
    }
    
    public function getTotalPrice($id_supply)
    {
        return $this->db->table('detail_produk dp')
            ->selectSum('dp.harga * dp.kuantitas_restock', 'total_price')
            ->join('supply s', 's.id_produk = dp.id_produk', 'left')
            ->where('s.id_supply', $id_supply)
            ->get()
            ->getRow()->total_price;
    }
}



