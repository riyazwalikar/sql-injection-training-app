<?php
$DBUSER = 'root';
$DBPASS = 'root';

system('mysql -u '.$DBUSER.' -p'.$DBPASS.' < sqlitraining.sql');
echo "DB reset!<br/>";
echo "Go back to <a href='/'>Home</a>";
?>
