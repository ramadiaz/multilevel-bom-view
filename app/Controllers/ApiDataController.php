<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

class ApiDataController extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        // Fetch JSON data from the API (replace this with your actual API URL)
        $json_url = "http://localhost:8011/components";
        $json_data = file_get_contents($json_url);
        $data['json_data'] = json_decode($json_data, true);

        // Pass the JSON data to the view
        return view('bill_of_materials', $data);
    }
}
