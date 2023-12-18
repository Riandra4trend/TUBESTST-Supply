<?php
namespace App\Models;
use CodeIgniter\Model;
class Login extends Model
{
    public function findUserInApi($email, $password)
    {
        $response = \Config\Services::curlrequest()->get("http://localhost:8080/karyawanAPI");
        $result = 0;
        if ($response->getStatusCode() == 200) {
            $dataFromApi = json_decode($response->getBody(), true);

            // Memproses data yang diterima dari API

        //    dd($dataFromApi);
            foreach ($dataFromApi['data_karyawan'] as $karyawan) {
                // Mengecek apakah email dan password cocok
                if ($karyawan['email'] == $email && $karyawan['password'] == $password) {
                    // Jika cocok, Anda dapat mengakses data karyawan
                    $result = 1;

                    // Lakukan apa yang Anda inginkan dengan data tersebut, misalnya, simpan dalam variabel atau gunakan dalam proses selanjutnya
                    // ...
                    
                }return $result;
            }

            // Jika email dan password tidak cocok dengan data dari API
            return ['message' => 'Login failed. Email or password is incorrect'];
        } else {
            // Jika ada masalah dengan panggilan API
            return ['message' => 'Failed to retrieve data from API'];
        }
    }
        
    // Mendapatkan data dari API Karyawan
    // $response = \Config\Services::curlrequest()->get("http://localhost:8080/KaryawanAPI");

    // if ($response->getStatusCode() == 200) {
    //     $dataFromApi = json_decode($response->getBody(), true);

    //     // Lakukan sesuatu dengan data dari API
    //     // Misalnya, mencocokkan email dan password
    //     foreach ($dataFromApi as $karyawan) {
    //         if ($karyawan['email'] == $email && $karyawan['password'] == $password) {
    //             return true; // Jika ditemukan, return true
    //         }
    //     }

    //     // Jika tidak ada yang cocok, return false
    //     return false;
    // } else {
    //     echo 'Error: ' . $response->getStatusCode();
    //     return false;
    // }


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
    // 
}