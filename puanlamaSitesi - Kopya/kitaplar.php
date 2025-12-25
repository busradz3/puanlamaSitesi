<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RAVORA | Kitap Arşivi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    :root { --bordo: #5e0b0b; --koyu-bordo: #2d0a10; }
    body { font-family: 'Poppins', sans-serif; background-image: url('zambak.jpg'); background-size: cover; background-position: center; color: #a11717ff; }
    .bg-bordo { background-color: var(--bordo) !important; }
    
    /* Kart Tasarımı */
    .content-card {
      border: none; transition: all 0.3s ease; height: 100%; border-radius: 15px; overflow: hidden;
    }
    .content-card:hover { transform: translateY(-10px); box-shadow: 0 15px 30px rgba(76, 5, 25, 0.2) !important; }
    .card-img-top { height: 350px; object-fit: cover; }

    /* Butonlar ve Etkileşim */
    .btn-outline-bordo { border-color: var(--bordo); color: var(--bordo); transition: 0.3s; }
    .btn-outline-bordo:hover { background-color: var(--bordo); color: white; }
    .interaction-bar { border-top: 1px solid #f0f0f0; padding-top: 12px; }
    .interact-btn { color: #888; background: none; border: none; font-size: 0.85rem; transition: 0.2s; }
    .interact-btn:hover { color: var(--bordo); }
    /* Modal (Özet Alanı) Özelleştirme */
    .modal-header { background-color: var(--bordo); color: white; }
    .analysis-box { background-color: #db6778ff; border-left: 5px solid var(--bordo); padding: 15px; font-style: italic; }
  .hero {
  background: linear-gradient(rgba(141, 106, 106, 0.7), rgba(91,10,10,0.7)),
              url('https://source.unsplash.com/1600x700/?cinema,books,music') center/cover;
  height: 50vh;
  background-size: cover;
font-family: 'Times New Roman', Times, serif;
}
  </style>
</head>
<body>

<?php include 'navbar.php'; ?>

  <header class="category-hero text-center">
    <div class="container">
      <h1 class="display-4 fw-bold"> Kitap Arşivi</h1>
      <p class="lead opacity-75">En yüksek puan alan  kült eser, analizleri ve özetleriyle burada.</p>
    </div>
  </header>

  <main class="container py-5">
    <div class="row g-4" id="book-container">
      </div>
  </main>

  <div class="modal fade" id="bookModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">Kitap Başlığı</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h6><strong>Özet:</strong></h6>
          <p id="modalSummary">Özet buraya gelecek...</p>
          <hr>
          <h6><strong>Topluluk Analizi:</strong></h6>
          <div class="analysis-box" id="modalAnalysis">Analiz buraya gelecek...</div>
        </div>
      </div>
    </div>
  </div>

  <script>
    const books = [
      { id: 1, title: "Böyle Buyurdu Zerdüşt", author: "Nietzsche", rating: "4.8", img: "https://i.pinimg.com/736x/ad/6f/cb/ad6fcb1f641bad5bef12e42d61af0025.jpg", summary: "Nietzsche'nin en ünlü eseridir. Üstinsan kavramını ve Tanrı'nın ölümünü Zerdüşt karakteri üzerinden anlatır.", analysis: "Varoluşçu felsefenin temelidir; bireyin kendi değerlerini yaratma sürecini analiz eder." },
      { id: 2, title: "1984", author: "George Orwell", rating: "4.9", img: "1984.jpg", summary: "Büyük Birader'in izlediği totaliter bir distopyadır.", analysis: "Gözetim toplumunun ve dilin manipülasyonunun en güçlü eleştirisidir." },
      { id: 3, title: "Simyacı", author: "Paulo Coelho", rating: "4.5", img: "simyacı.jpg", summary: "Kişisel menkıbesini arayan Santiago'nun Mısır piramitlerine yolculuğu.", analysis: "Kader, işaretler ve hayallerin peşinden gitme üzerine ruhsal bir rehber niteliğindedir." },
      { id: 4, title: "Suç ve Ceza", author: "Dostoyevski", rating: "4.9", img: "suçveceza.jpg", summary: "Raskolnikov'un bir tefeciyi öldürmesi ve yaşadığı vicdan azabı.", analysis: "İnsan psikolojisinin derinliklerine inen, etik ve ceza kavramlarını sorgulayan bir başyapıttır." },
     { id: 5, title: "Uğultulu Tepeler", author: "Emily Bronte", rating: "4.8", img: "tepe.jpg", summary: "Nietzsche'nin en ünlü eseridir. Üstinsan kavramını ve Tanrı'nın ölümünü Zerdüşt karakteri üzerinden anlatır.", analysis: "Varoluşçu felsefenin temelidir; bireyin kendi değerlerini yaratma sürecini analiz eder." },
      { id: 6, title: "Tutunamayanlar", author: "Oğuz Atay", rating: "4.9", img: "tutunamayanlar.jpg", summary: "Büyük Birader'in izlediği totaliter bir distopyadır.", analysis: "Gözetim toplumunun ve dilin manipülasyonunun en güçlü eleştirisidir." },
      { id: 7, title: "Bülbülü Öldürmek", author: "PHarper Lee", rating: "4.5", img: "bülbülüöldürmek.jpg", summary: "Kişisel menkıbesini arayan Santiago'nun Mısır piramitlerine yolculuğu.", analysis: "Kader, işaretler ve hayallerin peşinden gitme üzerine ruhsal bir rehber niteliğindedir." },
      { id: 8, title: "Yaşamak", author: "Ya Hua", rating: "4.9", img: "yaşamak.jpg", summary: "Raskolnikov'un bir tefeciyi öldürmesi ve yaşadığı vicdan azabı.", analysis: "İnsan psikolojisinin derinliklerine inen, etik ve ceza kavramlarını sorgulayan bir başyapıttır." },
    ];

    for(let i=5; i<=4; i++) {
      books.push({
        id: i,
        title: `Klasik Eser #${i}`,
        author: "Dünya Yazarı",
        rating: (4 + Math.random()).toFixed(1),
        img: `https://picsum.photos/seed/${i+8}/400/600`,
        summary: "Bu kitap insan ruhunun derinliklerine ve toplumsal yapının çarpıklıklarına ışık tutan evrensel bir hikayedir.",
        analysis: "Kritik bir bakış açısıyla; yazarın kullandığı sembolizm modern dünyanın sancılarını temsil eder."
      });
    }

    const container = document.getElementById('book-container');
    books.forEach(book => {
      container.innerHTML += `
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="card content-card shadow-sm">
            <img src="${book.img}" class="card-img-top" alt="${book.title}">
            <div class="card-body d-flex flex-column">
              <h6 class="fw-bold mb-1">${book.title}</h6>
              <p class="text-muted small mb-2">${book.author} | ⭐ ${book.rating}</p>
              <div class="interaction-bar mb-3">
                <button class="interact-btn"><i class="far fa-comment"></i> ${Math.floor(Math.random()*100)}</button>
                <button class="interact-btn"><i class="fas fa-retweet"></i> ${Math.floor(Math.random()*50)}</button>
                <button class="interact-btn"><i class="far fa-heart"></i> ${Math.floor(Math.random()*200)}</button>
              </div>
              <button class="btn btn-outline-bordo btn-sm mt-auto" onclick="showDetails(${book.id})">Detay Gör</button>
            </div>
          </div>
        </div>
      `;
    });

    function showDetails(id) {
      const book = books.find(b => b.id === id);
      document.getElementById('modalTitle').innerText = book.title;
      document.getElementById('modalSummary').innerText = book.summary;
      document.getElementById('modalAnalysis').innerText = book.analysis;
      new bootstrap.Modal(document.getElementById('bookModal')).show();
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>