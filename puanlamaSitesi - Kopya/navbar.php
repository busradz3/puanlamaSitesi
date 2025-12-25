<nav class="navbar navbar-expand-lg navbar-dark bg-bordo shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold" href="index.php">RAVORA</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav align-items-center">
          <li class="nav-item"><a class="nav-link" href="index.php">Ana Sayfa</a></li>
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
            <li class="nav-item"><a class="btn btn-outline-light ms-2" href="girisyap.php">Giriş Yap</a></li>
            <li class="nav-item"><a class="btn btn-outline-light ms-2" href="kayitol.php">Kayıt Ol</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
</nav>