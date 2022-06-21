<?php
$name = ["BMW","Suzuki"];
$price = [300000,400000];

$cars=[
    "BMW"=>300000,
    "Suzuki"=>400000,
];
foreach($cars as $name => $price){

    echo "The price of $name is $price";
    echo"<br/>";
 
}
?>