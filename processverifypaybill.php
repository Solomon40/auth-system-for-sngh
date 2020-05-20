<?php
require_once('functions/alert.php');

if (isset($_GET['txref'])) {
    $ref = $_GET['txref'];
    $amount = "1000"; //Correct Amount from Server
    $currency = "NGN"; //Correct Currency from Server

    $query = array(
        "SECKEY" => "FLWSECK_TEST-917711006e1c996e17a8078d7c25340c-X",
        "txref" => $ref
    );

    $data_string = json_encode($query);
            
    $ch = curl_init('https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify');                                                                      
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                              
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    $response = curl_exec($ch);

    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $header = substr($response, 0, $header_size);
    $body = substr($response, $header_size);

    curl_close($ch);

    $resp = json_decode($response, true);

    $paymentStatus = $resp['data']['status'];
    $chargeResponsecode = $resp['data']['chargecode'];
    $chargeAmount = $resp['data']['amount'];
    $chargeCurrency = $resp['data']['currency'];

    if (isset($_SESSION['email'])) {
        $_SESSION['full_name'] = $full_name;
        $_SESSION['amount'] = $amount;
        $_SESSION['department'] = $department;
        $email = $_SESSION['email'];
    }

    if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($chargeAmount == $amount)  && ($chargeCurrency == $currency)) {
      // transaction was successful...
      
        $subject = "Payment successful";
        $message = "Hi there! ";
        $message .= "Your bill payment of &#8358;1 000, for appointment was successful." ;
        $message .= "Regards," ;
        $message .= "E-T-Solomon from Medical Team (MT)" ;
        $headers = "From: no-reply@ymail.com" . "\r\n" .
        "Cc: me@ymail.com";
        
           

        //send mail
        mail($email,$subject,$message,$headers);
        set_alert("message", "You have successfully paid appointment bill");
        
        header("Location: login.php");
    } else {
        //Dont Give Value and return to Failure page
        
        $subject = "Payment unsuccessful";
        $message = "Hi there!";
        $message .= "Your bill payment for appointment with was unsuccessful. Kindly check transaction details." ;
        $message .= "Regards," ;
        $message .= "E-T-Solomon from Medical Team (MT)" ;
        $headers = "From: no-reply@ymail.com" . "\r\n" .
        "Cc: me@ymail.com";
        
           

        //send mail
        mail($email,$subject,$message,$headers);
        set_alert("error", "Bill payment unsuccessful");
        header("Location: login.php");
    }
}
    else {
  die('No reference supplied');
}

?>