<?php
$host    = '127.0.0.1';
$port    = '3307'; // Wamp MariaDB genelde 3307 veya 3308 kullanır
$db_name = 'ravora'; // Kendi veritabanı adını buraya yaz
$user    = 'root';
$pass    = ''; 

try {
    // MariaDB bağlantısında portu dsn içine açıkça yazıyoruz
    $db = new PDO("mysql:host=$host;port=$port;dbname=$db_name;charset=utf8", $user, $pass);
    
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "RAVORA MariaDB Bağlantısı Başarılı!"; 
} catch (PDOException $e) {
    // Eğer 3307 hata verirse aşağıdaki die satırını silip portu 3308 yapıp tekrar dene
    die("Bağlantı hatası: " . $e->getMessage());
}
?>