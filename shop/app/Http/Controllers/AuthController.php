<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as SimpleRequest;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Session;

class AuthController extends Controller
{
    //
    public function showLogin(){
    	return view('login');
    }
    public function showRegister(){
    	return view('register');
    }
    public function login(SimpleRequest $request){
    	$client = new Client([ 'base_uri' => 'http://127.0.0.1:8000/api/', 'timeout'  => 2.0,]);
    	$request1 = $client->request('POST', 'auth/login', [
    		"json"=>[
	    		'email' => $request->email,
	    		'password' => $request->password
    		]
		]);

		$token = json_decode($request1->getBody())->access_token;
		$user_id = json_decode($request1->getBody())->user_id;
		Session::put('login_token', $token);
		Session::put('login_email',$request->email);
		Session::put('login_id',$user_id);
		
		return redirect('main')->with('status', 'LOGIN!');
    }
    public function register(SimpleRequest $request){
    	$client = new Client([ 'base_uri' => 'http://127.0.0.1:8000/api/', 'timeout'  => 2.0,]);
    	$client->request('POST', 'create', [
    		"json"=>[
    		'name' => $request->name,
    		'email' => $request->email,
    		'password' => $request->password]
		]);
    	return redirect('login1')->with('status', 'Profile created!');
    }

    public function logout()
    {
    	$client = new Client([ 'base_uri' => 'http://127.0.0.1:8000/api/', 'timeout'  => 2.0,]);
    	$client->request('POST', 'auth/logout', [
    		'headers'=>[
    			'Authorization' => 'Bearer '.Session::get('login_token')
    		]
		]);
		Session::forget('login_token');
    	return redirect('main');
    }
    public function updateProfile(SimpleRequest $request){
    	$token = Session::get('login_token');

    	//dd($token);
    	$client = new Client([ 'base_uri' => 'http://127.0.0.1:8000/api/', 'timeout'  => 2.0,]);
    	
    	$request = $client->request('PUT', 'update/'.Session::get('login_id'), [
    		"json"=>[
	    		'name'=>'hello1'
    		],
    		'headers'=>[
    			'Authorization' => 'Bearer '.$token
    		]
		]);
    }

    public function deleteProfile(SimpleRequest $request){
    	$token = Session::get('login_token');
    	//dd($token);
    	$client = new Client([ 'base_uri' => 'http://127.0.0.1:8000/api/', 'timeout'  => 2.0,]);
    	
    	$request = $client->request('DELETE', 'delete/'.Session::get('login_id'), [
    		'headers'=>[
    			'Authorization' => 'Bearer '.$token
    		]
		]);
    }

}
