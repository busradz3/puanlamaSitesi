
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RAVORA | Film Analizleri</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Playfair+Display:italic,wght@600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    :root { --bordo: #5e0b0b; --altin: #d4af37; --koyu: #120305; }
    body { font-family: 'Poppins', sans-serif; background-color: var(--koyu); color: #f3f4f6; }
    
    .bg-bordo { background-color: var(--bordo) !important; }

    /* Floral & Bordo Hero Section */
    .hero-films {
      background: linear-gradient(rgba(94, 11, 11), rgba(18, 3, 5, 0.95)), 
                  url('https://images.unsplash.com/photo-1494232410401-ad00d5433cfa?auto=format&fit=crop&w=1400');
      background-size: cover; background-position: center; padding: 100px 0; border-bottom: 2px solid var(--altin);
    }
      .hero-films {
      background: 
                  url('sinem.jpg');
      background-size: cover; background-position: center; padding: 100px 0; border-bottom: 2px solid var(--altin);
    }

    .hero-title { font-family: 'Playfair Display', serif; font-style: italic; }

    /* Film Kartları Tasarımı */
    .film-card {
      background: rgba(45, 10, 16, 0.7); border: 1px solid rgba(212, 175, 55, 0.15);
      border-radius: 20px; transition: all 0.4s ease; overflow: hidden; height: 100%;
    }
    .film-card:hover { 
      transform: translateY(-12px); border-color: var(--altin); 
      box-shadow: 0 15px 35px rgba(76, 5, 25, 0.6); 
    }
    .card-img-top { height: 420px; object-fit: cover; transition: 0.5s; }
    .film-card:hover .card-img-top { transform: scale(1.05); }

    /* Etkileşim Barı */
    .interaction-bar {
      border-top: 1px solid rgba(255,255,255,0.1); padding-top: 12px;
      display: flex; justify-content: space-around;
    }
    .interact-btn { background: none; border: none; color: #aaa; font-size: 0.85rem; transition: 0.2s; }
    .interact-btn:hover { color: var(--altin); }

    /* Modal (Analiz Paneli) */
    .modal-content { background-color: #1a050a; color: #eee; border: 2px solid var(--altin); border-radius: 20px; }
    .modal-header { border-bottom: 1px solid var(--altin); }
    .analysis-box { 
      line-height: 1.9; font-size: 0.95rem; text-align: justify; 
      border-left: 4px solid var(--altin); padding-left: 20px; margin-top: 15px;
    }
  </style>
</head>
<body>

<?php include 'navbar.php'; ?>

  <header class="hero-films text-center">
    <div class="container">
      <h1 class="display-3 hero-title fw-bold text-white">Sinema Analizleri</h1>
      <p class="lead opacity-75 italic text-light">Beyaz Perdenin Unutulmaz Kareleri</p>
    </div>
  </header>

  <main class="container py-5">
    <div class="row g-4" id="film-grid">
      </div>
  </main>

  <div class="modal fade" id="filmModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content p-4">
        <div class="modal-header">
          <h4 class="modal-title fw-bold" id="fTitle" style="color: var(--altin);"></h4>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <p id="fSummary" class="fst-italic text-secondary mb-3"></p>
          <div id="fAnalysis" class="analysis-box"></div>
        </div>
      </div>
    </div>
  </div>

  <script>
    const films = [
      {
        title: "Fight Club",
        img: "fightclup.jpg",
        summary: "Uykusuzluk çeken bir ofis çalışanının, karizmatik sabun satıcısı Tyler Durden ile tanıştıktan sonra hayatının altüst olması.",
        analysis: "Fight Club, tüketim toplumuna, modern maskülenlik krizine ve bireyin sistem içindeki yabancılaşmasına yönelik en sert sinematik eleştirilerden biridir. Film, mülkiyetin bireyi nasıl köleleştirdiğini 'Sahip olduğun şeyler gün gelir sana sahip olur' felsefesiyle işler. Tyler Durden karakteri, ana karakterin bastırılmış arzularının ve toplumsal kalıplara duyduğu öfkenin bir yansımasıdır. Kaos ve anarşi üzerinden bir özgürlük arayışını anlatırken, aslında bir ideolojinin nasıl körü körüne bir tarikata dönüşebileceğini de analiz eder. Kurgusu ve sembolizmiyle izleyiciyi kendi konfor alanını sorgulamaya iter."
      },
      {
        title: "Inception",
        img: "https://m.media-amazon.com/images/M/MV5BMjAxMzY3NjcxNF5BMl5BanBnXkFtZTcwNTI5OTM0Mw@@._V1_.jpg",
        summary: "Zihin hırsızlığı yapan bir ekibin, bir fikri yok etmek yerine onu birinin bilinçaltına yerleştirme (inception) görevi.",
        analysis: "Inception, rüya içinde rüya katmanları üzerinden gerçeklik algısını, suçluluk duygusunu ve hatıraların insan zihni üzerindeki manipülatif gücünü analiz eder. Christopher Nolan, zamanı ve mekanı bükerek izleyiciye doğrusal olmayan bir anlatı sunar. Filmdeki 'topaç' sembolü, bireyin kendi gerçekliğine duyduğu güvenin ne kadar pamuk ipliğine bağlı olduğunu temsil eder. Cobb karakterinin eşi Mal ile olan imtihanı, geçmişe tutunmanın ve yas sürecinin bir insanın zihninde nasıl hapis hayatına dönüşebileceğinin psikolojik bir incelemesidir. Teknik mükemmeliyetiyle rasyonel bir labirent sunar."
      },
      {
        title: "Interstellar",
        img: "https://m.media-amazon.com/images/M/MV5BZjdkOTU3MDktN2IxOS00OGEyLWFmMjktY2FiMmZkNWIyODZiXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_.jpg",
        summary: "İnsanlığın yok olma tehlikesiyle karşı karşıya olduğu bir gelecekte, bir grup astronotun yeni bir ev arayışıyla solucan deliğinden geçmesi.",
        analysis: "Interstellar, bilim kurgu türünü aşkın boyutu ve zamanın izafiyeti ile birleştiren duygusal bir destandır. Film, zamanın aslında en büyük engel ve aynı zamanda tek mutlak gerçek olduğunu analiz eder. Cooper'ın kızıyla olan bağı, sevginin fiziksel boyutları aşabilen, yerçekimi gibi evrensel bir kuvvet olup olmadığını sorgulatır. Tarsier ve Gargantua gibi unsurlar bilimsel doğruluğu temsil ederken, 'Kütüphane' sahnesi insan bilincinin beşinci boyuttaki potansiyelini simgeler. Fedakarlık, yalnızlık ve insanlığın hayatta kalma içgüdüsü üzerine yazılmış görkemli bir şiirdir."
      },
      {
        title: "The Godfather",
        img: "thegodfather.jpg",
        summary: "İtalyan asıllı bir mafya ailesinin, gelenekler, sadakat ve ihanet sarmalındaki değişim hikayesi.",
        analysis: "The Godfather, sadece bir suç filmi değil, Amerikan rüyasının karanlık yüzünü ve kapitalist aile yapısını inceleyen sosyolojik bir analizdir. Don Corleone karakteri, bir devlet adamı ciddiyetiyle adalet ve sadakat kavramlarını kendi etik süzgecinden geçirir. Michael'ın bir savaş kahramanından soğukkanlı bir katile dönüşümü, gücün ve aile mirasının birey üzerindeki kaçınılmaz yozlaştırıcı etkisini simgeler. Dizi, suç dünyasını bir iş yönetimi olarak sunarken, aynı zamanda göçmenlik ve toplumsal aidiyet duygusunu derinlemesine işler. Sinema tarihinin en güçlü karakter gelişimlerini barındırır."
      },
      {
        title: "Uglies(Çirkinler)",
        img: "uglies.jpg",
        summary: "Kalıplaşılmış kuralların kullanıldığı ve belli bir süre sonra çirkinler olarak adlandılan topluluğun uyanışını anlatan bir film.",
        analysis: "Uglies, her bireyin 16 yaşına geldiğinde zorunlu estetik ameliyatlarla güzel (Pretty) haline getirildiği ve bu sayede tüm sosyal çatışmaların bittiğine inanılan distopik bir gelecekte geçer. Ameliyat olmayı sabırsızlıkla bekleyen Tally Youngblood, sistemden kaçıp isyancılara katılan arkadaşı Shay’in peşine casus olarak gönderildiğinde, bu dönüşümün sadece dış görünüşü değil, beyinleri de manipüle ederek insanları uysallaştırdığını keşfeder. Güzellik uğruna özgür iradenin feda edildiğini anlayan Tally, bir güzel olmanın ötesinde kendi kimliğini ve sistemin karanlık sırlarını korumak için zorlu bir mücadeleye girişir.."
      },
      {
        title: "Telefon (phone booth)",
        img: "telefon.jpg",
        summary: "Kısıtlı bir mekanda (tek bir telefon kulübesinde) geçmesine rağmen gerilimi her an yüksek tutmayı başaran, \"vicdan ve dürüstlük\" temasını merkezine alan etkileyici bir psikolojik gerilimdir. Film, modern insanın yalanlarla ördüğü sahte dünyasının tek bir mermi tehdidiyle nasıl yerle bir olabileceğini çarpıcı bir dille gösterir.",
        analysis: "Telefon (Phone Booth), kibirli ve bencil bir halkla ilişkiler danışmanı olan Stu Shepard’ın, sokaktaki son ankesörlü telefon kulübelerinden birinde bir telefon açmasıyla başlayan gerilim dolu bir hikâyedir. Telefonu açtığında karşısındaki gizemli bir keskin nişancı, Stu’yu bir hedef haline getirerek telefonu kapatması durumunda onu vuracağını söyler. Tüm hayatı bir yalan üzerine kurulu olan Stu, bir yandan nişancının zorlamasıyla günahlarını itiraf etmek zorunda kalırken, diğer yandan polislerin ve çevredekilerin durumu bir rehine krizi sanmasıyla köşeye sıkışır. Klostrofobik bir atmosferde geçen film, bir adamın hayatını ve ahlaki değerlerini tek bir mekanda ölüm tehdidi altında sorgulamasını işler."
      },
      {
        title: "Testere(Saw)",
        img: "testere.jpg",
        summary: "Ölümcül oyunlar tasarlayan bir seri katilin, yaşamın değerini anlamayan kurbanlarını hayatta kalmak için korkunç fedakarlıklar yapmaya zorladığı bir psikolojik gerilim filmidir.",
        analysis: "Testere (Saw), iki yabancının (Adam ve Lawrence) kendilerini kirli bir banyoda, ayaklarından zincirlenmiş ve ortada kanlar içinde yatan bir cesetle uyanmış halde bulmalarıyla başlayan sarsıcı bir psikolojik gerilimdir. Jigsaw  lakaplı bir seri katil, kurbanlarını hayata olan bağlılıklarını test etmek için kendi vücutlarına zarar vermelerini gerektiren dehşet verici düzeneklerin ve oyunların içine hapseder. Dr. Lawrence Gordon’a, ailesini kurtarması için belirli bir süre içinde yanındaki Adam’ı öldürmesi talimatı verilirken, ikili ipuçlarını birleştirerek bu kabustan kurtulmaya çalışır. Film, sadece bir korku hikayesi değil, aynı zamanda hayatta kalma içgüdüsünü ve insanların geçmişteki günahlarıyla yüzleşmesini sorgulayan, sinema tarihinin en ünlü ters köşe finallerinden birine sahip bir yapımdır.."
      },
      {
        title: "Babam Ve Oğlum",
        img: "babamveoğlum.jpg",
        summary: "Kırgın bir babanın, ölümcül hastalığı nedeniyle küçük oğlunu yıllardır küs olduğu sert babasına emanet etmek için Ege'deki köyüne dönmesini ve bu üç kuşağın sarsıcı hesaplaşmasını anlatan bir aile dramıdır.",
        analysis: "Babam ve Oğlum, 1980 darbesinin gölgesinde parçalanmış bir ailenin, yıllar sonra gelen sarsıcı yeniden buluşmasını ve helalleşme sürecini anlatan derin bir dramdır. Siyasi görüşleri nedeniyle babasıyla bağlarını koparıp İstanbul’a giden gazeteci Sadık, eşini kaybettiği darbe gecesinden sonra tek başına büyüttüğü oğlu Deniz ile birlikte Ege’deki aile çiftliğine geri döner. Ölümcül bir hastalığa yakalandığını bilen Sadık’ın asıl amacı, oğlunu sert ve kırgın babası Hüseyin Efendi’ye emanet etmektir; film, kuşaklar arası çatışmaları, pişmanlıkları ve evlat olma duygusunu Bana biraz yer açın feryadıyla hafızalara kazınan duygusal bir dille işler.."
      }
    ];

    

    const grid = document.getElementById('film-grid');
    films.forEach((f, index) => {
      grid.innerHTML += `
        <div class="col-md-4 col-lg-3">
          <div class="film-card shadow">
            <img src="${f.img}" class="card-img-top" alt="${f.title}">
            <div class="p-3 text-center">
              <h5 class="fw-bold" style="color: var(--altin);">${f.title}</h5>
              <div class="interaction-bar mb-3">
                <button class="interact-btn"><i class="far fa-comment"></i> ${Math.floor(Math.random()*300)}</button>
                <button class="interact-btn"><i class="fas fa-retweet"></i> ${Math.floor(Math.random()*80)}</button>
                <button class="interact-btn"><i class="far fa-heart"></i> ${Math.floor(Math.random()*1500)}</button>
              </div>
              <button class="btn btn-outline-bordo w-100" onclick="openFilm(${index})">Analiz Gör</button>
            </div>
          </div>
        </div>
      `;
    });

    function openFilm(i) {
      const f = films[i];
      document.getElementById('fTitle').innerText = f.title;
      document.getElementById('fSummary').innerText = f.summary;
      document.getElementById('fAnalysis').innerText = f.analysis;
      new bootstrap.Modal(document.getElementById('filmModal')).show();
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>