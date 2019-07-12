<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as SimpleRequest;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class UserController extends Controller
{
    public function getUser()
    {
    	$client = new Client([ 'base_uri' => 'http://127.0.0.1:8000/api/', 'timeout'  => 2.0,]);
    	$response = $client->get('get/2');
    	$data = $response->getBody();

    	$data = json_decode($data);
    	return view('welcome');
    }
}
