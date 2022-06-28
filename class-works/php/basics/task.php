<?php
$number1 = 1;
$number2 = 2;
switch ($choice="+"){
    case '+':
        $sum = $number1 + $number2;
        echo sum;
        break;

        case '-':
            $diff = $number1 - $number2;
            echo diff;
            break;

            case '*':
                $product = $number1 * $number2;
                echo product;
                break;


                case '/':
                    $division = $number1 / $number2;
                    echo division;
                    break;

                    
                    default:
                    echo("no action");
                    break;
}