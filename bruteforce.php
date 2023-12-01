<?php
$text = 'data adalah catatan atas kumpulan fakta. data merupakan bentuk jamak dari datum,
        berasal dari bahasa Latin yang berarti "sesuatu yang diberikan". Dalam penggunaan sehari-hari
        data berarti suatu pernyataan yang diterima secara apa adanya. Pernyataan ini adalah hasil
        pengukuran atau pengamatan suatu variabel yang bentuknya dapat berupa angka, kata-kata, atau citra.
        data yang berupa angka-angka disebut data kuantitatif, sedangkan data yang bukan berupa angka
        disebut data kualitatif. Berdasarkan cara memperolehnya, data kuantitatif terbagi atas data
        diskrit dan data kontinu. data diskrit adalah data yang diperoleh dengan cara menghitung, 
        sedangkan data kontinu adalah data yang diperoleh dengan cara mengukur.';
$text = str_split($text);
$katakunci = 'data';
$katakunci = str_split($katakunci);

function search ($text, $katakunci){
    $lt = count($text);
    $lp = count($katakunci);
    $jumlahhasil = 0;

    for($i=0; $i < $lt; $i++) {
        $ditemukan = [];
        for($j=0; $j < $lp; $j++){ 
            if($text [$i + $j] != $katakunci[$j]) {
                break;
            } else {
                array_push($ditemukan, 1);
            }
        }
        if(count($ditemukan) == $lp){
            $jumlahhasil +=1;
            }
        }
    return $jumlahhasil;
}

$totalhasil = search ($text, $katakunci);
echo "================ Pencarian Dengan Algoritma Brute Force ================ <br>";
echo "Kalimat/text : <br>".join ("", $text) . "<br><br>";
echo "Kata yang dicari/pattern : " .join ("", $katakunci) . "<br><br>";
echo "Total Jumlah kata \"" .join ("", $katakunci) . "\" dalam text Sebanyak: $totalhasil <br>";
?>