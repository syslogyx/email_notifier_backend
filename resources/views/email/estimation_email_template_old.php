<?php

echo 'Hello All,';
echo '<br>';
echo 'Machine "'.$machine_name.'" is turned "OFF".';
echo '<br>';
echo 'It will take "';
echo $estimation_hr!=0?$estimation_hr.' hour ':'';
echo $estimation_min!=0?$estimation_min.' minute':'';
echo '" to start again.';

?>