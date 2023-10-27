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

//print factor(11);


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
	
    //print tax(32000, "single");
	
	function stDev($x){
		$sum = 0;
		$avg = 0;
		$sum2 = 0;
		$stDev = 0;
		$count = count($x);
		for($i = 0;$i<$count;$i++){
			$sum = $sum + $x[$i];
		}
		$avg = $sum / $count;
		for($i = 0;$i<$count;$i++){
			$sum2 = $sum2 + pow(($x[$i] - $avg),2);
		}
		$stDev = sqrt($sum2 / $count);
		return $stDev;
		}

	//print stDev(array(1,2,3,4,5,6,7,8,9,10));

	function compoundInterest($p,$n,$r){
		return round($p * pow((1 + $r/100),$n),2);
	}
	// print compoundInterest(1000,10,5);
?>