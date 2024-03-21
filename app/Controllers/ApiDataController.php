<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Config\Services;

class ApiDataController extends BaseController
{
    use ResponseTrait;

    public function getBOMs()
    {
        $json_url = "http://localhost:8011/components";
        $json_data = file_get_contents($json_url);
        $data['json_data'] = json_decode($json_data, true);

        // Pass the JSON data to the view
        return view('bill_of_materials', $data);
    }

    public function test()
    {
        $json_url = "http://localhost:8011/components";
        $json_data = file_get_contents($json_url);
        $data['json_data'] = json_decode($json_data, true);

        // Pass the JSON data to the view
        return view('test', $data);
    }

    public function postComponent()
    {
        $id = $this->request->getPost('id');
        $desc = $this->request->getPost('desc');
        $inv = $this->request->getPost('inv');

        $api_url = "http://localhost:8011/regist-component";

        $data = [
            'component_id' => $id,
            'component_desc' => $desc,
            'component_inv' => $inv,
        ];

        $response = file_get_contents($api_url, false, stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => 'Content-Type: application/json',
                'content' => json_encode($data)
            ]
        ]));

        // Tampilkan response dari API
        echo $response;
    }
}
