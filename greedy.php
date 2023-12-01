<?php

function greedyProcess($kondisi)
{
    $kapasitas = 16;

    $data = [ //object,weight,profit
        [1, 6, 12],
        [2, 5, 15],
        [3, 10, 50],
        [4, 5, 10],
    ];

    if ($kondisi == "by Density") {
        for ($j=0; $j < count($data) ; $j++){
            array_push($data[$j], ($data[$j][2] / $data[$j][1]));
        }
    }

    echo "<br> -> Greedy $kondisi <br>";
    showData($data, $kondisi);
    $value = sorting($data, $kondisi);
    $temp = 0;
    $optimalProfit = 0;
    $product = [];
    for ($i=0; $i < count($value); $i++){
        $temp += $value[$i][1];
        if ($temp > $kapasitas){
            $temp -= $value[$i][1];
        } else {
            $optimalProfit += $value[$i][2];
            array_push($product, $value[$i][0]);
        }
    }

    sort ($product);
    echo "<br>Barang yang dapat diangkut: " .implode(",", $product);
    echo "<br>Total Bobot : $temp <br>";
    echo "Total Keuntungan : $optimalProfit <br>";

    if ($kondisi == "by Profit"){
        return ["profit" => $optimalProfit];
    }
    elseif ($kondisi == "by Weight") {
        return ["weight" => $optimalProfit];
    } else {
        return["density" => $optimalProfit];
    }

}

function sorting($data, $kondisi)
{
    for($i=0; $i < count($data); $i++){
        $min = $i;
        for ($j=$i+1; $j < count($data); $j++){
            if($kondisi == "by Weight"){
                if ($data[$j][1] < $data[$min][1]){
                    $min = $j;

                }
            }
            else{
                switch ($kondisi){
                    case 'solution':
                        $ind = 1;
                        break;

                    case 'by Profit':
                        $ind = 2;
                        break;

                    default:
                        $ind = 3;
                        break;
                }
                if ($data[$j][$ind] > $data[$min][$ind]){
                    $min = $j;
                }
            }
        }
        $temp = $data[$i];
        $data[$i] = $data[$min];
        $data[$min] = $temp;
    }
    return $data;
}

function showData($data, $kondisi)
{
    if ($kondisi == "by Density"){
        echo "........................<br>";
        echo "|Object |Weight\t|Profit\t|Density|<br>";
        echo "........................<br>";

        for ($i= 0; $i < count($data); $i++){
            $o = $data[$i][0];
            $w = $data[$i][1];
            $p = $data[$i][2];
            $d = round($data[$i][3], 2);
            echo "|__$o __|__$w __|__$p __|__$d __|<br>";
        }
        echo "............................<br>";

    }
    else {
        echo "..................<br>";
        echo "|Object |Weight |Profit|<br>";
        echo "..................<br>";

        for ($i=0; $i < count($data); $i++){
            $o = $data[$i][0];
            $w = $data[$i][1];
            $p = $data[$i][2];

            echo "|__ $o __|__ $w __|__ $p __|<br>";
        }
        echo "...........................<br>";

    }
}

function greedySolution($data)
{
    $data = [
        ["profit", $data[0]["profit"]],
        ["weight", $data[1]["weight"]],
        ["density", $data[2]["density"]],
    ];
    $solution = sorting($data, "solution");
    $max = [];
    $inc = 0;

    while ($inc < 3){
        if ($solution[$inc][1] >= $solution[0][1]) {
            array_push($max, $solution[$inc][0]);

        }
        $inc++;
    }
    switch (count($max)) {
        case 1:
            echo"<br>";
            echo"==> Solusi Optimal dapat diperoleh dari metode greedy by " .ucfirst($max[0]) . " <==";
            echo"<br>";
            break;
        case 2:
            echo"<br>";
            echo"==> Solusi Optimal dapat diperoleh dari metode greedy by " .ucfirst($max[0]) . " dan greedy by " .ucfirst($max[1]) . " <==";
            echo"<br>";
            break;
        default:
            #code...
            echo"<br>";
            echo"==> Solusi Optimal dapat diperoleh dari semua metode <==";
            echo"<br>";
            break;
    }
}
greedySolution([greedyProcess("by Profit"), greedyProcess("by Weight"), greedyProcess("by Density")]);