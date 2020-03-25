<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use DateTime;

class CustomerController {

    private function validateIndex($request){

        array_key_exists("id",$request) ? ($request["id"]) : ($request["id"] = null);
        array_key_exists("name",$request) ? ($request["name"]) : ($request["name"] = null);
        array_key_exists("email",$request) ? ($request["email"]) : ($request["email"] = null);
        array_key_exists("cpf",$request) ? ($request["cpf"]) : ($request["cpf"] = null);
        array_key_exists("phone",$request) ? ($request["phone"]) : ($request["phone"] = null);

        return $request;
        
    }
    
    public function store($request){    
        
        $request = $this->validateIndex($request);
        $customer = new Customer;
        $customer->name = $request["name"];
        $customer->email = $request["email"];
        $customer->cpf = $request["cpf"];
        $customer->phone = ($request["phone"]) ? ($request["phone"]) : ($request["phone"] = null);
        
        if($customer->save()){
            $response = 'Successfully Stored!';
            var_dump($response);
        }else{
            $response  = $customer->fail()->getMessage();
            var_dump($response);
        }
    }

    public function update($request){

        $request = $this->validateIndex($request);
        $customer = (new Customer())->findById($request["id"]);
        $customer->name = $request["name"];
        $customer->email = $request["email"];
        $customer->cpf = $request["cpf"];
        $customer->phone = $request["phone"];
        $customer->updated_at = new DateTime();

        if($customer->save()){
            $response = 'Successfully updated!';
            var_dump($response);
        }else{
            var_dump($customer->fail()->getMessage());
        }

    }

    public function destroy($request){
        
        $customer = (new Customer())->findById($request["id"]);

        if($customer->destroy()){
            $response = 'Successfully deleted!';
            var_dump($response);
        }else{
            var_dump($customer->fail()->getMessage());
        }

    }

    public function show(){

        $customer = new Customer();
        $list = $customer->find()->fetch(true);        
        if($list){
            foreach($list as $customer_details){
                var_dump($customer_details);
            }
        }else{
            var_dump($list->fail()->getMessage());
        }

    }

  
    public function error($request){

        $response = 'Error'.$request['errcode'];
        var_dump($response);

    }


}