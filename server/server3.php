<?php
//Server
set_time_limit(0);
$host='172.16.1.97';
$port=9001;
$socket=socket_create(AF_INET,SOCK_STREAM,0);
socket_bind($socket,$host,$port);
socket_listen($socket);

$client=array($socket);
while (true) {
//$read=$client;
$cliid=0;
if (socket_select($client, $write=null, $except=null, 0) < 1)
{
        continue;
if(in_array($socket,$client)) {
for($i=1;$i<count($client);$i++)
{
if(!isset($client[$i])) 
{
$client[$i]['socket']=socket_accept($socket);
$cliid+=1;
socket_getpeername($client[$i]['socket'], $ip);
echo "Client #".$cliid." With IP {$ip} Connected\n";
$msg="\nWelcome to the PHP Test Server. \n" .
"To quit, type 'quit'.\n";
socket_write($client[$i]['socket'],$msg);
} //inside if
} //for
break;
}
} 
} //while
socket_close($socket); //for accepting
?>