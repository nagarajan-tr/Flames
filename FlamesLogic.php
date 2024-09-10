<?php
session_start();

if (isset($_POST['value1']) && isset($_POST['value2'])) {

    $value1 = $_POST['value1'];
    $value2 = $_POST['value2'];

    function lowercase($value) {
        $result = "";
            for ($i = 0; isset($value[$i]); $i++) {
                if ($value[$i] >= 'A' && $value[$i] <= 'Z') {
                        $result .= chr(ord($value[$i]) + 32);
                    } else if (ord($value[$i]) === 32) {
                            continue;
                    }else {
                             $result .= $value[$i];
                 }
            }
        return $result;
    }
    
    $val1 = lowercase($value1);
    $val2 = lowercase($value2);

    function stringToArray($n) {
        $arr = [];
        for ($i = 0; isset($n[$i]); $i++) {
            $arr[] = $n[$i];
        }
        return $arr;
    }

    $val1arr = stringToArray($val1);
    $val2arr = stringToArray($val2);

// print_r($val1arr);die;

    $result1 = [];
    $result2 = [];

    $longerArray = strlen($val1) > strlen($val2) ? $val1arr : $val2arr;
    $shorterArray = strlen($val1) > strlen($val2) ? $val2arr : $val1arr;

// print_r($longerArray  )."<br>";
// print_r($shorterArray  )."<br>";
// die;
    foreach ($longerArray as $char) {
        $found = false;
        // echo("longerArray ");
        // print_r( $longerArray );
        // echo("")."<br>";
        // echo("shorterArray ");
        // print_r( $shorterArray );
        // echo("")."<br>";
    // echo("char ". $char)."<br>";
    // print_r("short array count " . count($shorterArray))."<br>";
    // echo("")."<br>";
        for ($j = 0; $j < count($shorterArray); $j++) {
            // echo("char ". $char)."<br>";
            // echo("shortarray value [j] ". $shorterArray[$j])."<br>";
            if ($shorterArray[$j] == $char) {
                $found = true;
                for ($k = $j; $k < count($shorterArray) - 1; $k++) {
                    $shorterArray[$k] = $shorterArray[$k + 1];
                    // echo("short ARRAY POSITION CHANGE  ")."<br>";
                    // print_r($shorterArray);
                    // echo('')."<br>";
                    // echo("shortarray value [k] ". $shorterArray[$k])."<br>"; 
                }
    //  echo("k value ".$k)."<br>";
    //  echo("unset ".$shorterArray[$k])."<br>";
    //             // echqo($shorterArray[$k]);die;
                unset($shorterArray[$k]);
        //         echo("final shorterArray ");
        // print_r( $shorterArray );
        // echo("")."<br>";  
                break;
            }
        }
        // echo("found " . $found)."<br>";
        // print_r($found == false)."<br>";
        if ($found == false) {
           // echo($char);die;   
            $result1[] = $char;

        //     echo("result1 ");
        // print_r( $result1 );
        // echo("")."<br>"; 
        }
        // echo("-------------------------")."<br>";
    }
    $result2 = $shorterArray;

    // print_r ($result2);
    // print_r ($result1);die;

    $finalVal1 = '';
    foreach ($result1 as $char) {
        $finalVal1 .= $char;
    }
    $finalVal2 = '';
    foreach ($result2 as $char) {
        $finalVal2 .= $char;
    }

    $totalLen = $finalVal1 . $finalVal2;
    // echo $totalLen;die;

    function TotalLength($str) {
        $totalLeng = 0;
        for ($i = 0; isset($str[$i]); $i++) {
            $totalLeng++;
        }
        return $totalLeng;
    }

    $valueLen = TotalLength($totalLen);

    $Flames = ["F", "L", "A", "M", "E", "S"];
    $finalFlames = 0;

    function customStrlen($arr) {
        $length = 0;
        while (isset($arr[$length])) {
            $length++;
        }
        return $length;
    }

    function removeCharAt($arr, $index) {
        $result = [];
        for ($i = 0; isset($arr[$i]); $i++) {
            if ($i != $index) {
                $result[] = $arr[$i];
            }
        }
        return $result;
    }

    function customMod($num, $divisor) {
        while ($num >= $divisor) {
            $num = $num - $divisor;
        }
        return $num;
    }

    while (customStrlen($Flames) > 1) {
        $flamesLen = customStrlen($Flames);
        // print_r($flasmesLen);die;
        $finalFlames = $finalFlames + $valueLen - 1;
        $finalFlames = customMod($finalFlames, $flamesLen);

        $Flames = removeCharAt($Flames, $finalFlames);
    }

    $fresult = $Flames[0];

    $_SESSION['fresult'] = $fresult;

   header("location:FlamesIndex.php");
    exit();
} else {
    echo "Not set";
}
?>
