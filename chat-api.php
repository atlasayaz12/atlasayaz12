<?php
 

/*
 * 
 *  BU PROJEDE HİÇ BİR GÜVENLİK ÖNLEMİ ALINMAMIŞTIR
 * 
*/
if(@$_POST){

    $api_key = "key olacak burada";
    $prompt = $_POST['prompt'];
    
    $stop = array(" Human:", " AI:");
    $data = array(
        "model" => "text-davinci-003",
        "prompt" => $prompt,
        "temperature" => 0.9,
        "max_tokens" => 500,
        "top_p" => 1,
        "frequency_penalty" => 0,
        "presence_penalty" => 0.6,
        "stop" => $stop
    );

    
    $payload = json_encode($data);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://chat.openai.com/');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json', 
        'Authorization: Bearer ' . $api_key
    ));
    $resault = curl_exec($ch);
    curl_close($ch);

    $response = json_encode($resault, true);
    print_r($response);

}

?>
