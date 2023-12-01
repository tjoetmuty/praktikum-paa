<?php
function randomNumber($min, $max, $count){
    $angka = array();
    while (count($angka) < $count) {
        $random = rand($min, $max);
        if ($random % 2 == 0) {
            $angka[] = $random;
        }
    }
    return $angka;
}

function selectionSorting($angka){
    for($i=0; $i<count($angka)-1; $i++){
        $indeks = $i;
        echo "<br><br> Iterasi data ke $i <br>";
        for($j=$i+1; $j<count($angka); $j++){
            if($angka[$j]<$angka[$indeks]){
                $indeks = $j;
            }
        }
        $datatukar = $angka[$indeks];
        $angka[$indeks] = $angka[$i];
        $angka[$i] = $datatukar;
        echo "__ Hasil pertukaran : ";
        echo implode(', ', $angka);
    }
    return $angka;
}

$randomNumberGenap = randomNumber(1, 100, 10);
echo "<H2>*****Selection sorting*****<br>  </H2>";
echo "<h3> Random angka : </h3>" . join(", ", $randomNumberGenap);
echo "<br><br>" ;
$sortedAngka = selectionSorting($randomNumberGenap);

echo "<br> <H3>Angka yang telah disorting: </H3>" .join (", ", $sortedAngka);
?>