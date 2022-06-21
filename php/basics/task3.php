<?php
$persons=[
    [
        "name"=> "nishal",
        "roll"=>1
    ],
    [
        "name"=> "anil",
        "roll"=>2
    ],
    [
        "name"=> "rohit",
        "roll"=>3
    ]
];
for ($i=0;$i<4;$i++)
{
    echo($persons [$i]["name"]);
    echo($persons [$i]["roll"]);
    echo "<br/>";
    
}
?>