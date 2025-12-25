<?php
session_start(); // 1. Her zaman en üstte oturumu başlat
require_once 'baglan.php'; // 2. Hemen ardından veritabanını bağla ki altındaki kodlar çalışabilsin

// --- GİRİŞ YAPMA KODU ---
if (isset($_POST['giris_yap'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];

    // Artık $db değişkeni yukarıda tanımlandığı için hata vermeyecek
    $sorgu = $db->prepare("SELECT * FROM kullanicilar WHERE username = ?");
    $sorgu->execute([$username]);
    $kullanici = $sorgu->fetch();

    if ($kullanici && password_verify($password, $kullanici['sifre'])) {
        $_SESSION['user_id'] = $kullanici['id'];
        $_SESSION['username'] = $kullanici['username'];
        echo "<script>alert('Giriş başarılı! Hoş geldin, " . $kullanici['username'] . "'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Kullanıcı adı veya şifre hatalı!'); window.location.href='girisyap.php';</script>";
    }
}

// --- KAYIT OLMA KODU ---
if (isset($_POST['kayit_ol'])) {
    $ad_soyad = htmlspecialchars($_POST['ad_soyad']);
    $email    = htmlspecialchars($_POST['email']);
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        $kontrol = $db->prepare("SELECT * FROM kullanicilar WHERE email = ? OR username = ?");
        $kontrol->execute([$email, $username]);
        
        if ($kontrol->rowCount() > 0) {
            echo "<script>alert('Bu e-posta veya kullanıcı adı zaten kullanımda!'); window.location.href='kayit.php';</script>";
        } else {
            $sorgu = $db->prepare("INSERT INTO kullanicilar (ad_soyad, email, username, sifre) VALUES (?, ?, ?, ?)");
            $ekle = $sorgu->execute([$ad_soyad, $email, $username, $hashed_password]);

            if ($ekle) {
    echo "<script>
        alert('RAVORA dünyasına hoş geldin! Giriş yapabilirsin.');
        window.location.href='girisyap.php';
    </script>";
    exit;
}
        }
    } catch (PDOException $e) {
        echo "Bir hata oluştu: " . $e->getMessage();
    }
}
?>