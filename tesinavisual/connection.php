<?php
$con  = mysqli_connect('localhost','root','','psicosalud');
if(mysqli_connect_errno())
{
    echo 'Database Connection Error';
}