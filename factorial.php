<?php
//Tjoet Muty Ahmad
//F55122013

function rekursif_faktorial ($nilai){
    if ($nilai == 1){ //sebagai terminator
        return $nilai;
    } else{
        return $nilai * rekursif_faktorial ($nilai-1);
    }
}

function iterasi_faktorial ($nilai){
    $hasil = 1;
    for($i = 0; $i<$nilai; $i++){
        $hasil = $hasil * ($i + 1);
    }
    return $hasil;
}
$nilai = 10;
echo "Hasil perhitungan dari $nilai! adalah sebagai berikut: <br> "; //echo itu seperti cout
echo "Rekursif= ".rekursif_faktorial($nilai). "<br>";
echo "Iterasi= ".iterasi_faktorial($nilai);
?>