<?php
// 1. Variabel dan Tipe Data
$nama = "Owen";               // String
$umur = 21;                    // Integer
$beratBadan = 65.5;            // Float
$isAdmin = true;               // Boolean

echo "Halo, nama saya $nama.<br>";
echo "Umur saya $umur tahun dan berat badan saya $beratBadan kg.<br><br>";

// 2. Kondisi (if-else)
if ($umur >= 18) {
    echo "Anda sudah dewasa.<br>";
} else {
    echo "Anda masih di bawah umur.<br>";
}

echo "<br>";

// 3. Switch Case
$role = "admin";

switch ($role) {
    case "admin":
        echo "Selamat datang, Admin!<br>";
        break;
    case "user":
        echo "Selamat datang, User!<br>";
        break;
    default:
        echo "Role tidak dikenali.<br>";
}

echo "<br>";

// 4. Looping (for dan while)
echo "Menghitung dari 1 sampai 5 dengan for loop:<br>";
for ($i = 1; $i <= 5; $i++) {
    echo "$i ";
}
echo "<br><br>";

echo "Menghitung mundur dari 5 ke 1 dengan while loop:<br>";
$j = 5;
while ($j >= 1) {
    echo "$j ";
    $j--;
}
echo "<br><br>";

// 5. Array dan foreach
$buah = ["Apel", "Mangga", "Jeruk", "Pisang"];

echo "Daftar Buah:<br>";
foreach ($buah as $b) {
    echo "- $b<br>";
}

echo "<br>";

// 6. Array Asosiatif
$mahasiswa = [
    "nama" => "Owen Limantoro",
    "jurusan" => "Informatika",
    "umur" => 21
];

echo "Data Mahasiswa:<br>";
echo "Nama: " . $mahasiswa["nama"] . "<br>";
echo "Jurusan: " . $mahasiswa["jurusan"] . "<br>";
echo "Umur: " . $mahasiswa["umur"] . " tahun<br>";

?> 


<?php
$nama = "Manto";
echo "Halo, $nama!";
?>

<?php
if ($x > 3) {
    echo "Lebih besar dari 3";
} else {
    echo "Kurang atau sama dengan 3";
}
?>


<?php
$nilai = 70;
switch ($nilai) {
    case 100:
        echo "Sempurna";
        break;
    case 70:
        echo "Baik";
        break;
    default:
        echo "Cukup";
}
?>

<?php
for ($i = 0; $i < 5; $i++) {
    echo "PHP Loop<br>";
}
?>


<?php
$buah = ["Apel", "Mangga", "Pisang", "Jeruk"];
?>

<?php
$i = 3;
while ($i > 0) {
    echo $i . " ";
    $i--;
}
?>

