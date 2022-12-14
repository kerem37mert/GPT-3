<?php
function gpt3($prompt)
{
    $api_key = "API KEY";

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

    $response = curl_exec($ch);
    $response = json_decode($response);
    return $response->choices[0]->text;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <form action="" method="POST">
        <input type="text" name="mesaj" />
        <input type="submit" name="btn" value="Gönder" />
    </form>

    <?php

    if(isset($_POST["btn"])): ?>

        <p style="color: green; font-weight: bold;"><?php echo gpt3($_POST["mesaj"]); ?></p>

    <?php
    endif;
    ?>

</body>
</html>