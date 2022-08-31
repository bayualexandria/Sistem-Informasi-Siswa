# Sistem Informasi Siswa/Siswi Berbasis Web Menggunakan CodeIgniter 4

<!-- ## Apa itu Sistem Aplikasi Ujian Sekolah? -->
<!-- 
Sistem Informasi Siswa/Siswi merupakan sistem untuk melakukan atau melaksanakan ujian UTS maupun UAS bagi siswa secara online maupun offline. -->

## Instalasi Sistem

Download dan install [xampp](https://www.apachefriends.org/download.html). Jalankan aplikasi tersebut kemudian buatlah sebuah database sesuai nama yang diinginkan.

Download dan extra Sistem Aplikasi Ujian ini ke folder `xampp/htdocs/`.

Download dan install [composer](https://getcomposer.org/). Kemudian buka terminal/cmd masuk ke directory Sistem yang telah di extra tadi. Kemudian ketikan `composer update`.

Download dan install [nodejs](https://docs.npmjs.com/downloading-and-installing-node-js-and-npm). Kemudian buka terminal/cmd masuk ke directory Sistem yang telah di extra tadi. Kemudian ketikan `npm install` untuk menginstall package di project kita.

Ubah nama file `env` menjadi `.env` dan dan ubah bagian database sesuaikan dengan database yang telah dibuat.

Jalankan perintah `php spark serve`.

Lalu jalankan perintah `npx mix watch` untuk menjalankan file css dan js.