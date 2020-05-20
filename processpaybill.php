<?php
session_start();


require('functions/alert.php');
require('functions/token.php');

//To complete Payment:
//(1) Collect data
//(2) Validate data: for non-empty fields, for non-numeric name and correct email address, et c
//(3) Proceed to rave

$error_count = 0;

//Collect the data (through the POST method) and attempt validation with ternary operator
$full_name = $_POST['full_name'] ;
$email = $_POST['email'] != "" ? $_POST['email'] : $error_count++;
$department = $_POST['department'] != "" ? $_POST['department'] : $error_count++;
$amount = $_POST['amount'] != "" ? $_POST['amount'] : $error_count++;


//Validate the data

        if(0 < $error_count) {
            //redirect to Register page with error message
            $session_error = "You have " . $error_count . " empty field";
            if (1 < $error_count ) {
                $session_error .= "s";
            }
            set_alert("error", $session_error . " in your submission. Please review");
            header("Location: pay_bill.php ");

            //While redirected, hold data inputs after error message is printed 
            $_SESSION['full_name'] = $full_name;
            $_SESSION['email'] = $email;
            $_SESSION['amount'] = $amount;
            $_SESSION['department'] = $department;
        }
        else{ //proceed to rave

            $curl = curl_init();

            $customer_email = $email;
            $amount = $amount;  
            $currency = "NGN";
            $txref = "rave-" . gen_token(); // ensure you generate unique references per transaction.
            $PBFPubKey = "FLWPUBK_TEST-c8a105bb58ab2f910b47053cdafc2c23-X"; // get your public key from the dashboard.
            $redirect_url = "http://localhost/sngh/processverifypaybill.php";
            
            
            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => json_encode([
                'amount'=>$amount,
                'customer_email'=>$customer_email,
                'currency'=>$currency,
                'txref'=>$txref,
                'PBFPubKey'=>$PBFPubKey,
                'redirect_url'=>$redirect_url
              ]),
              CURLOPT_HTTPHEADER => [
                "content-type: application/json",
                "cache-control: no-cache"
              ],
            ));

            //Disable CURLOPT_SSL_VERIFYHOST and CURLOPT_SSL_VERIFYPEER by
            //setting them to false.
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

            $response = curl_exec($curl);
            $err = curl_error($curl);
            
            if($err){
              // there was an error contacting the rave API
              die('Curl returned error: ' . $err);
            }
            
            $transaction = json_decode($response);
            
            if(!$transaction->data && !$transaction->data->link){
              // there was an error from the API
              print_r('API returned error: ' . $transaction->message);
            }
            
            // uncomment out this line if you want to redirect the user to the payment page
            //print_r($transaction->data->message);
            
            
            // redirect to page so User can pay
            // uncomment this line to allow the user redirect to the payment page
            header('Location: ' . $transaction->data->link);
        }
    


?>