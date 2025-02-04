<?php
$file_list = shell_exec('ls -a');
$file_list_win = shell_exec('dir /a');
echo $file_list;
echo $file_list_win;
?>