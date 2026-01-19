const express = require('express');
const app = express();
const path = require('path');

// Port Numarası: Hosting firmanızın izin verdiği port (Genelde 3000, 8080 veya rastgele atanır)
// cPanel Passenger kullanıyorsa buna gerek kalmayabilir ama manuel başlatmada önemlidir.
const PORT = process.env.PORT || 3000;

app.get('/', (req, res) => {
    res.send('Node.js Test Sunucusu Çalışıyor! 🚀');
});

app.listen(PORT, () => {
    console.log(`Sunucu ${PORT} portunda çalışıyor.`);
});
