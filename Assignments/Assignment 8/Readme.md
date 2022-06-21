Assignment : 20th June 2022
 ----------
 ----------
 <h2>Deadline : 21th June 2022</h2>
 
 

### Sorting 
#### -> Sorting refers to ordering data in an alphabetical, numerical order and increasing or decreasing fashion according to some linear relationship among the data items. Similarly, an array can have it's elements be sorted in alphabetical or numerical order, descending or ascending. For this very purpose, PHP comes with a number of built-in functions designed specifically for sorting array elements in different ways. The various array sorting function in PHP are as follows :
***
### Various Sorting Function for Array in PHP
---
### 1. sort()
#### -> sort() function is used for sorting indexed arrays. It is used for sorting the elements of the indexed arrary in ascending order.
### Synatx:
`sort($variable);`
### Example :

```PHP
<?php
$even= array(22,36,48,60);
sort($even);
echo($even);
?>
```
---
### 2. rsort()
#### -> rsort() function is also used for sorting indexed arrays. It is used for sorting the elements of the indexed arrary in descending order.
### Synatx:
`rsort($variable);`
### Example :
```PHP
<?php
$odd= array(11,35,57,71);
sort($odd);
echo($odd);
?>
```
---
### 3. asort()
#### -> asort() function is used for sorting associative arrays. It is used for sorting the elements of the associative arrary in ascending order according to the value. It works just like sort(), but it preserves the association between keys and its values while sorting.
### Synatx:
`asort($variable);`
### Example :
```PHP
<?php
$age= array("Deku" => 16, "Tyson" => 22, "Mark" => 25);
asort($age);
echo($age);
?>
```
---
### 4. arsort()
#### -> arsort() function is also used for sorting associative arrays. It is used for sorting the elements of the associative arrary in descending order according to the value. It works just like rsort(), but it preserves the association between keys and its values while sorting.
### Synatx:
`arsort($variable);`
### Example :
```PHP
<?php
$rollno= array("Deku" => 1, "Tyson" => 22, "Mark" => 12);
arsort($rollno);
echo($rollno);
?>
```
---
### 5. ksort()
#### -> Similar to asort(), ksort() function is also used for sorting associative arrays. But it is used for sorting the elements of the associative arrary in ascending order according to the key. It preserves the association between keys and its values while sorting, same as asort() function.
### Synatx:
`ksort($variable);`
### Example :
```PHP
<?php
$height= array("Deku" => 140, "Tyson" => 165, "Mark" => 132);//height in centimeters
ksort($height);
echo($height);
?>
```
---
### 6. krsort()
#### -> Similar to arsort(), krsort() function is also used for sorting associative arrays. But it is used for sorting the elements of the associative arrary in descending order according to the key. It preserves the association between keys and its values while sorting, same as arsort() function.
### Synatx:
`krsort($variable);`
### Example :
```PHP
<?php
$address= array("Deku" => "Shibuya", "Tyson" => "Kyoto", "Mark" => "Tokyo");
krsort($address);
echo($address);
?>
```
