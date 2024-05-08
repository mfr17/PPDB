<html>

<head>
    <title>Cetak Formulir {{ $id['no_pendaftaran'] }} {{ $id['nama'] }}</title>
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

        .px-10 {
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .date {
            padding-top: 20px;
            height: 50px;
        }

        .ttd {
            height: 150px;
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
{{-- @dd($jalur); --}}

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
                <td class='bold px-10'>Registrasi Peserta Didik</td>
            </tr>
            <tr>
                <td>No Pendaftaran</td>
                <td>:</td>
                <td>{{ $id['no_pendaftaran'] }}</td>
            </tr>
            <tr>
                <td>Jenis Pendaftaran</td>
                <td>:</td>
                <td>{{ $id['jenis_pendaftaran'] }}</td>
            </tr>
            <tr>
                <td>Jalur Pendaftaran</td>
                <td>:</td>
                <td>{{ $jalur[0] }}</td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td>{{ $id['nama'] }}</td>
            </tr>
            <tr>
                <td>Jurusan Pertama</td>
                <td>:</td>
                <td>{{ $jurusan1[0] }}</td>
            </tr>
            <tr>
                <td>Jurusan Kedua</td>
                <td>:</td>
                <td>{{ $jurusan2[0] }}</td>
            </tr>
            <tr>
                <td>Asal Sekolah</td>
                <td>:</td>
                <td>{{ $id['asal_sekolah'] }}</td>
            </tr>
            <tr>
                <td>Alamat Asal Sekolah</td>
                <td>:</td>
                <td>{{ $id['alamat_asal_sekolah'] }}</td>
            </tr>
            <tr>
                <td>Hobi</td>
                <td>:</td>
                <td>{{ $id['hobi'] }}</td>
            </tr>
            <tr>
                <td>Cita-Cita</td>
                <td>:</td>
                <td>{{ $id['cita_cita'] }}</td>
            </tr>
            <tr>
                <td class='bold px-10'>Data Diri</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{ $id['nama'] }}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>{{ $jenis_kelamin }}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>{{ $id['nik'] }}</td>
            </tr>
            <tr>
                <td>Nomor KK</td>
                <td>:</td>
                <td>{{ $id['no_kk'] }}</td>
            </tr>
            <tr>
                <td>NIS</td>
                <td>:</td>
                <td>{{ $id['nis'] }}</td>
            </tr>
            <tr>
                <td>NISN</td>
                <td>:</td>
                <td>{{ $id['nisn'] }}</td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>:</td>
                <td>{{ $agama[0] }}</td>
            </tr>
            <tr>
                <td>Kebutuhan Khusus</td>
                <td>:</td>
                <td>{{ $kebutuhan[0] }}</td>
            </tr>
            <tr>
                <td>Tempat Tanggal Lahir</td>
                <td>:</td>
                <td>{{ $id['tempat_lahir'], $tanggal_lahir }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{ $id['alamat'], $id['desa'] }}, </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>{{ $id['kecamatan'] }}, {{ $id['kota_kabupaten'] }},
                    {{ $id['kode_pos'] }}
                </td>
            </tr>
            <tr>
                <td>Tempat Tinggal</td>
                <td>:</td>
                <td>{{ $tempat_tinggal[0] }}</td>
            </tr>
            <tr>
                <td>Moda Transpotasi</td>
                <td>:</td>
                <td>{{ $transportasi[0] }}</td>
            </tr>
            <tr>
                <td>No HP</td>
                <td>:</td>
                <td>{{ $id['no_hp'] }}</td>
            </tr>
            <tr>
                <td>No HP Orang Tua/Wali</td>
                <td>:</td>
                <td>{{ $id['no_hp_ortu'] }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td>{{ $id['email'] }}</td>
            </tr>
            <tr>
                <td>SKTM</td>
                <td>:</td>
                <td>{{ $id['sktm'] }}</td>
            </tr>
            <tr>
                <td>KIP</td>
                <td>:</td>
                <td>{{ $id['kip'] }}</td>
            </tr>
            <tr>
                <td>Kewarganegaraan</td>
                <td>:</td>
                <td>{{ $id['kewarganegaraan'] }}</td>
            </tr>
            <tr>
                <td>Anak Ke-</td>
                <td>:</td>
                <td>{{ $id['anak_ke'] }}</td>
            </tr>
            <br><br><br>
            <tr>
                <td class='bold px-10'>Data Orang Tua/Wali</td>
            </tr>
            <tr>
                <td>Nama Ayah</td>
                <td>:</td>
                <td>{{ $id['nama_ayah'] }}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>{{ $id['nik_ayah'] }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{ $id['alamat_ayah'] }}</td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td>{{ $tanggal_lahir_ayah[0] }}</td>
            </tr>
            <tr>
                <td>Pendidikan</td>
                <td>:</td>
                <td>{{ $pendidikan_ayah[0] }}</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>:</td>
                <td>{{ $pekerjaan_ayah[0] }}</td>
            </tr>
            <tr>
                <td>Penghasilan</td>
                <td>:</td>
                <td>{{ $pendapatan_ayah[0] }}</td>
            </tr>
            <tr>
                <td>Nama Ibu</td>
                <td>:</td>
                <td>{{ $id['nama_ibu'] }}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>{{ $id['nik_ibu'] }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{ $id['alamat_ibu'] }}</td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td>{{ $tanggal_lahir_ibu[0] }}</td>
            </tr>
            <tr>
                <td>Pendidikan</td>
                <td>:</td>
                <td>{{ $pendidikan_ibu[0] }}</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>:</td>
                <td>{{ $pekerjaan_ibu[0] }}</td>
            </tr>
            <tr>
                <td>Penghasilan</td>
                <td>:</td>
                <td>{{ $pendapatan_ibu[0] }}</td>
            </tr>
            <tr>
                <td class='bold px-10'>(Opsional)</td>
            </tr>
            <tr>
                <td>Nama Wali</td>
                <td>:</td>
                <td>{{ $id['nama_wali'] }}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>{{ $id['nik_wali'] }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{ $id['alamat_wali'] }}</td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td>{{ $tanggal_lahir_wali }}</td>
            </tr>
            <tr>
                <td>Pendidikan</td>
                <td>:</td>
                <td>{{ $pendidikan_wali }}</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>:</td>
                <td>{{ $pekerjaan_wali }}</td>
            </tr>
            <tr>
                <td>Penghasilan</td>
                <td>:</td>
                <td>{{ $pendapatan_wali }}</td>
            </tr>
            <tr>
                <td class='bold px-10'>Data Periodik</td>
            </tr>
            <tr>
                <td>Tinggi Badan</td>
                <td>:</td>
                <td>{{ $id['tinggi_badan'] }} Cm</td>
            </tr>
            <tr>
                <td>Berat Badan</td>
                <td>:</td>
                <td>{{ $id['berat_badan'] }} Kg</td>
            </tr>
            <tr>
                <td>Lingkar Kepala</td>
                <td>:</td>
                <td>{{ $id['lingkar_kepala'] }} Cm</td>
            </tr>
            <tr>
                <td>Jarak Tempat Tinggal</td>
                <td>:</td>
                <td>{{ $id['jarak_tempat_tinggal'] }} Km</td>
            </tr>
            <tr>
                <td>Waktu Tempuh Ke-Sekolah</td>
                <td>:</td>
                <td>{{ $id['waktu_tempuh_sekolah'] }} Menit</td>
            </tr>
            <tr>
                <td>Jumlah Saudara Kandung</td>
                <td>:</td>
                <td>{{ $id['jumlah_saudara_kandung'] }}</td>
            </tr>

    </div>
</body>

</html>
