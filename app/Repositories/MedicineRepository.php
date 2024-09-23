<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class MedicineRepository
{
    protected $ApiBaseUrl;
    protected $authUrl;
    protected $medicineUrl;

    public function __construct()
    {
        $this->ApiBaseUrl = env('API_URL');
        $this->authUrl = $this->ApiBaseUrl . "/auth";
        $this->medicineUrl = $this->ApiBaseUrl . "/medicines";
    }

    // Mendapatkan token baru jika tidak ada di cache atau token expired
    public function getToken()
    {
        // Cek apakah token ada di cache
        $token = Cache::get('api_token');
        
        if (!$token) {
            // Melakukan request untuk mendapatkan token
            // $response = Http::post($this->authUrl, [
            //     'email' => env('API_USER'),
            //     'password' => env('API_PASSWORD'),
            // ]);
            
            // mock: must deleted
            $response = new \Illuminate\Http\Response(
                [
                    "token_type" => "Bearer",
                    "expires_in" => 86400,
                    "access_token" => "9cf2dd9d-9c53-4e1d-b85d7b3fa2217477|hGzYyKej9VScCOG9G4suVb9Ly5iZYCPPUyIhdTnv60442450"
                ]
            );
            
            if ($response->isSuccessful()) {
                // pakai mock, ga yakin kalau pakai api asli bisa sama atau beda perlakuan. 
                // api error
                $responseData = json_decode($response->getContent(), true);
                $token = $responseData['access_token'] ?? null;


                // Simpan token di cache dengan masa aktif 
                Cache::put('api_token', $token, now()->addHour());
            } else {
                // Handle jika autentikasi gagal
                throw new \Exception('Authentication failed');
            }
        }

        return $token;
    }

    public function getMedicines()
    {
        $token = $this->getToken(); 

        // Cek apakah data obat sudah ada di cache
        $cachedMedicines = Cache::get('cached_medicines');
        
        if (!$cachedMedicines) {
            // $response = Http::withToken($token)->get($this->medicineUrl);
            // mock::must deleted
            $response = new \Illuminate\Http\Response(
                [
                    "medicines" => [
                        [
                            "id" => "9cef5601-1342-4e12-916a-79d1b464119d",
                            "name" => "Cholecalciferol 1000 IU Tablet Kunyah (PROVE D3-1000)"
                        ],
                        [
                            "id" => "9cef5603-34fc-4e3d-a0df-1fe7e25457ac",
                            "name" => "Desloratadine 5mg Tablet Salut Selaput(DEXA MEDICA)"
                        ]
                    ]
                ]
            );

            if ($response->isSuccessful()) {
                // Simpan data obat di cache dengan masa aktif 5 menit
                $decoded = json_decode($response->getContent(), true);
                Cache::put('cached_medicines', $decoded, now()->addMinute(5));
                return $decoded;
            } else {
                // Jika token expired, coba autentikasi ulang
                Cache::forget('api_token'); 
                return $this->getMedicines();
            }
        } else {
            // Jika data obat sudah ada di cache, gunakan data cache
            return $cachedMedicines;
        }
    }

    public function getMedicineDetails($medicineId)
    {
        $token = $this->getToken(); 

        // Cek apakah detail obat sudah ada di cache
        $cachedMedicineDetails = Cache::get('cached_medicine_details_' . $medicineId);
        
        if (!$cachedMedicineDetails) {
            // $response = Http::withToken($token)->get($this->medicineUrl . '/' . $medicineId . '/prices');
            // mock::must deleted
            $response = new \Illuminate\Http\Response(
                [
                    "medicine" => [
                        "id" => $medicineId,
                        "name" => "Cholecalciferol 1000 IU Tablet Kunyah (PROVE D3-1000)",
                        "prices" => [
                            [
                                "id" => "9cef560b-3f95-4aa3-b07c-998d5ddae2ae",
                                "unit_price" => 4548,
                                "start_date" => [
                                    "value" => "2024-09-09",
                                    "formatted" => "09 September 2024"
                                ],
                                "end_date" => [
                                    "value" => "2024-09-14",
                                    "formatted" => "14 September 2024"
                                ]
                            ],
                            [
                                "id" => "9cef560b-723c-4101-9b2b-8b6610954d56",
                                "unit_price" => 4795,
                                "start_date" => [
                                    "value" => "2024-09-15",
                                    "formatted" => "15 September 2024"
                                ],
                                "end_date" => [
                                    "value" => null,
                                    "formatted" => null
                                ]
                            ]
                        ]
                    ]
                ]
            );

            if ($response->isSuccessful()) {
                // Simpan detail obat di cache dengan masa aktif 5 menit
                $decoded = json_decode($response->getContent(), true);
                Cache::put('cached_medicine_details_' . $medicineId, $decoded, now()->addMinute(5));
                return $decoded;
            } else {
                // Jika token expired, coba autentikasi ulang
                Cache::forget('api_token'); 
                return $this->getMedicineDetails($medicineId);
            }
        } else {
            // Jika detail obat sudah ada di cache, gunakan data cache
            return $cachedMedicineDetails;
        }
    }
}
