# Node.js Uygulamasını cPanel'de Çalıştırma (Son Çareler)

Hosting firmanız birçok özelliği (SSH, Cron, PHP exec) kısıtlamış gibi görünüyor. Bu durumda elimizde kalan seçenekler şunlar:

## Yöntem 1: Hosting Destek Talebi (En Kolayı)
Hosting firmanıza şu mesajı atın:
*"Merhaba, Node.js projemi çalıştırmak istiyorum ancak 'Setup Node.js App' menüsü yok, SSH erişimim kısıtlı ve Cron Jobs görünmüyor. Projemi nasıl ayağa kaldırabilirim? Bana yardımcı olur musunuz?"*

Çoğu firma bu durumda sizin için bir kurulum yapar veya gerekli izinleri açar.

## Yöntem 2: Ücretsiz Dış Sunucu (Render.com) - KESİN ÇÖZÜM
Eğer mevcut hostinginiz Node.js desteklemiyorsa, **Render.com** gibi ücretsiz bir platforma geçmek en temiz çözümdür.

1.  **GitHub'a Yükle:** Proje dosyalarınızı bir GitHub deposuna (repository) yükleyin.
2.  **Render.com'a Üye Ol:** GitHub hesabınızla giriş yapın.
3.  **New +** butonuna basıp **"Web Service"** seçin.
4.  GitHub deponuzu seçin.
5.  Render otomatik olarak Node.js projesi olduğunu anlayacak.
    *   **Build Command:** `npm install`
    *   **Start Command:** `node app.js`
6.  **Deploy** butonuna basın.

**Avantajı:** Hosting kısıtlamalarıyla uğraşmazsınız, SSL (HTTPS) otomatik gelir ve tamamen ücretsizdir.
**Veritabanı:** Mevcut hostinginizdeki MySQL veritabanını kullanmaya devam edebilirsiniz. (Sadece `.env` dosyasında veritabanı IP'sini girmeniz yeterli).

## Yöntem 3: Litespeed Web Server Kullanıyorsa (.htaccess)
Eğer sunucunuz Litespeed kullanıyorsa, bazen sadece `.htaccess` dosyasıyla Node.js tetiklenebilir.

1.  Proje ana dizinindeki `.htaccess` dosyasının içeriğini şu şekilde değiştirip deneyin:
    ```apache
    RewriteEngine On
    RewriteRule (.*) http://127.0.0.1:3000/$1 [P,L]
    ```
    *(Not: Bu yöntem arka planda çalışan bir Node süreci varsa işe yarar. Sizin durumunuzda başlatılamadığı için çalışmayabilir.)*
