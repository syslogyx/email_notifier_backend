#!/usr/local/bin/php -q
<?php
error_reporting(E_ALL);

/* Allow the script to hang around waiting for connections. */
set_time_limit(0);

/* Turn on implicit output flushing so we see what we're getting
 * as it comes in. */
ob_implicit_flush();

$address = '172.16.1.97';
$port = 9001;

$server_api = "http://172.16.1.97:9000/api";
// $server_api = "http://172.16.1.91:8088/smarttbm_new/api/dcd";

if (($sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) === false) {
    echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
}

if (socket_bind($sock, $address, $port) === false) {
    echo "socket_bind() failed: reason: " . socket_strerror(socket_last_error($sock)) . "\n";
}

if (socket_listen($sock, 5) === false) {
    echo "socket_listen() failed: reason: " . socket_strerror(socket_last_error($sock)) . "\n";
}

do {
    if (($msgsock = socket_accept($sock)) === false) {
        echo "socket_accept() failed: reason: " . socket_strerror(socket_last_error($sock)) . "\n";
        break;
    }
    /* Send instructions. */
    $msg = "\nWelcome to the PHP Test Server. \n" .
        "To quit, type 'quit'. To shut down the server type 'shutdown'.\n";
    //socket_write($msgsock, $msg, strlen($msg));

    do {
        if (false === ($buf = socket_read($msgsock, 2048, PHP_NORMAL_READ))) {
            echo "socket_read() failed: reason: " . socket_strerror(socket_last_error($msgsock)) . "\n";
            break 2;
        }
        if ($buf == "\r\n") {
          if (!$buf = trim($buf)) {
              continue;
          }
          if ($buf == 'quit') {
              break;
          }
          if ($buf == 'shutdown') {
              socket_close($msgsock);
              break 2;
          }
        }
       // $talkback = "PHP: You said '$buf'.\n";
        //socket_write($msgsock, $talkback, strlen($talkback));
        $res = sendEmail($buf);
        print_r($res);
        //echo $res;
         socket_write($msgsock, $res, strlen($res));

    } while (true);
    socket_close($msgsock);
} while (true);

socket_close($sock);



function sendEmail ($request){
  echo "$request\n";
  global $server_api;

  // $request = ['{"device_id": "3","port_1":"1"}'];
  
  $ch = curl_init($server_api.'/get/devicesInfo');
  curl_setopt_array($ch, array(
    CURLOPT_POST => TRUE,
    CURLOPT_RETURNTRANSFER => TRUE,
    CURLOPT_HTTPHEADER => array(
         'Content-Type: application/json'
    ),
    CURLOPT_POSTFIELDS => json_encode($request),
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_SSL_VERIFYHOST => false,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_PROXY => false
  ));

  // Send the request
  $response = curl_exec($ch);

  // Check for errors
  if($response === FALSE){
      die(curl_error($ch));
  }

  // Decode the response
  $responseData = json_decode($response, TRUE);
  if($responseData["status_code"]==200 || $responseData["status_code"]==201){
    return ("Success".chr(0x0D));
  }else{
     return 'Fail';
  }
  return $responseData;
}
?>
