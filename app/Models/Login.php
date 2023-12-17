<?php
namespace App\Models;
use CodeIgniter\Model;
class Login extends Model
{
    public function findUserInApi($email, $password)
{
    // Mendapatkan data dari API Karyawan
    $response = \Config\Services::curlrequest()->get("http://localhost:8080/KaryawanAPI");

    if ($response->getStatusCode() == 200) {
        $dataFromApi = json_decode($response->getBody(), true);

        // Lakukan pencarian dalam data dari API
        foreach ($dataFromApi as $karyawan) {
            if ($karyawan['email'] == $email && $karyawan['password'] == $password) {
                // Jika ditemukan, return informasi tentang letak ditemukannya
                return [
                    'found' => true,
                    'location' => $karyawan['id'], // Ganti dengan informasi yang sesuai
                ];
            }
        }

        // Jika tidak ada yang cocok, return informasi bahwa tidak ditemukan
        return [
            'found' => false,
        ];
    } else {
        // Menangani kesalahan HTTP
        echo 'Error: ' . $response->getStatusCode();
        return [
            'found' => false,
        ];
    }
}


    // public function getDataUsers($email, $password)
    // {
    //     $response = \Config\Services::curlrequest()->get("http://localhost:8080/KaryawanAPI");
    //     if ($response->getStatusCode() == 200) {
    //         $data = json_decode($response->getBody(), true);
    //          // Lakukan sesuatu dengan data dari API
    //     } else {
    //         echo 'Error: ' . $response->getStatusCode();
    //     }
    //     $queryString = 'SELECT * FROM data_karyawan WHERE 
    //                     email = "'.$email.'" 
    //                     AND password = "'.$password.'"';
        

    //     $query   = $db->query($queryString);
    //     $results = $query->getResult();
    //     return count($results);
    // }
}
 