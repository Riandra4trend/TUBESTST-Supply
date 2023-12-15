<?php
namespace App\Models;
use CodeIgniter\Model;
class Supply extends Model{
    protected $table = 'supply';
    public function getSupply(){
        return $this->findAll();
    }
}
