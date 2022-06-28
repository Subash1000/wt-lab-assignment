<?php
//lets explore super global variable of php

function dump($data)
{
    echo"<pre>";
    var_dump($data);
    echo"</pre>";
    echo "<br/>";
}
// dump($_SERVER)
// dump($_REQUEST);
// dump($_GET);
// dump($_POST);
dump($_FILES);
echo $_POST["Profile"];

$arr =[
    'test' => 'testing',
    'test2' => 'cha'
];

if (isset)
//  if($_SERVER ['REQUEST_SCHEME']=="http"){
//     echo "using http";
//  }else{
//     echo"not using http";
//  }
// die ("aayo hai")
// 
?>
