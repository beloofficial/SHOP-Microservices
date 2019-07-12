<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request as SimpleRequest;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use \Cart;
use Session;

class MainPageController extends Controller
{
    //
    public function show($category = "all",SimpleRequest $request)
    {
    	$client = new Client([ 'base_uri' => 'http://127.0.0.1:8001/api/', 'timeout'  => 2.0,]);

    	$response = $client->get('categories');
    	$categories = $response->getBody();

    	$categories = json_decode($categories)->data;

    	if(!isset($request->page))
    		$request->page = 1;
    	if($category == "all") 
    		$response = $client->get('products?page='.$request->page);	
    	else
    		$response = $client->get('products/category/'.$category.'?page='.$request->page);	
    	$products = $response->getBody();

    	$products = json_decode($products)->data;

    	$catName = $category;
        $total_qty = Cart::getTotalQuantity();
        $page = $request->page;
    	return view('welcome',compact('total_qty','catName','categories','products','page'));
    }
}
