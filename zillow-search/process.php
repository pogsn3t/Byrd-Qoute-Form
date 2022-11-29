<?php
 
$action = isset($_REQUEST['action']) && $_REQUEST['action'] != '' ? $_REQUEST['action'] : '';

switch($action){
    case 'checkValidityofAddress':
        $locality = isset($_REQUEST['locality']) && $_REQUEST['locality'] != '' ? $_REQUEST['locality'] : '';
        $address = isset($_REQUEST['address']) && $_REQUEST['address'] != '' ? $_REQUEST['address'] : '';
        $map = isset($_REQUEST['map']) && $_REQUEST['map'] != '' ? $_REQUEST['map'] : '';
        
        $validAdd = json_decode(checkValidityofAddress($locality,$address));
        
        if($validAdd->result->address->formattedAddress !== $map){
            $result['valid'] = false;
            $result['valid_address'] = $validAdd->result->address->formattedAddress;
            echo json_encode($result);
        }else{
            include 'zillow-search-process.php';
        }


        exit;
    break;
}





function checkValidityofAddress($locality,$address){
		 
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://addressvalidation.googleapis.com/v1:validateAddress?key=AIzaSyDiJ-xeYm4mMd7O0deMDwjWEOvMsS1rbiI',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'{
    "address": {
        "regionCode": "US",
        "locality": "'.$locality.'",
        "addressLines": ["'.$address.'"]
    }
    }',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return $response;

} 