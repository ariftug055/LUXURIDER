The authenticity of host '213.145.94.151 (213.145.94.151)' can't be established.
ED25519 key fingerprint is SHA256:uLP3I92NNheo+MIPWs77aU11NCTK5NrZGwUV0l1QgQI.
This key is not known by any other names.
Are you sure you want to continue connecting (yes/no/[fingerprint])? yes
Warning: Permanently added '213.145.94.151' (ED25519) to the list of known hosts.
ldxnakcep@213.145.94.151's password:# SSH (Terminal) ile Sunucuya Bağlanma Rehberi (ÖZEL)

Sizin verdiğiniz bilgilere göre hazırlanmış özel komutlar aşağıdadır.

## 1. Bağlantı Komutu
Bilgisayarınızda **PowerShell**'i açın ve şu komutu kopyalayıp yapıştırın (IP adresindeki tireleri nokta yaptım):

```powershell
ssh ldxnakcep@213.145.94.151
```

1.  Bunu yazıp **Enter**'a basın.
2.  İlk defa bağlanıyorsanız "Are you sure..." sorusuna `yes` yazıp **Enter**'a basın.
3.  **Password:** sorduğunda şifrenizi girin. (Ekranda hiçbir şey görünmeyecek, siz yazıp Enter'a basın).

## 2. Kurulum Komutları
Bağlandıktan sonra sırasıyla şu komutları tek tek yazıp Enter'a basın:

1.  Dosyaların olduğu ana klasöre git:
    ```bash
    cd public_html
    ```

2.  Gerekli paketleri yükle (Bu biraz sürebilir):
    ```bash
    npm install
    ```

3.  Siteyi başlat (Test için):
    ```bash
    node app.js
    ```

Eğer "Server is running..." mesajını görürseniz ve siteniz açılıyorsa her şey tamam demektir!

## 3. Kalıcı Hale Getirme
Terminali kapattığınızda sitenin kapanmaması için, yukarıdaki testten sonra `CTRL + C` ile durdurun ve şu komutu kullanın:

```bash
nohup node app.js > app.log 2>&1 &
```
*(Bu komut arka planda çalışmasını sağlar)*
