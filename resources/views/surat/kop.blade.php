<html>

<head>
    <title>Bikin Kop Surat</title>
    <style type="text/css">
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

        .small {
            line-height: 0.1;
            font-size: 11px;

        }
    </style>
</head>

<body>
    <div class="rangkasurat">
        <table style="border-bottom: 5px solid #000000;">
            <tr>
                <td><img src="{{ asset('image/logo_prov_kaltim.png') }}" width="80px"></td>
                <td class="tengah">
                    <h3 class="text-normal">PEMERINTAH PROVINSI KALIMANTAN TIMUR</h3>
                    <h2>DINAS PENDIDIKAN DAN KEBUDAYAAN</h2>
                    <h2>SMK NEGERI 1 SEBULU</h2>
                    <p class="small">Jalan Ki Hajar Dewantara RT 007 Desa Sebulu Ilir Kec.
                        Sebulu</p>
                    <p class="small">Kab. Kutai Kartanegara, Kalimantan Timur 75552</p>
                    <p class="small">Telepon (0541) 6721099</p>
                    <p class="small">E-mail: <a href="mailto:smkn1sbl@gmail.com">smkn1sbl@gmail.com</a> | <a
                            href="https://smkn1sebulu.sch.id">https://smkn1sebulu.sch.id</a></p>
                </td>
                <td><img src="{{ asset('image/logo_smkn1sbl.jpg') }}" width="85px"></td>
            </tr>
        </table>
        <br>
        <table>

            <tr>
                <td>jenis_pendaftaran</td>
                <td>Jenis Pendaftaran</td>
            </tr>
            <tr>
                <td>jalur_pendaftaran_id</td>
                <td>Jalur Pendaftaran ID</td>
            </tr>
            <tr>
                <td>no_pendaftaran</td>
                <td>Nomor Pendaftaran</td>
            </tr>
            <tr>
                <td>jurusan_satu_id</td>
                <td>Jurusan Pilihan Pertama ID</td>
            </tr>
            <tr>
                <td>jurusan_dua_id</td>
                <td>Jurusan Pilihan Kedua ID</td>
            </tr>
            <tr>
                <td>no_ijazah</td>
                <td>Nomor Ijazah</td>
            </tr>
            <tr>
                <td>asal_sekolah</td>
                <td>Asal Sekolah</td>
            </tr>
            <!-- Add more rows for other fields -->
        </table>
    </div>


</body>

</html>
