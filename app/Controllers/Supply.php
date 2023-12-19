<?php

namespace App\Controllers;


class supplyAPI extends BaseController
{

    public function confirm_action($id_supply,$status_pengiriman)
    {
        
        \Config\Services::curlrequest()->post("http://localhost:8080/supplyAPI/update/{$id_supply}/{$status_pengiriman}");
        return redirect()->to('/pages/dashboard');

    }
}
