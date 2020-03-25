<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Log;
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
    

    private function storeLogs($type, $msg, $request){
        $log = new Log;
        $dt = new DateTime();
        $prepare_message = '['.$dt->format('d/m/Y H:m:s').'] '.$type.' '.$msg;
        
        if($request){
            ($request->name) ? ($log->name = $request->name) : ($log->name = null);
            ($request->email) ? ($log->email = $request->email) : ($log->email = null);
            ($request->cpf) ? ($log->cpf = $request->cpf) : ($log->cpf = null);
            ($request->phone) ? ($log->phone = $request->phone) : ($log->phone = null);
        }

        $log->log_message = $prepare_message;
        
        if(!$log->save()){
            $log->fail()->getMessage();
        }
        
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
            $this->storeLogs('STORED',$response, $customer);
            var_dump($response);
        }else{
            $response  = $customer->fail()->getMessage();
            $this->storeLogs('NOT STORED - ERROR',$response, null);
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
            $this->storeLogs('UPDATED ',$response, $customer);
            var_dump($response);
        }else{
            $response = $customer->fail()->getMessage();
            $this->storeLogs('NOT UPDATED - ERROR',$response, null);
            var_dump($response);
        }

    }

    public function destroy($request){
        
        $customer = (new Customer())->findById($request["id"]);
    
        if($customer->destroy()){
            $response = 'Successfully deleted!';
            $this->storeLogs('DELETED',$response, $customer);
            var_dump($response);
        }else{
            $response = $customer->fail()->getMesssage();
            $this->storeLogs('NOT DELETED - ERROR',$response, null);
            var_dump($response);
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