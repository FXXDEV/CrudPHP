<?php

namespace App\Http\Controllers;
use App\Models\Customer;



class CustomerController {


    public function store($request){
        $customer = new Customer;
        $customer->name = $request["name"];
        $customer->email = $request["email"];
        $customer->cpf = $request["cpf"];
        $customer->phone = $request["phone"];
        $customer->save();
        var_dump($customer);
        
    }

    public function update($request, $id){

    }


    public function destroy($request){

    }

    public function show(){

        
    }

    public function home(){
        
    }


    public function data($request){
        $response = 'Error'.$request['errcode'];
        return $response;

    }


}