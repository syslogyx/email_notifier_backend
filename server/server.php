<?php
error_reporting(E_ALL);

/* Allow the script to hang around waiting for connections. */
set_time_limit(0);

/* Turn on implicit output flushing so we see what we're getting as it comes in. */
ob_implicit_flush();

$port = 9001;
 
   // $address = '115.124.122.143';
   $address = '172.16.1.97';

      // $server_api = "http://enfapi.syslogyx.com/api";
   $server_api = "http://172.16.1.97:9000/api";

// create a streaming socket, of type TCP/IP
$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

socket_set_option($sock, SOL_SOCKET, SO_REUSEADDR, 1);

socket_bind($sock, $address, $port);

socket_listen($sock);

// create a list of all the clients that will be connected to us..
// add the listening socket to this list
$clients = array($sock);

while (true)
{
    // create a copy, so $clients doesn't get modified by socket_select()
    $read = $clients;
    $write = null;
    $except = null;

    // get a list of all the clients that have data to be read from
    // if there are no clients with data, go to next iteration
    if (socket_select($read, $write, $except, null) < 1)
        continue;

    // check if there is a client trying to connect
    if (in_array($sock, $read))
    {
        $clients[] = $newsock = socket_accept($sock);

        //socket_write($newsock, "There are ".(count($clients) - 1)." client(s) connected to the server\n");

        socket_getpeername($newsock, $ip, $port);
        echo "New client connected: {$ip}\n";

        $key = array_search($sock, $read);
        unset($read[$key]);
    }

    // loop through all the clients that have data to read from

    foreach ($read as $read_sock)
    {
        // read until newline or 1024 bytes
        // socket_read while show errors when the client is disconnected, so silence the error messages
        $data = @socket_read($read_sock, 1024, PHP_NORMAL_READ);

        // check if the client is disconnected
        if ($data === false)
        {
            // remove client for $clients array
            $key = array_search($read_sock, $clients);
            unset($clients[$key]);
            echo "Client disconnected.\n";
            continue;
        }

        $data = trim($data);
         
        
        if (!empty($data))
        {

          echo "{$data}\n";

          sendEmail($data,$read_sock);
          //print_r($res);
          

           // do sth..

            //send some message to listening socket
           // socket_write($read_sock, '');

            // send this to all the clients in the $clients array (except the first one, which is a listening socket)
            // foreach ($clients as $send_sock)
            // {
            //     if ($send_sock == $sock){                  
            //       socket_write($read_sock, $res, strlen($res));
            //       continue;
            //     }
                    

            // } // end of broadcast foreach
          
       }

        

        

    } // end of reading foreach
}

// close the listening socket
socket_close($sock);

function sendEmail($request,$sock){
  // echo "$request\n";
  global $server_api;

  
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

    if( ! $response = curl_exec($ch)){ 
       trigger_error(curl_error($ch)); 
       curl_close($ch);
    }else{
         curl_close($ch);
        $responseData = json_decode($response, TRUE);
        print_r($responseData);
        $res= "Success".chr(0x0D);
        if($responseData["status_code"]==405){            
            $res= 'Fail'.chr(0x0D);
        }
        
        print_r($res);
        socket_write($sock, $res, strlen($res));
    }
  
}


?>