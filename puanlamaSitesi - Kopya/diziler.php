<?php session_start(); ?>
<!DOCTYPE html>
<html lang="tr">
  
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RAVORA | Dizi Analiz Merkezi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    /* Senin ana sayfa renklerin ve ek estetik dokunuşlar */
    :root { --bordo: #5e0b0b; --altin: #d4af37; }
    body { font-family: 'Poppins', sans-serif; background-color: #120305; color: #f3f4f6; }
    
    .bg-bordo { background-color: var(--bordo) !important; }

    /* Çiçekli ve Bordo Hero Alanı */
    .hero-series {
      background: 
                  url('friends.jpg');
      background-size: cover; background-position: center; padding: 100px 0; border-bottom: 2px solid var(--altin);
    }

    /* Dizi Kartları */
    .series-card {
      background: rgba(45, 10, 16, 0.7); border: 1px solid rgba(212, 175, 55, 0.2);
      border-radius: 15px; transition: 0.4s; overflow: hidden; height: 100%;
    }
    .series-card:hover { transform: translateY(-10px); border-color: var(--altin); box-shadow: 0 10px 30px rgba(76, 5, 25, 0.5); }
    .card-img-top { height: 350px; object-fit: cover; }

    /* Modal İçeriği */
    .modal-content { background-color: #1a050a; color: #eee; border: 2px solid var(--altin); border-radius: 20px; }
    .modal-header { border-bottom: 1px solid var(--altin); }
    .analysis-text { line-height: 1.8; border-left: 3px solid var(--altin); padding-left: 20px; text-align: justify; }
  </style>
</head>
<body>

<?php include 'navbar.php'; ?>

  <section class="hero-series text-center">
    <div class="container">
      <h1 class="display-4 fw-bold">Dünya Dizileri</h1>
      <p class="lead mt-3">Kült yapımların perde arkası ve topluluk yorumları.</p>
    </div>
  </section>

  <section class="container py-5">
    <div class="row g-4" id="series-container">
      </div>
  </section>

  <div class="modal fade" id="analysisModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content p-4">
        <div class="modal-header">
          <h4 class="modal-title fw-bold" id="mTitle" style="color: var(--altin);"></h4>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <p id="mSummary" class="fst-italic text-muted mb-4"></p>
          <div id="mAnalysis" class="analysis-text"></div>
        </div>
      </div>
    </div>
  </div>

  <script>
    const seriesData = [
      {
        title: "Breaking Bad",
        img: "breakingbad.jpg",
        summary: "Walter White'ın sıradan bir öğretmenden bir suç imparatoruna dönüşümü.",
        analysis: "Breaking Bad, bir anti-kahramanın doğuşunu değil, bir insanın içindeki karanlığın uyanışını analiz eder. Walter White, başlangıçta ailesi için yola çıksa da, zamanla kendi egosu ve güç tutkusuyla yüzleşir. Dizi boyunca kullanılan renk sembolizmi, her sahnenin karakterlerin o anki ruh halini yansıtmasıyla teknik bir deha sunar. Güç yozlaştırır temasının televizyon tarihindeki en sert ve tutarlı işlendiği yapımlardan biridir. Ahlaki değerlerin nasıl esnediğini ve suçun bireyi nasıl dönüştürdüğünü 5 sezon boyunca kusursuz bir tempoyla anlatır."
      },
      {
        title: "Dark",
        img: "dark.jpg",
        summary: "Zamanın döngüselliği ve nesiller boyu süren bir paradoks.",
        analysis: "Dark, 'zaman' kavramını sadece bir araç değil, bir karakter olarak kullanır. Dizi, özgür iradenin aslında bir yanılsama olup olmadığını, her şeyin önceden belirlenmiş bir döngüde hapsolup hapsolmadığını sorgular. Bilimsel teorileri (Schrödinger'in Kedisi, sicim teorisi) mitolojik hikayelerle harmanlayarak izleyiciyi zihinsel bir labirente davet eder. Karakterlerin kendi trajedilerini önlemek için yaptıkları hamlelerin, aslında o trajediyi yaratan ana sebepler olması, determinizmin en güçlü analizidir. Atmosferi ve görselliğiyle melankolik bir başyapıttır."
      },
      {
        title: "Succession",
        img: "succesion.jpg",
        summary: "Devasa bir medya imparatorluğunda miras ve güç kavgası.",
        analysis: "Succession, zenginliğin getirdiği konforun değil, o konforun içinde çürüyen insan ruhlarının analizidir. Roy ailesi, sevginin sadece bir pazarlık aracı olduğu, travmaların nesiller boyu bir silah gibi kullanıldığı modern bir krallığı temsil eder. Dizi, Shakespearian bir güç mücadelesini kurumsal dünyanın acımasızlığıyla birleştirir. Her karakterin derin yalnızlığı ve babalarının onayına duydukları açlık, devasa gökdelenlerin içinde aslında ne kadar küçük kaldıklarını gösterir. Kapitalizmin aile yapısı üzerindeki yıkıcı etkisini kara mizahla birleştiren eşsiz bir dramadır."
      },
      {
        title: "The Sopranos",
        img: "sopranos.jpg",
        summary: "Devasa bir medya imparatorluğunda miras ve güç kavgası.",
        analysis: "Succession, zenginliğin getirdiği konforun değil, o konforun içinde çürüyen insan ruhlarının analizidir. Roy ailesi, sevginin sadece bir pazarlık aracı olduğu, travmaların nesiller boyu bir silah gibi kullanıldığı modern bir krallığı temsil eder. Dizi, Shakespearian bir güç mücadelesini kurumsal dünyanın acımasızlığıyla birleştirir. Her karakterin derin yalnızlığı ve babalarının onayına duydukları açlık, devasa gökdelenlerin içinde aslında ne kadar küçük kaldıklarını gösterir. Kapitalizmin aile yapısı üzerindeki yıkıcı etkisini kara mizahla birleştiren eşsiz bir dramadır."
      },
      {
        title: "Paeaky Blinders",
        img: "peakyy.jpg",
        summary: "Devasa bir medya imparatorluğunda miras ve güç kavgası.",
        analysis: "Succession, zenginliğin getirdiği konforun değil, o konforun içinde çürüyen insan ruhlarının analizidir. Roy ailesi, sevginin sadece bir pazarlık aracı olduğu, travmaların nesiller boyu bir silah gibi kullanıldığı modern bir krallığı temsil eder. Dizi, Shakespearian bir güç mücadelesini kurumsal dünyanın acımasızlığıyla birleştirir. Her karakterin derin yalnızlığı ve babalarının onayına duydukları açlık, devasa gökdelenlerin içinde aslında ne kadar küçük kaldıklarını gösterir. Kapitalizmin aile yapısı üzerindeki yıkıcı etkisini kara mizahla birleştiren eşsiz bir dramadır."
      },
      {
        title: "Avrupa Yakası",
        img: "avrupa.jpg",
        summary: "Devasa bir medya imparatorluğunda miras ve güç kavgası.",
        analysis: "Succession, zenginliğin getirdiği konforun değil, o konforun içinde çürüyen insan ruhlarının analizidir. Roy ailesi, sevginin sadece bir pazarlık aracı olduğu, travmaların nesiller boyu bir silah gibi kullanıldığı modern bir krallığı temsil eder. Dizi, Shakespearian bir güç mücadelesini kurumsal dünyanın acımasızlığıyla birleştirir. Her karakterin derin yalnızlığı ve babalarının onayına duydukları açlık, devasa gökdelenlerin içinde aslında ne kadar küçük kaldıklarını gösterir. Kapitalizmin aile yapısı üzerindeki yıkıcı etkisini kara mizahla birleştiren eşsiz bir dramadır."
      },
      {
        title: "How İ Met Your mother",
        img: "himym.jpg",
        summary: "Devasa bir medya imparatorluğunda miras ve güç kavgası.",
        analysis: "Succession, zenginliğin getirdiği konforun değil, o konforun içinde çürüyen insan ruhlarının analizidir. Roy ailesi, sevginin sadece bir pazarlık aracı olduğu, travmaların nesiller boyu bir silah gibi kullanıldığı modern bir krallığı temsil eder. Dizi, Shakespearian bir güç mücadelesini kurumsal dünyanın acımasızlığıyla birleştirir. Her karakterin derin yalnızlığı ve babalarının onayına duydukları açlık, devasa gökdelenlerin içinde aslında ne kadar küçük kaldıklarını gösterir. Kapitalizmin aile yapısı üzerindeki yıkıcı etkisini kara mizahla birleştiren eşsiz bir dramadır."
      },
      {
        title: "Game Of Thrones",
        img: "game.jpg",
        summary: "Devasa bir medya imparatorluğunda miras ve güç kavgası.",
        analysis: "Succession, zenginliğin getirdiği konforun değil, o konforun içinde çürüyen insan ruhlarının analizidir. Roy ailesi, sevginin sadece bir pazarlık aracı olduğu, travmaların nesiller boyu bir silah gibi kullanıldığı modern bir krallığı temsil eder. Dizi, Shakespearian bir güç mücadelesini kurumsal dünyanın acımasızlığıyla birleştirir. Her karakterin derin yalnızlığı ve babalarının onayına duydukları açlık, devasa gökdelenlerin içinde aslında ne kadar küçük kaldıklarını gösterir. Kapitalizmin aile yapısı üzerindeki yıkıcı etkisini kara mizahla birleştiren eşsiz bir dramadır."
      },
      
    ];



    const container = document.getElementById('series-container');
    seriesData.forEach((s, index) => {
      container.innerHTML += `
        <div class="col-md-4 col-lg-3">
          <div class="card series-card shadow-sm">
            <img src="${s.img}" class="card-img-top" alt="${s.title}">
            <div class="card-body text-center d-flex flex-column">
              <h5 class="card-title fw-bold" style="color: var(--altin);">${s.title}</h5>
              <div class="mt-auto">
                 <button class="btn btn-outline-bordo w-100" onclick="openAnalysis(${index})">Analiz Gör</button>
              </div>
            </div>
          </div>
        </div>
      `;
    });

    function openAnalysis(i) {
      const s = seriesData[i];
      document.getElementById('mTitle').innerText = s.title;
      document.getElementById('mSummary').innerText = s.summary;
      document.getElementById('mAnalysis').innerText = s.analysis;
      new bootstrap.Modal(document.getElementById('analysisModal')).show();
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>