<?php
   if ($_GET['s']){
       $q = $_GET['s'];
   }
   
   function search($query){
       $file = file("../../daraja.txt");
       $file = array_reverse($file);
       
       $merchant = '"merchantID":"'.$query.'"';
       $checkout = '"checkoutID":"'.$query.'"';
       $transaction = '"txID":"'.$query.'"';
       foreach($file as $line){
           if (strpos($line, $merchant) !== false) {
               return $line;
           }
           if (strpos($line, $checkout) !== false) {
               return $line;
           }
           if (strpos($line, $transaction) !== false) {
               return $line;
           }
           
       }
       return '{"resultCode":-1,"resultDesc":"Transaction not found"}';
   }
   
   header('Content-type: application/json');
   echo search($q);
   
   ?>