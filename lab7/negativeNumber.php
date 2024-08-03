<?php
$numbers = explode(',', $_POST['numbers']);

function containsNegative($arr) {
    foreach($arr as $num) {
        if($num < 0) {
            return true;
        }
    }
    return false;
}

if (containsNegative($numbers)) {
    echo "Yes, the array contains negative numbers.";
} else {
    echo "No, the array does not contain negative numbers.";
}
?>