<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Ririn26</title>

</head>
<body>
    <h2>Nilai Perhitungan Akhir</h2>
    <form method="post">
        Masukkan Nama: <input type="text" name="nama"><br>
        Masukkan Nilai Tugas1: <input type="number" name="nilai_tgs1"><br>
        Masukkan Nilai Tugas2: <input type="number" name="nilai_tgs2"><br>
        Masukkan Nilai Keaktifan: <input type="number" name="nilai_keaktifan"><br>
        Masukkan Nilai Sikap: <input type="number" name="nilai_sikap"><br>
        Masukkan Nilai Ujian: <input type="number" name="nilai_ujian"><br>
        <input type="submit" name="submit" value="kirim">
    </form>

<?php
class Ririn26{
    //properti
    public $nama;
    public $nilai_tgs1;
    public $nilai_tgs2;
    public $nilai_keaktifan;
    public $nilai_sikap;
    public $nilai_ujian;
    //construct
    public function __construct($nama,$nilai_tgs1,$nilai_tgs2,$nilai_keaktifan,$nilai_sikap,$nilai_ujian){
        $this->nama = $nama;
        $this->nilai_tgs1 = $nilai_tgs1;
        $this->nilai_tgs2 = $nilai_tgs2;
        $this->nilai_keaktifan = $nilai_keaktifan;
        $this->nilai_sikap = $nilai_sikap;
        $this->nilai_ujian = $nilai_ujian;
    }

    public function HitungTotalNilai(){
        return $this->nilai_tgs1 + $this->nilai_tgs2 + $this->nilai_keaktifan + $this->nilai_sikap + $this->nilai_ujian; 
    }
    
    public function hitungNilaiAkhir(){
        $nilaiAkhirMax = 100;
        $nilaiAkhir = 0.2 * $this->nilai_tgs1 + 0.2 * $this->nilai_tgs2 + 0.25 * $this->nilai_keaktifan + 0.25 * $this->nilai_sikap + 0.3 * $this->nilai_ujian;
        if ($nilaiAkhir > $nilaiAkhirMax) {
            $nilaiAkhir = $nilaiAkhirMax;
        }
        return $nilaiAkhir;
    }

    public function hitungGrade(){
        $nilaiAkhir = $this->hitungNilaiAkhir();
        if($nilaiAkhir >= 91 && $nilaiAkhir <= 100){
            return 'A';
        } elseif($nilaiAkhir >= 81 && $nilaiAkhir <= 90){
            return 'B';
        } elseif($nilaiAkhir >= 71 && $nilaiAkhir <= 80){
            return 'C';
        } elseif($nilaiAkhir >= 61 && $nilaiAkhir <= 70){
            return 'D';
        } else {
            return 'E';
        }
    }

    public function getNama(){
        return $this->nama;
    }    
}

class Siswa extends Ririn26{
}    

if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $nilai_tgs1 = $_POST['nilai_tgs1'];
    $nilai_tgs2 = $_POST['nilai_tgs2'];
    $nilai_keaktifan = $_POST['nilai_keaktifan'];
    $nilai_sikap = $_POST['nilai_sikap'];
    $nilai_ujian = $_POST['nilai_ujian'];


$siswa = new Siswa($nama,$nilai_tgs1,$nilai_tgs2,$nilai_keaktifan,$nilai_sikap,$nilai_ujian);
echo "Nama Siswa:".$siswa->getNama()."<br>";
echo"Nilai Akhir:". $siswa->hitungNilaiAkhir()."<br>";
echo "Grade:". $siswa->hitungGrade();
}
?>


</body>
</html>