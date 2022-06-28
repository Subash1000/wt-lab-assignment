<?php
//single numeric array
$names = ["Anil", "Bishal", "Rohit","Dev"];
$age = array (30, 34, 35, 36);
 
echo $names[0];
echo "<br/>";

echo $names[1];
echo "<br/>";

echo $age[0];
echo "<br/>";
echo $age [1];

//single associative array
$students =[
    "Anil"=> 30,
    "Bishal"=>34,
    "Rohit"=>35,
    "Dev"=>36
];

// $students =array(
//     "Anil"=> 30,
//     "Bishal"=>34,
//     "Rohit"=>35,
//     "Dev"=>36
// );

echo $students["Bishal"];
echo "loop====";
foreach($students as $name => $roll){
    echo "The roll no of $name is $roll";
    echo "<br/>";
}
