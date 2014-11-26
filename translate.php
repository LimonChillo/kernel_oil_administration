<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
      $text = $_POST["text"];
    try{
      $result = file_get_contents("https://translate.yandex.net/api/v1.5/tr.json/translate?key=trnsl.1.1.20141119T000605Z.fde3b1af18a04e6f.9a81311905bca1e287e765513a10c8fe5a23c4a3&lang=en-de&text=".$text);
      $json = json_decode($result, true);
      echo $json["text"][0];
    }catch (Exeption $e)
    {}
    }
?>