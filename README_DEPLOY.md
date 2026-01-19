# AI Sınav Merkezi - Node.js Kurulum Rehberi

Bu proje, eski PHP altyapısının yerine modern, güvenli ve hızlı Node.js altyapısına geçirilmiş halidir.

## Özellikler
- **Güvenlik**: Helmet.js (HTTP başlık güvenliği), Rate Limiting (Saldırı koruması), Bcrypt (Şifreleme), SQL Injection koruması.
- **Performans**: EJS ile hızlı sayfa yükleme, MySQL bağlantı havuzu.
- **Yetenek**: PDF analizi ve Gemini AI ile otomatik soru üretimi.
- **Responsive**: Mobil uyumlu tasarım.

## Kurulum Adımları (cPanel)

### 1. Dosyaları Yükleme
Aşağıdaki dosyaları ve klasörleri sunucunuzun ana dizinine (`public_html` veya alt klasör) yükleyin:
- `app.js`
- `package.json`
- `.env`
- `config/`
- `public/`
- `routes/`
- `views/`

**Not:** `node_modules` klasörünü YÜKLEMEYİN. Sunucuda kurulacaktır.

### 2. Veritabanı Ayarları
1. cPanel'den bir MySQL veritabanı ve kullanıcısı oluşturun.
2. `.env` dosyasını açın ve bilgileri girin:
   ```
   DB_HOST=localhost
   DB_USER=veritabani_kullanici_adi
   DB_PASS=sifre
   DB_NAME=veritabani_adi
   SESSION_SECRET=gizli_bir_anahtar_yazin
   GEMINI_API_KEY=google_gemini_api_key
   ```

### 3. Node.js Uygulamasını Başlatma
Eğer cPanel'de **"Setup Node.js App"** menüsü YOKSA (belirttiğiniz gibi):

**Yöntem A: SSH Erişimi Varsa**
1. SSH ile sunucuya bağlanın.
2. Dosyaların olduğu dizine gidin.
3. `npm install` komutunu çalıştırın.
4. `node app.js` ile test edin.
5. Kalıcı çalışması için `nohup node app.js &` komutunu kullanın.

**Yöntem B: Hosting Değişikliği / VPS**
Eğer sunucunuz Node.js desteklemiyorsa, bu kodları "Render", "Railway" veya "Heroku" gibi platformlarda ücretsiz/ucuz şekilde barındırabilirsiniz. Veritabanı için mevcut hostinginizi kullanmaya devam edebilirsiniz.

### 4. Tablo Yapısı
Sistemin çalışması için veritabanında `Kullanicilar` tablosunun şu sütunlara sahip olduğundan emin olun:
- `id` (INT, Primary Key)
- `ad_soyad` (VARCHAR)
- `email` (VARCHAR)
- `sifre` (VARCHAR - Artık Hash'li tutuluyor!)
- `soru_hakki` (INT)

*Eski PHP şifreleri (MD5 vb.) bu sistemde çalışmayabilir. Kullanıcıların şifrelerini sıfırlaması veya veritabanındaki şifrelerin güncellenmesi gerekebilir.*
