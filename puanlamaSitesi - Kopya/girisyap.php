<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RAVORA | Üye Girişi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    :root { --bordo: #4c0519; --koyu: #120305; }
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(rgba(18, 3, 5, 0.8), rgba(18, 3, 5, 0.9)), 
                  url('https://images.unsplash.com/photo-1481627834876-b7833e8f5570?auto=format&fit=crop&w=1400');
      background-size: cover; background-position: center; height: 100vh;
      display: flex; align-items: center; justify-content: center; margin: 0;
    }
    .login-card {
      background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(15px);
      border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 20px;
      padding: 40px; width: 100%; max-width: 400px; color: white;
    }
    .brand-logo { font-weight: 700; color: white; text-decoration: none; font-size: 2rem; display: block; text-align: center; margin-bottom: 30px; }
    .form-control { background: rgba(255, 255, 255, 0.1); border: 1px solid rgba(255, 255, 255, 0.2); color: white; border-radius: 10px; padding: 12px; margin-bottom: 20px; }
    .form-control:focus { background: rgba(255, 255, 255, 0.15); border-color: var(--bordo); color: white; box-shadow: none; }
    .btn-login { background-color: var(--bordo); border: none; color: white; width: 100%; padding: 12px; border-radius: 10px; font-weight: 600; transition: 0.3s; }
    .btn-login:hover { background-color: #700a26; transform: translateY(-2px); }
    .extra-links { text-align: center; margin-top: 20px; font-size: 0.85rem; }
    .extra-links a { color: #ccc; text-decoration: none; }
    .back-home { position: absolute; top: 20px; left: 20px; color: white; text-decoration: none; }
  </style>
</head>
<body>

  <a href="index.php" class="back-home"><i class="fas fa-arrow-left me-2"></i>Ana Sayfa</a>

  <div class="login-card">
    <a href="index.php" class="brand-logo">RAVORA</a>
    <h5 class="text-center mb-4 fw-light">Dünyamıza Yeniden Katıl</h5>
    
    <form action="islem.php" method="POST">
      <div class="mb-3">
        <label class="form-label">Kullanıcı Adı</label>
        <input type="text" name="username" class="form-control" placeholder="Kullanıcı adınız" required>
      </div>
      
      <div class="mb-3">
        <label class="form-label">Parola</label>
        <input type="password" name="password" class="form-control" placeholder="Parolanız" required>
      </div>

      <div class="d-flex justify-content-between mb-3">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="remember">
          <label class="form-check-label small" for="remember">Beni Hatırla</label>
        </div>
        <a href="#" class="small text-secondary text-decoration-none">Şifremi Unuttum</a>
      </div>

      <button type="submit" name="giris_yap" class="btn-login shadow">GİRİŞ YAP</button>
    </form>

    <div class="extra-links">
      <p>Henüz bir hesabın yok mu? <a href="kayit.php" class="fw-bold text-white">Kaydol</a></p>
    </div>
  </div>

</body>
</html>