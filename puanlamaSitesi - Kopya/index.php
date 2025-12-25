<?php 
session_start(); 
?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RAVORA | Kitap Dizi Film Müzik</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet"> <!-- yazı tipi -->
</head>
<body>

  <!-- Burası navbar, sitenin üstündeki menü çubuğu ve sayfalar arasında gezmemizi sağlar.-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-bordo shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">RAVORA</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav align-items-center">
  <li class="nav-item"><a class="nav-link active" href="index.php">Ana Sayfa</a></li>
  <li class="nav-item"><a class="nav-link" href="kitaplar.php">Kitaplar</a></li>
  <li class="nav-item"><a class="nav-link" href="diziler.php">Diziler</a></li>
  <li class="nav-item"><a class="nav-link" href="filmler.php">Filmler</a></li>
  <li class="nav-item"><a class="nav-link" href="müzikler.php">Müzikler</a></li>

  <?php if(isset($_SESSION['username'])): ?>
    <li class="nav-item dropdown ms-lg-3">
      <a class="nav-link dropdown-toggle btn btn-danger text-white px-3" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-user-circle me-1"></i> <?php echo $_SESSION['username']; ?>
      </a>
      <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userDropdown">
        <li><a class="dropdown-item" href="profilim.php">Profilim</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item text-danger" href="cikis.php">Çıkış Yap</a></li>
      </ul>
    </li>
  <?php else: ?>
<li class="nav-item">
    <a class="btn btn-outline-light ms-2" href="girisyap.php">Giriş Yap</a>
</li>
<li class="nav-item">
    <a class="btn btn-outline-light ms-2" href="kayit.php">Kayıt Ol</a>
</li>
  <?php endif; ?>
</ul>
      </div>
    </div>
  </nav>

  <!-- Başlık bölümü sitenin en üstünde yer alan büyük dikkat çekici başlığın özelliklerini içerir. -->
  <section class="hero text-center text-light d-flex align-items-center justify-content-center">
    <div class="container">
      <h1 class="display-5 fw-semibold">Kitap, Dizi, Film ve Müzik Dünyasına Katıl</h1>
      <p class="lead mt-3">Puanla, yorum yap, keşfet ve paylaş.</p>
      <a href="#" class="btn btn-light btn-lg mt-3 px-4">Keşfet</a>
    </div>
  </section>

  <!-- konteynırlar sitenin iç yapısını, konumunu düzenler. -->
  <section class="container py-5">
    <h2 class="text-center fw-semibold mb-5">Popüler İçerikler</h2>
    <div class="row g-4">
      <div class="col-md-3">
        <div class="card content-card shadow-sm">
          <img src="https://i.pinimg.com/736x/ad/6f/cb/ad6fcb1f641bad5bef12e42d61af0025.jpg" class="card-img-top" alt="Kitap">
          <div class="card-body">
            <h5 class="card-title">BÖYLE BUYURDU ZERDÜŞT</h5>
            <p class="card-text text-muted small">Ortalama Puan: ⭐ 4.5</p>
            <p class="card-text"> Böyle Buyurdu Zerdüşt hem edebiyat hem de felsefede ele alınabilecek bir kitaptır. Bu eserde, insan sadece varlığı açısından değil, varlık olmasının beraberinde getirdiği gereksinimler de konu edilmiştir. Bu yönüyle okuyucuların salt bir okuyucu rolünden çıkıp düşünmesi amaçlanmıştır.</p>
            <a href="#" class="btn btn-outline-bordo w-50">Detay Gör</a>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card content-card shadow-sm">
          <img src="https://i.pinimg.com/736x/b4/72/66/b472666ac15533928b540e08a26e8f9a.jpg" class="card-img-top" alt="Film">
          <div class="card-body">
            <h5 class="card-title">FIGHT CLUB</h5>
            <p class="card-text text-muted small">Ortalama Puan: ⭐ 4.2</p>
            <p class="card-text">‘Fight Club’, monoton bir hayattan sıkılan bir karakterin iç dünyasına ve başkaldırısına odaklanır. Anonim karakter, kronik uykusuzlukla boğuşurken Tyler Durden ile tanışır ve bir yeraltı dövüş kulübü kurmaya karar verirler.</p>
            <a href="#" class="btn btn-outline-bordo w-100">Detay Gör</a>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card content-card shadow-sm">
          <img src="https://i.pinimg.com/736x/36/b2/e9/36b2e9b3a28c857bb233920e2f9100f0.jpg" class="card-img-top" alt="Dizi">
          <div class="card-body">
            <h5 class="card-title">LA CASA DE PAPEL</h5>
            <p class="card-text text-muted small">Ortalama Puan: ⭐ 4.7</p>
            <p class="card-text">La Casa de Papel, gizemli bir adam olan “Profesör”ün liderliğinde bir araya gelen sekiz yetenekli suçlunun İspanya Kraliyet Darphanesi'ni soymak için yaptığı büyük ve detaylı planı konu alır.</p>
            <a href="#" class="btn btn-outline-bordo w-100">Detay Gör</a>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card content-card shadow-sm">
          <img src="https://i.pinimg.com/736x/5f/7d/e9/5f7de9a181d5ac3a1d08ad91a1d1439d.jpg" class="card-img-top" alt="Müzik">
          <div class="card-body">
            <h5 class="card-title">ALL EYEZ ON ME</h5>
            <p class="card-text text-muted small">Ortalama Puan: ⭐ 4.8</p>
            <p class="card-text"> All Eyez on Me, Batı Yakası rapçisi 2Pac'ın dördüncü stüdyo albümüdür. 13 Şubat 1996'da çıkan albüm, ilk haftasında yaklaşık 566.000 kopya satmıştır.[1] Albüm, yayınlanmasından tam 7 ay sonra, 13 Eylül'de ölen 2Pac'ın yaşarken çıkan son albümüdür.</p>
              <a href="#" class="btn btn-outline-bordo w-100">Detay Gör</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
