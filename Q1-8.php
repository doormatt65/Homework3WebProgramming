<?php
function factor ($x){
    $i = 1;
    $val = "";
    for($i = 1;$i<=$x;$i++){
        if($x % $i == 0){
            $val = $val . $i . " ";
        }
    }
    return $val;
    
}

print factor(11);


function tax($income, $maritalStatus) {
        if ($maritalStatus == "single" && $income < 30000) {
            return $income * 0.2;
        }
        if ($maritalStatus == "single" && $income >= 30000) {
            return $income * 0.25;
        }
        if ($maritalStatus == "married" && $income < 50000) {
            return $income * 0.1;
        }
        if ($maritalStatus == "married" && $income >= 50000) {
            return $income * 0.15;
        }
    }

    print tax(32000, "single");
?>