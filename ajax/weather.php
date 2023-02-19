<?php
$opts = array(
    'http'=>array(
      'method'=>"GET",
      'header' => "X-Yandex-API-Key:ee76a086-3a4c-42a3-99fa-b68aeab1c1ab"."\r\n"
      )
  );
  $context = stream_context_create($opts);
  $f=file_get_contents("https://api.weather.yandex.ru/v2/forecast/?lat=".$_POST["lon"]."&lon=".$_POST["lat"]."&lang=ru_RU",false,$context);
  echo $f;
?>