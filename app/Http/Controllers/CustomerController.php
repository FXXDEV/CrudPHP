<?php

namespace App\Http\Controllers;
use App\Models\Customer;

class CustomerController {

    public function store($request){
        $customer = new Customer();
        $customer->name = $request["name"];
        $customer->email = $request["email"];
        $customer->cpf = $request["cpf"];
        $customer->phone = $request["phone"];
        $customer->save();
        var_dump($customer);
        
    }

    public function update($request){
        $customer = (new Customer())->findById($request["id"]);
        $customer->name = $request["name"];
        $customer->email = $request["email"];
        $customer->cpf = $request["cpf"];
        $customer->phone = $request["phone"];
        $customer = $customer->save();
        var_dump($customer);
    }


    public function destroy($request){
        $customer = (new Customer())->findById($request["id"]);
        $customer->destroy();
    }

    public function show(){
        $customer = new Customer();
        $list = $customer->find()->fetch(true);
        var_dump($list);
        //echo '<h1>aaa</h1>';
    }

  


    public function error($request){
        $response = 'Error'.$request['errcode'];
        var_dump($response);

    }


}