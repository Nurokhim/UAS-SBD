<table>
  <tr>
    <td>NAMA</td>
    <td>Nurokhim</td>
  </tr>
  <tr>
    <td>NIM</td>
    <td>312010064</td>
  </tr>
  <tr>
    <td>KELAS</td>
    <td>TI.20.D1</td>
  </tr>
  <tr>
    <td>MATKUL</td>
    <td>Sistem Basis Data</td>
  </tr>
 <tr>
    <td>DOSEN</td>
    <td> Muhammad Najamuddin Dwi Miharja, S.Kom, M.kom, </td>
  </tr>
</table>

Dari Tugas UTS sebelumnya saya membuat sebuah sistem informasi klinik sederhana dimana dalam sistem tersebut saya akan menampilkan

1. user login

![WhatsApp Image 2022-07-07 at 16 41 08](https://user-images.githubusercontent.com/101801920/177775227-cdce4c89-1f5a-4b49-9bc8-0806a30b0f3a.jpeg)

untuk mengetahui username dan password nya maka bisa di lihat pada module tabel user, yaitu berikut ini :

![WhatsApp Image 2022-07-07 at 20 01 25](https://user-images.githubusercontent.com/101801920/177793793-34a104f1-42c1-4fae-9e97-87b5c22d50c5.jpeg)

2. tampilan Home

![WhatsApp Image 2022-07-07 at 19 51 38](https://user-images.githubusercontent.com/101801920/177777939-f529c3be-ba13-42ff-945f-c03580b043e2.jpeg)

3. Modul Data

![WhatsApp Image 2022-07-07 at 19 56 30](https://user-images.githubusercontent.com/101801920/177780315-031ce7bb-ccf1-49e1-8410-d306df78fb7f.jpeg)

4.Di sini saya akan memberi sample pada Modul Data Pasien, tentang apa saja fitur-fitur yang bisa di jalankan pada tabel pasien.

![WhatsApp Image 2022-07-07 at 19 58 19](https://user-images.githubusercontent.com/101801920/177780840-3f5f0ddc-ca48-487e-bfc4-c1be430a72f4.jpeg)

Pada tabel pasien kita dapat menambah,mengubah,dan menghapus data. Contohnya sebagai berikut 

A. Menambah data Pasien

untuk menmbah Data pasien yaitu dengan cara klik tambah kemudian isi data diri pasien dan klik simpan data. Di sini saya Menambahkan data diri pasien bernama sumarni

![WhatsApp Image 2022-07-07 at 20 12 50](https://user-images.githubusercontent.com/101801920/177783827-ace0f146-13fa-456a-a5fa-c0dfdef9b11f.jpeg)

maka, secara otomatis data pasien di tambahkan

![WhatsApp Image 2022-07-07 at 20 26 29](https://user-images.githubusercontent.com/101801920/177785028-bec6786e-1842-46ae-b350-9b59e91d807e.jpeg)

B. Mengubah data Pasien (edit pasien)

untuk mengubah Data pasien yaitu dengan cara klik icon pulpen  kemudian ubah data diri pasien yang ingin kita ubah kemudian klik simpan. di sini saya mengubah data atas nama Hafizh menjadi amel.

![WhatsApp Image 2022-07-07 at 20 35 31](https://user-images.githubusercontent.com/101801920/177788222-d97d9cf7-8508-4b37-99fc-b62252673084.jpeg)

maka, secara otomatis data pasien berubah

![WhatsApp Image 2022-07-07 at 20 37 43](https://user-images.githubusercontent.com/101801920/177787656-be6b06cf-c9ee-4950-97bb-817af81665ce.jpeg)

C. Menghapus data pasien

untuk menghapus Data pasien yaitu dengan cara klik icon tempat sampah kemudian klik saja data diri pasien yang ingin di hapus. maka secara otomatis data pasien terhapus dari tabel pasien.

di sini saya mencoba menghapus data diri sumarni, dan berikut hasilnya 

![WhatsApp Image 2022-07-07 at 20 49 49](https://user-images.githubusercontent.com/101801920/177790028-687ab5b2-c513-47ab-a975-9a6f9c79d83f.jpeg)

Seperti data pasien data Obat, Dokter, dan user pun sama bisa di berikan perintah tambah, ubah(edit) dan juga hapus.

5.Di dalam modul data obat saya menambahkan Triger

// IMPLEMENTASI TRIGGER

// table untuk trigger

create table log_obat(id_log int(100) auto_increment primary key, id_obat int(10), nama_obat_lama varchar(100), nama_obat_baru varchar(100), waktu date not null) // trigger

create trigger update_nama_obat before update on obat for each row insert into log_obat set id_obat=old.id_obat, nama_obat_lama = old.nama_obat, nama_obat_baru=new.nama_obat, waktu = now();

// END IMPLEMENTASI TRIGGER

Dimana fungsi Trigger sendiri dapat didefinisikan untuk menjalankan penrintah sebelum atau setelah eksekusi DML (Data Manipulation Language) seperti INSERT, UPDATE, dan DELETE. Trigger banyak digunakan untuk menjaga integritas informasi pada database. berikut tampilannya 

![WhatsApp Image 2022-07-07 at 21 00 58](https://user-images.githubusercontent.com/101801920/177792422-7d64e0e9-b44d-4105-a3da-de57d83f0a86.jpeg)

Fungsi dari triger disini untuk menampilkan perubahan nama obat sebelum dan setelah nya dilakukan proses update.

6.Tampilan Data yang menampilkan informasi total data. Untuk menampikan total data tersebut saya mengimplementasikan fungsi sebagai berikut :

CREATE FUNCTION fn_totalUsers() RETURNS INT(11) UNSIGNED NOT DETERMINISTIC NO SQL SQL SECURITY DEFINER RETURN (SELECT COUNT(id_pasien) FROM pasien)

![WhatsApp Image 2022-07-07 at 21 19 03](https://user-images.githubusercontent.com/101801920/177796378-b0fec77b-216a-4eab-aa84-94bfc9e91b15.jpeg)

7.Implementasi view 

// IMPLEMENTASI VIEW

CREATE VIEW viewPenyakit AS SELECT a.id_berobat, b.nama_pasien, b.jenis_kelamin, b.umur, a.keluhan_pasien, a.hasil_diagnosa, a.tgl_berobat, c.nama_dokter FROM berobat a JOIN pasien b ON a.id_pasien=b.id_pasien JOIN dokter c ON a.id_dokter=c.id_dokter WHERE b.jenis_kelamin='L'

// END IMPLEMENTASI VIEW

![WhatsApp Image 2022-07-07 at 21 21 22](https://user-images.githubusercontent.com/101801920/177796840-05c0f7c0-871d-4773-96e6-fd1e7fdd6b0a.jpeg)
