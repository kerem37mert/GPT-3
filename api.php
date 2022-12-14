<?php

// GPT-3 API anahtarınızı buraya yazın
$api_key = "API KEY";

// GPT-3 modelini kullanarak metin tahminleri yapmak istediğiniz verileri buraya yazın
$prompt = "Merhaba, bugün nasılsın?";

// OpenAI API'sine bir istek gönderin
$ch = curl_init("https://api.openai.com/v1/completions");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Content-Type: application/json",
    "Authorization: Bearer " . $api_key
));
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array(
    "prompt" => $prompt,
    "model" => "text-davinci-002",
    "max_tokens" => 128
)));

// Yanıtı işleyin ve metin tahminlerini gösterin
$response = curl_exec($ch);
$response = json_decode($response);
echo $response->choices[0]->text;

?>