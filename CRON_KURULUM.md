# cPanel Zamanlanmış Görevler (Cron Job) ile Kurulum

Hosting firmanız PHP üzerinden komut çalıştırmayı (güvenlik nedeniyle) engellemiş. Bu yüzden `kur.php` çalışmadı.
Ama endişelenmeyin! cPanel'in kendi **"Zamanlanmış Görevler" (Cron Jobs)** özelliğini kullanarak kurulumu yapabiliriz.

Bu yöntemle komutları cPanel'e verdireceğiz.

### Adım 1: cPanel'e Girin
1.  cPanel ana sayfasına girin.
2.  Arama kutusuna **"Cron"** veya **"Zamanlanmış Görevler"** yazın ve o menüye tıklayın.

### Adım 2: Kurulum Komutunu Çalıştırın (npm install)
Bu adım gerekli kütüphaneleri yükler.

1.  **Yeni Zamanlanmış Görev Ekle** kısmına gelin.
2.  **Ortak Ayarlar:** "Dakikada Bir" (*Once Per Minute*) seçin (Hemen çalışması için).
3.  **Komut:** kısmına aynen şunu yapıştırın:
    ```bash
    cd /home/ldxnakcep/public_html/deneme && /usr/local/bin/npm install
    ```
    *(Not: Eğer `/usr/local/bin/npm` çalışmazsa sadece `npm` deneyin)*
4.  **Yeni Zamanlanmış Görev Ekle** butonuna basın.
5.  **1-2 dakika bekleyin.** (Sayfayı yenileyin).
6.  İşlem bitince bu eklediğiniz görevi **SİLİN**. (Yoksa sürekli yükleme yapmaya çalışır).

### Adım 3: Siteyi Başlatın
Şimdi siteyi ayağa kaldıracağız.

1.  Yine **Yeni Zamanlanmış Görev Ekle** kısmına gelin.
2.  **Ortak Ayarlar:** "Dakikada Bir" seçin.
3.  **Komut:** kısmına şunu yapıştırın:
    ```bash
    cd /home/ldxnakcep/public_html/deneme && nohup /usr/local/bin/node app.js > app.log 2>&1 &
    ```
    *(Yine `/usr/local/bin/node` çalışmazsa sadece `node` yazarak deneyin)*
4.  Görevi ekleyin.
5.  **1 dakika bekleyin.**
6.  Tarayıcıdan sitenize girmeyi deneyin: `www.siteniz.com/deneme`
7.  Site açıldıysa, **bu görevi de hemen SİLİN**. (Yoksa her dakika yeniden başlatmaya çalışır).

### Sorun Giderme
Eğer site açılmazsa;
Dosya yöneticisine gidip `deneme` klasörü içindeki `app.log` dosyasına bakın. Hatanın ne olduğu orada yazacaktır.
