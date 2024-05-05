<html>

<head>
    <title>Cetak Formulir Pendaftaran</title>
    <style type='text/css'>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .rangkasurat {
            width: 690px;
            margin: 0 0 0 0;
            height: 500px;
            padding: 2px;
        }

        table {
            width: 100%;
            padding: 2px;
        }

        .tengah {
            text-align: center;
            line-height: 5px;
            vertical-align: middle
        }

        .text-normal {
            font-weight: normal;
        }

        .bold {
            font-weight: bold;
        }

        .small {
            line-height: 0.1;
            font-size: 11px;

        }
    </style>
</head>

<body>
    <div class='rangkasurat'>
        <table style='border-bottom: 5px solid #000000;'>
            <tr>
                <td><img src='image/logo_prov_kaltim.png' width='80px'></td>
                <td class='tengah'>
                    <h3 class='text-normal'>PEMERINTAH PROVINSI KALIMANTAN TIMUR</h3>
                    <h2>DINAS PENDIDIKAN DAN KEBUDAYAAN</h2>
                    <h2>SMK NEGERI 1 SEBULU</h2>
                    <p class='small'>Jalan Ki Hajar Dewantara RT 007 Desa Sebulu Ilir Kec.
                        Sebulu</p>
                    <p class='small'>Kab. Kutai Kartanegara, Kalimantan Timur 75552</p>
                    <p class='small'>Telepon (0541) 6721099</p>
                    <p class='small'>E-mail: <a href='mailto:smkn1sbl@gmail.com'>smkn1sbl@gmail.com</a> | <a
                            href='https://smkn1sebulu.sch.id'>https://smkn1sebulu.sch.id</a></p>
                </td>
                <td><img src='image/logo_smkn1sbl.jpg' width='85px'></td>
            </tr>
        </table>
        <br>
        <table>

            <tr>
                <td class='bold'>Registrasi Peserta Didik</td>
            </tr>
            <tr>
                <td class='bold'></td>
            </tr>
            <tr>
                <td>No Pendaftaran</td>
                <td>{$reg_code}</td>
            </tr>
            <tr>
                <td>Jenis Pendaftaran</td>
                <td>{$jenis_pendaftaran}</td>
            </tr>
            <tr>
                <td>Jalur Pendaftaran</td>
                <td>{$jalur[0]}</td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td>{$validatedData['nama']}</td>
            </tr>
            <tr>
                <td>Jurusan Pertama</td>
                <td>{$jurusan1[0]}</td>
            </tr>
            <tr>
                <td>Jurusan Kedua</td>
                <td>{$jurusan2[0]}</td>
            </tr>
            <tr>
                <td>Asal Sekolah</td>
                <td>{$validatedData['asal_sekolah']}</td>
            </tr>
            <tr>
                <td>Alamat Asal Sekolah</td>
                <td>{$validatedData['alamat_asal_sekolah']}</td>
            </tr>
            <tr>
                <td>Hobi</td>
                <td>{$validatedData['hobi']}</td>
            </tr>
            <tr>
                <td>Cita-Cita</td>
                <td>{$validatedData['cita_cita']}</td>
            </tr>
            <tr>
                <td class='bold'></td>
            </tr>
            <tr>
                <td class='bold'>Data Diri</td>
            </tr>
            <tr>
                <td class='bold'></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>{$validatedData['nama']}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>{$jenis_kelamin}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>{$validatedData['nik']}</td>
            </tr>
            <tr>
                <td>Nomor KK</td>
                <td>{$validatedData['no_kk']}</td>
            </tr>
            <tr>
                <td>NIS</td>
                <td>{$validatedData['nis']}</td>
            </tr>
            <tr>
                <td>NISN</td>
                <td>{$validatedData['nisn']}</td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>{$agama[0]}</td>
            </tr>
            <tr>
                <td>Kebutuhan Khusus</td>
                <td>{$kebutuhan[0]}</td>
            </tr>
            <tr>
                <td>Tempat Tanggal Lahir</td>
                <td>{$validatedData['tempat_lahir']}, {$tanggal_lahir}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>{$validatedData['alamat']}, {$validatedData['desa']}, </td>
            </tr>
            <tr>
                <td></td>
                <td>{$validatedData['kecamatan']}, {$validatedData['kota_kabupaten']}, {$validatedData['kode_pos']}</td>
            </tr>
            <tr>
                <td>Tempat Tinggal</td>
                <td>{$tempat_tinggal[0]}</td>
            </tr>
            <tr>
                <td>Moda Transpotasi</td>
                <td>{$transportasi[0]}</td>
            </tr>
            <tr>
                <td>No HP</td>
                <td>{$validatedData['no_hp']}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{$validatedData['email']}</td>
            </tr>
            <tr>
                <td>SKTM</td>
                <td>{$validatedData['sktm']}</td>
            </tr>
            <tr>
                <td>KIP</td>
                <td>{$validatedData['kip']}</td>
            </tr>
            <tr>
                <td>Kewarganegaraan</td>
                <td>{$validatedData['kewarganegaraan']}</td>
            </tr>
            <tr>
                <td class='bold'></td>
            </tr>
            <tr>
                <td class='bold'>Data Orang Tua/Wali</td>
            </tr>
            <tr>
                <td class='bold'></td>
            </tr>
            <tr>
                <td>Nama Ayah</td>
                <td>{$validatedData['nama_ayah']}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>{$validatedData['nik_ayah']}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>{$validatedData['alamat_ayah']}</td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>{$tanggal_lahir_ayah[0]}</td>
            </tr>
            <tr>
                <td>Pendidikan</td>
                <td>{$pendidikan_ayah[0]}</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>{$pekerjaan_ayah[0]}</td>
            </tr>
            <tr>
                <td>Penghasilan</td>
                <td>{$pendapatan_ayah[0]}</td>
            </tr>
            <tr>
                <td>Nama Ibu</td>
                <td>{$validatedData['nama_ibu']}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>{$validatedData['nik_ibu']}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>{$validatedData['alamat_ibu']}</td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>{$tanggal_lahir_ibu[0]}</td>
            </tr>
            <tr>
                <td>Pendidikan</td>
                <td>{$pendidikan_ibu[0]}</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>{$pekerjaan_ibu[0]}</td>
            </tr>
            <tr>
                <td>Penghasilan</td>
                <td>{$pendapatan_ibu[0]}</td>
            </tr>
            <tr>
                <td class='bold'></td>
            </tr>
            <tr>
                <td class='bold'>(Opsional)</td>
            </tr>
            <tr>
                <td class='bold'></td>
            </tr>
            <tr>
                <td>Nama Wali</td>
                <td>{$validatedData['nama_wali']}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>{$validatedData['nik_wali']}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>{$validatedData['alamat_wali']}</td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>{$tanggal_lahir_wali[0]}</td>
            </tr>
            <tr>
                <td>Pendidikan</td>
                <td>{$pendidikan_wali[0]}</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>{$pekerjaan_wali[0]}</td>
            </tr>
            <tr>
                <td>Penghasilan</td>
                <td>{$pendapatan_wali[0]}</td>
            </tr>
            <tr>
                <td class='bold'></td>
            </tr>
            <tr>
                <td class='bold'>Data Periodik</td>
            </tr>
            <tr>
                <td class='bold'></td>
            </tr>
            <tr>
                <td>Tinggi Badan</td>
                <td>{$validatedData['tinggi_badan']} Cm</td>
            </tr>
            <tr>
                <td>Berat Badan</td>
                <td>{$validatedData['berat_badan']} Kg</td>
            </tr>
            <tr>
                <td>Lingkar Kepala</td>
                <td>{$validatedData['lingkar_kepala']} Cm</td>
            </tr>
            <tr>
                <td>Jarak Tempat Tinggal</td>
                <td>{$validatedData['jarak_tempat_tinggal']} Km</td>
            </tr>
            <tr>
                <td>Waktu Tempuh Ke-Sekolah</td>
                <td>{$validatedData['waktu_tempuh_sekolah']} Menit</td>
            </tr>
            <tr>
                <td>Jumlah Saudara Kandung</td>
                <td>{$validatedData['jumlah_saudara_kandung']}</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Sebulu, {$date}</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Calon Peserta Didik</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>......................</td>
            </tr>
        </table>
    </div>


</body>

</html>'
