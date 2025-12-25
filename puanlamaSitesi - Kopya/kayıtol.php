<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RAVORA | Kayıt Ol</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    :root { --bordo: #4c0519; --koyu: #120305; }
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(rgba(18, 3, 5, 0.8), rgba(18, 3, 5, 0.9)), 
                  url('https://images.unsplash.com/photo-1481627834876-b7833e8f5570?auto=format&fit=crop&w=1400');
      background-size: cover; background-position: center; min-height: 100vh;
      display: flex; align-items: center; justify-content: center; margin: 0; padding: 20px 0;
    }
    .login-card {
      background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(15px);
      border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 20px;
      padding: 40px; width: 100%; max-width: 450px; color: white;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
    }
    .brand-logo { font-weight: 700; color: white; text-decoration: none; font-size: 2rem; display: block; text-align: center; margin-bottom: 20px; letter-spacing: 2px; }
    .form-control { background: rgba(255, 255, 255, 0.1); border: 1px solid rgba(255, 255, 255, 0.2); color: white; border-radius: 10px; padding: 12px; margin-bottom: 15px; }
    .form-control:focus { background: rgba(255, 255, 255, 0.15); border-color: var(--bordo); color: white; box-shadow: none; }
    .btn-login { background-color: var(--bordo); border: none; color: white; width: 100%; padding: 12px; border-radius: 10px; font-weight: 600; transition: 0.3s; margin-top: 10px; }
    .btn-login:hover { background-color: #700a26; transform: translateY(-2px); }
    .extra-links { text-align: center; margin-top: 20px; font-size: 0.85rem; }
    .extra-links a { color: #ccc; text-decoration: none; }
    .back-home { position: absolute; top: 20px; left: 20px; color: white; text-decoration: none; font-size: 0.9rem; }
  </style>
</head>
<body>

  <a href="index.php" class="back-home"><i class="fas fa-arrow-left me-2"></i>Ana Sayfa'ya Dön</a>

  <div class="login-card">
    <a href="index.php" class="brand-logo">RAVORA</a>
    <h5 class="text-center mb-4 fw-light">Aramıza Katıl</h5>
    
    <form action="./islem.php" method="POST">
      <div class="mb-2">
        <label class="form-label small fw-light">Ad Soyad</label>
        <input type="text" name="ad_soyad" class="form-control" placeholder="Adınızı girin" required>
      </div>

      <div class="mb-2">
        <label class="form-label small fw-light">E-posta</label>
        <input type="email" name="email" class="form-control" placeholder="E-posta adresiniz" required>
      </div>

      <div class="mb-2">
        <label class="form-label small fw-light">Kullanıcı Adı</label>
        <input type="text" name="username" class="form-control" placeholder="Bir kullanıcı adı seçin" required>
      </div>
      
      <div class="mb-3">
        <label class="form-label small fw-light">Parola</label>
        <input type="password" name="password" class="form-control" placeholder="Güçlü bir parola oluşturun" required>
      </div>

      <button type="submit" name="kayit_ol" class="btn-login shadow">KAYDOL</button>
    </form>

    <div class="extra-links">
      <p>Zaten bir hesabın var mı? <a href="login.php" class="fw-bold text-white">Giriş Yap</a></p>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>