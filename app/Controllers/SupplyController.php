<?php
namespace App\Controllers;
use App\Models\Supply;
class ProdukControllers extends BaseController
{
    public function index()
    {
        if (session()->get('num_user') == '') {
            return redirect()->to('pages/login');
        }
            
        $model = model(Supply::class);
        $data['supply'] = $model->getSupply();
        return view('header', $data).
        view('dashboard').view('footer');

        
    }
}
