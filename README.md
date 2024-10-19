Library App
Live Preview - Click Here

<br/> <div align="center"> <img alt="Demo" src="public/mockup.png" /> </div> <br/> <br/>
🛠 Installation and Setup Instructions
Fork dan clone repository ini. Anda membutuhkan NodeJs, Composer, dan Git di mesin Anda.

Install dependensi: composer install && npm install

Di direktori proyek, jalankan: npm run dev
Aplikasi akan berjalan dalam mode pengembangan.
Buka http://localhost:8000 untuk melihatnya di browser.

Jalankan migrasi database: php artisan migrate

Jalankan seeding database untuk peran, izin, dan pengguna:

bash
Copy code
php artisan db:seed --class=RolePermissionSeeder
php artisan db:seed --class=UserSeeder
Usage Instructions
Login ke halaman admin menggunakan kredensial berikut:

Email: admin@example.com
Password: password
Kelola buku, kategori, dan peminjaman dengan mudah melalui dashboard admin.

Deploy with Github Pages
Ubah nama repository fork menjadi <your-github-username>.github.io.

Edit properti homepage di file package.json dengan format berikut:

json
Copy code
"homepage": "http://<your-github-username>.github.io/"
Deploy aplikasi dengan perintah:

bash
Copy code
npm run deploy
Contribute
Pull Requests sangat diterima :)

Hubungi Saya
Jika Anda memiliki pertanyaan atau umpan balik, jangan ragu untuk menghubungi saya di Instagram: @jouxingngo.

Show your support
Berikan ⭐ jika Anda menyukai aplikasi ini!
