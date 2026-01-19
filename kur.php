<?php
/**
 * Kolay Kurulum Scripti (SSH Gerekmez)
 * Bu dosyayı sunucuya atın ve tarayıcıdan calistirin: siteadi.com/kur.php
 */

header('Content-Type: text/plain; charset=utf-8');
set_time_limit(300); // 5 dakika zaman tanı
ini_set('display_errors', 1);

echo "🚀 KURULUM BAŞLIYOR...\n";
echo "=======================================\n";

// 1. Node.js Kontrolü
echo "[1/4] Node.js sürümü kontrol ediliyor...\n";
$nodeVersion = shell_exec('node -v');
if ($nodeVersion) {
    echo "✅ Node.js Bulundu: " . $nodeVersion;
} else {
    echo "❌ Node.js bulunamadı! Sunucunuzda Node.js kurulu olmayabilir.\n";
    exit;
}

// 2. Modülleri Yükle (npm install)
echo "\n[2/4] Gerekli paketler yükleniyor (npm install)...\n";
if (file_exists('node_modules')) {
    echo "ℹ️ node_modules klasörü zaten var, yükleme atlanıyor.\n";
} else {
    // PATH ayarı (bazen gereklidir)
    putenv('PATH=' . getenv('PATH') . ':/usr/local/bin:/usr/bin:/bin');
    $npmOutput = shell_exec('npm install 2>&1');
    echo "Sonuç:\n" . $npmOutput . "\n";
}

// 3. Uygulamayı Başlat
echo "\n[3/4] Uygulama başlatılıyor...\n";
// Önce çalışan eski process varsa durdur
shell_exec('pkill -f "node app.js"');
// Arka planda başlat
$startOutput = shell_exec('nohup node app.js > app.log 2>&1 &');
echo "✅ Başlatma komutu gönderildi.\n";

// 4. Port Yönlendirme (.htaccess kontrolü)
echo "\n[4/4] .htaccess dosyası kontrol ediliyor...\n";
if (file_exists('.htaccess')) {
    echo "✅ .htaccess dosyası mevcut.\n";
} else {
    echo "⚠️ .htaccess dosyası YOK! Lütfen yüklediğinizden emin olun.\n";
}

echo "\n=======================================\n";
echo "🎉 İŞLEM TAMAMLANDI!\n";
echo "Lütfen sitenizi kontrol edin.\n";
echo "Eğer site açılmıyorsa 'app.log' dosyasını inceleyin.\n";
?>