<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as SimpleRequest;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use \Cart;

class ProductPageController extends Controller
{
    //
    public function showProduct($product)
    {
    	$client = new Client([ 'base_uri' => 'http://127.0.0.1:8001/api/', 'timeout'  => 2.0,]);
    	$response = $client->get('product/'.$product);

    	$product = json_decode($response->getBody())->data;
    	$total_qty = Cart::getTotalQuantity();

    	
    	return view('product',compact('product','total_qty'));
    }
}
