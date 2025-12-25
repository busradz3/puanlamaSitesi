<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RAVORA | Müzik Arşivi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  
  <style>
    :root { --bordo: #5e0b0b; --altin: #d4af37; --koyu: #120305; }
    
    body { font-family: 'Poppins', sans-serif; background-color: #5e0b0b; color: #333; }
    .bg-bordo { background-color: var(--bordo) !important; }
    
    /* Estetik Üst Başlık */
    .music-header {
      background: url('coquette.jpg');
      background-size: cover; background-position: center; padding: 100px 0; color:#120305; text-align: center;
      border-bottom: 5px solid var(--bordo);
    }
    .music-header h1 { font-family: 'Playfair Display', serif; font-size: 3.5rem; letter-spacing: -1px; }

    /* Minimalist Plak Kartları */
    .music-card {
      background: white; border: none; border-radius: 0; transition: 0.4s ease;
      box-shadow: 0 5px 15px rgba(0,0,0,0.03); height: 100%;
    }
    .music-card:hover { transform: translateY(-10px); box-shadow: 0 15px 35px rgba(76, 5, 25, 0.12); }
    
    .img-container { padding: 20px; background: #f8f8f8; position: relative; }
    .card-img-top { aspect-ratio: 1/1; object-fit: cover; transition: 0.4s; }

    /* Etkileşim Butonları */
    .interact-bar { display: flex; gap: 15px; padding: 12px 0; border-top: 1px solid #eee; margin-top: 10px; }
    .interact-btn { background: none; border: none; color: #bbb; font-size: 0.85rem; transition: 0.2s; }
    .interact-btn:hover { color: var(--bordo); }
    
    .btn-analiz { 
      background-color: transparent; border: 1px solid var(--bordo); color: var(--bordo); 
      border-radius: 0; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; font-size: 0.75rem;
    }
    .btn-analiz:hover { background-color: var(--bordo); color: white; }

    /* Analiz Penceresi (Modal) */
    .modal-content { background-color: var(--koyu); color: #fff; border: 2px solid var(--bordo); border-radius: 0; }
    .modal-header { border-bottom: 1px solid rgba(255,255,255,0.1); }
    .analysis-text { 
      border-left: 4px solid var(--bordo); padding-left: 20px; 
      line-height: 1.9; text-align: justify; font-size: 0.95rem; color: #ddd;
    }
  </style>
</head>
<body>

<?php include 'navbar.php'; ?>

  <header class="music-header">
    <div class="container">
      <h1>Türkçe Alternatif Şarkılar</h1>
      <p class="lead italic opacity-75">8 ikonik sanatçı, 8 unutulmaz hikaye ve derin müzikler.</p>
    </div>
  </header>

  <main class="container py-5">
    <div class="row g-4" id="music-grid">
      </div>
  </main>

  <div class="modal fade" id="musicModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content p-4">
        <div class="modal-header">
          <h4 class="modal-title fw-bold" id="mTitle" style="color: white;"></h4>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <p id="mSummary" class="fst-italic text-secondary mb-3"></p>
          <div id="mAnalysis" class="analysis-text"></div>
        </div>
      </div>
    </div>
  </div>

  <script>
    const musicList = [
      {
        title: "Snap", artist: "Manifest",
        img: "snap.jpg",
        summary: "Yeni Nesil Hepsi Grubu",
        analysis: "Grup, Hypers New Media tarafından YouTube üzerinden yayınlanan Big5 Türkiye adlı yetenek yarışması ile kurulmuştur.Seçilmeleri: Tolga Akış, Gülçin Ergül ve Enes Abdulla'nın jüri üyeliği yaptığı yarışmada, 12 finalist arasından seçilen 6 yetenekli genç kadın (Sueda Uluca, Hilal Yelekçi, Lidya Pınar, Zeynep Sude Oktay, Mina Solak ve Esin Bahat) grubu oluşturmuştur.Bu süreç 6 aylık bir kamp sisteminden geçmiş ve sonlanmıştır."
      },
      {
        title: "Geri Dön", artist: "Sezen Aksu",
        img: "sezen.jpg",
        summary: "Minik Serçe",
        analysis: "1970'lerin ortasında çıkış yapsa da, 84'teki \"Sen Ağlama\" albümüyle tüm Türkiye'nin duygularına tercüman olan bir ozana dönüştü."
      },
      {
        title: "seni Yazdım", artist: "Müslüm Gürses",
        img: "müslüm.jpg",
        summary: "Müslüm Baba",
        analysis:"Adana’da gazinolarda şarkı söylerken ağır arabesk tarzıyla kendine sadık, devasa bir kitle (Müslümcüler) yaratarak efsaneleşti."
      },
      {
        title: "Ömrüm", artist: "Volkan Konak",
        img: "volkan.jpg",
        summary: "Kuzeyin Oğlu.",
        analysis: "Volkan Konak, 1990’ların başında çıkardığı albümlerle tanınmaya başlasa da, asıl büyük çıkışını Karadeniz ezgilerini modern rock ve batı enstrümanlarıyla harmanladığı Efulim ve Cerrahpaşa gibi eserleriyle yakaladı; kendine has şiirsel anlatımı, etkileyici sahne performansı ve Karadeniz kültürünü ulusal boyuta taşıyan samimi tavrıyla tüm Türkiye'nin sevdiği bir isim haline geldi."
      },
      {
        title: "Zemheri", artist: "Ali Kınık",
        img: "ali.jpg",
        summary: "Ali Kınıktır.",
        analysis: "Ali Kınık, kendine has bir 'Vintage' evren kurmuştur. Sanatçının vokal tarzı, dinleyiciyi eski bir siyah-beyaz filmin içine çeken hipnotik bir güce sahiptir. Aşkın trajik boyutlarını ve şöhretin ağırlığını bir şair titizliğiyle işleyen şarkıları, modern popun hızına karşı yavaş ve derin bir nefes gibidir. Analiz edildiğinde, Ali Kınık'ın sadece bir şarkıcı değil, aynı zamanda hüzün tasarlayan bir atmosfer kurucusu olduğu, müziğinin her katmanında açıkça görülür."
      },
      {
        title: "Bi Hayli", artist: "Murat Dalkılıç",
        img: "murat.jpg",
        summary: "Bir zamanlar kızların tek dinlediği şarkıcı.",
        analysis: "Murat Dalkılıç, kendine has bir 'Vintage' evren kurmuştur. Sanatçının vokal tarzı, dinleyiciyi eski bir siyah-beyaz filmin içine çeken hipnotik bir güce sahiptir. Aşkın trajik boyutlarını ve şöhretin ağırlığını bir şair titizliğiyle işleyen şarkıları, modern popun hızına karşı yavaş ve derin bir nefes gibidir. Analiz edildiğinde, Murat Dalkılıç'ın sadece bir şarkıcı değil, aynı zamanda hüzün tasarlayan bir atmosfer kurucusu olduğu, müziğinin her katmanında açıkça görülür."
      },
      {
        title: "Gözlerinin Yeşilini Özledim", artist: "Seda Sular Dönmez",
        img: "tripkolik.jpg",
        summary: "Namıdeğer TRİPKOLİK.",
        analysis: "Gerçek ismi Seda Sular (evlendikten sonraki adıyla Seda Sular Dönmez) olan sanatçı, 2000’li yılların sonunda ve 2010’lu yılların başında Türkiye’de yükselen internet tabanlı müzik dalgasının en popüler isimlerinden biri olarak tanındı. Aslen Diyarbakır Erganili olan ve İstanbul Pendik’te doğan Seda Sular, özellikle YouTube ve dönemin sosyal medya mecralarında paylaştığı melankolik, arabesk-rap tarzındaki şarkılarıyla geniş bir hayran kitlesine ulaştı. Kariyerindeki asıl büyük çıkışını, bugün bile nostaljik bir hit olarak kabul edilen Gözlerinin Yeşilini Özledim parçasıyla yaptı. Ardından gelen Sonu Gelmez ve Üşüyorum gibi şarkıları milyonlarca kez dinlenerek onu bir internet fenomenine dönüştürdü. 2018 yılında bir dönem adli olaylarla ve telefon dolandırıcılığı suçlamalarıyla gündeme gelip tutukluluk süreci yaşamış olsa da, ilerleyen yıllarda özel hayatına odaklandı. 2024 yılı itibarıyla Hakan Dönmez ile evli olan ve bir bebek beklediğini müjdeleyen Seda Sular, dijital dünyanın ilk büyük yerli yıldızlarından biri olarak hafızalarda yer edinmiştir.."
      },
      {
        title: "Yar Geylani 2", artist: "Mahmut Durgun",
        img: "geylani.jpg",
        summary: "Dinleten İlahi.",
        analysis: "Mahmud Durgun, geleneksel ilahi kültürünü dijital dünyaya başarıyla taşıyarak özellikle YouTube ve sosyal medya platformları üzerinden ünlü olmuştur. Kendine has yanık ve duygusal ses tonuyla seslendirdiği Geylani, Ağla Gözüm ve Yalan Dünya gibi ilahilerin videoları milyonlarca izlenmeye ulaşarak onu kısa sürede yeni nesil ilahi müziğin en çok dinlenen isimlerinden biri haline getirmiştir. Herhangi bir geleneksel medya desteği yerine, tamamen dijital mecralardaki samimi yorumu ve dinleyicileriyle kurduğu manevi bağ sayesinde geniş bir kitleye ulaşmayı başarmıştır."
      }
    ];

    const grid = document.getElementById('music-grid');
    musicList.forEach((m, index) => {
      grid.innerHTML += `
        <div class="col-md-3">
          <div class="music-card shadow-sm p-3">
            <div class="img-container">
              <img src="${m.img}" class="card-img-top shadow-sm" alt="${m.title}">
            </div>
            <div class="card-body px-0 pt-3">
              <h6 class="fw-bold mb-0 text-truncate">${m.title}</h6>
              <p class="text-muted small mb-2">${m.artist}</p>
              <div class="interact-bar">
                <button class="interact-btn"><i class="far fa-heart"></i> ${Math.floor(Math.random()*1500)}</button>
                <button class="interact-btn"><i class="far fa-comment"></i> ${Math.floor(Math.random()*100)}</button>
                <button class="interact-btn"><i class="fas fa-retweet"></i> ${Math.floor(Math.random()*50)}</button>
              </div>
              <button class="btn btn-analiz btn-sm w-100 mt-2" onclick="openMusic(${index})">Analiz Gör</button>
            </div>
          </div>
        </div>
      `;
    });

    function openMusic(i) {
      const m = musicList[i];
      document.getElementById('mTitle').innerText = m.title + " - " + m.artist;
      document.getElementById('mSummary').innerText = m.summary;
      document.getElementById('mAnalysis').innerText = m.analysis;
      new bootstrap.Modal(document.getElementById('musicModal')).show();
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>