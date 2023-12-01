<?php

//insertion sort
function insertionSorting($angka){
    for($i=1; $i<count($angka); $i++){
        $selected = $angka[$i];
        echo "<br> Iterasi data ke $i <br>";
        echo "data yang terpilih : $selected <br>";

        $j=$i-1;
        while ($j>=0 && ($angka[$j] > $selected)){
            $angka[$j+1] = $angka[$j];
            $angka[$j] = $selected;
            $j--;
        }
        $angka[$j+1] = $selected;
        echo join (",", $angka);
        echo "<br>";
    }
    return $angka;
}

//merge sort
function mergeSorting($angka){
    if(count($angka) == 1)
        return $angka;
        $mid = count($angka) / 2;
            $kiri =array_slice($angka, 0, $mid);
            $kanan =array_slice($angka, $mid);
        echo "<br>Proses Pembagian Kiri | Kanan : ";
        echo implode(',', $kiri)." ";
        echo " | ";
        echo implode(', ', $kanan). " <br>";
        $kiri = mergeSorting($kiri);
        $kanan = mergeSorting($kanan);

        $res = [];
        while (count($kiri) > 0 && count($kanan) > 0){
            if($kiri[0] > $kanan[0]){
                $res[] = $kanan[0];
                $kanan = array_slice($kanan, 1);
            }else{
                $res[] = $kiri[0];
                $kiri = array_slice($kiri, 1);
            }
        }
    while (count($kiri) > 0){
        $res[] = $kiri[0];
        $kiri = array_slice($kiri, 1);
    }
    while (count($kanan) > 0){
        $res[] = $kanan[0];
        $kanan = array_slice($kanan, 1);
    }
    echo "hasil : ";
    echo implode (' ,', $res);
    echo "<br>";
    return $res;
}

//selection sort
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


$angka = [7, 2, 1, 6, 5, 4, 9, 8];
echo "<H1> Data Acak : " .join(" ,", $angka) ."</H1>";
echo "<br>";
echo "<H2>*****Insertion sorting*****<br>  </H2>";
insertionSorting($angka);
echo "<H2>*****Merge sorting*****<br>  </H2>";
mergeSorting($angka);
echo "<H2>*****Selection sorting*****<br>  </H2>";
selectionSorting($angka);