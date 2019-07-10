<?php 
if(is_ajax()){
  if(isset($_POST['query']) & !empty($_POST['query'])){
    $query = $_POST['query'];
    if($query == 'shutterstock'){
      $url = "http://tab.shutterstock.com/photos";
    }
    else if($query == 'gettyimages'){
      $url = "https://6v0luvcal3.execute-api.us-west-2.amazonaws.com/prod/backgroundimagecached";
    }
    else if($query == 'unsplash'){
      $url = "https://api.unsplash.com/photos/random?collections=317099&orientation=landscape&c=&1562649856276&client_id=fa60305aa82e74134cabc7093ef54c8e2c370c47e73152f72371c828daedfcd7";
    }
    // switch ($query){
    //   case "shutterstock":
    //     $url = "http://tab.shutterstock.com/photos";
    //   case  "gettyimages":
    //     $url = "https://6v0luvcal3.execute-api.us-west-2.amazonaws.com/prod/backgroundimagecached";
    //   case "unsplash":
    //     $url = "https://api.unsplash.com/photos/random?collections=317099&orientation=landscape&c=&1562649856276&client_id=fa60305aa82e74134cabc7093ef54c8e2c370c47e73152f72371c828daedfcd7";

    // }
  $options = [
    CURLOPT_URL => $url,
    //  . http_build_query($queryFields),
    CURLOPT_USERAGENT => "php/curl",
    // CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
    // CURLOPT_USERPWD => "c075a-08fde-8d760-4d806-b176c-8f0db:2f202-02691-57cff-52707-a20e6-9406d",
    CURLOPT_RETURNTRANSFER => 1
  ];
  
  $handle = curl_init();
  curl_setopt_array($handle, $options);
  $response = curl_exec($handle);
  curl_close($handle);
  $response = json_decode($response,true);
  $response = json_encode($response);
//   $decodedResponse = json_decode($response,true);
  print_r($response);


    }
}



function is_ajax() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
  }