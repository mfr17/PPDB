<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentAddmissionController extends Controller
{
    public function create()
    {

        $jalur = DB::table('options')->where('option_group', 'admission_types')->pluck('option_name', 'id');
        $jurusan = DB::table('options')->where('option_group', 'school_major')->pluck('option_name', 'id');
        $agama = DB::table('options')->where('option_group', 'religions')->pluck('option_name', 'id');
        $kebutuhan = DB::table('options')->where('option_group', 'special_needs')->pluck('option_name', 'id');
        $pendidikan = DB::table('options')->where('option_group', 'educations')->pluck('option_name', 'id');
        $pekerjaan = DB::table('options')->where('option_group', 'employments')->pluck('option_name', 'id');
        $pendapatan = DB::table('options')->where('option_group', 'monthly_incomes')->pluck('option_name', 'id');
        $tempat_tinggal = DB::table('options')->where('option_group', 'residences')->pluck('option_name', 'id');
        $transportasi = DB::table('options')->where('option_group', 'transportations')->pluck('option_name', 'id');


        $options = [
            'jalur' => $jalur,
            'jurusan' => $jurusan,
            'agama' => $agama,
            'kebutuhan' => $kebutuhan,
            'pendidikan' => $pendidikan,
            'pekerjaan' => $pekerjaan,
            'pendapatan' => $pendapatan,
            'tempat_tinggal' => $tempat_tinggal,
            'transpotasi' => $transportasi,
        ];
        return view('pages.daftar', $options);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate(
            [
                'jenis_pendaftaran' => ['required'],
                'jalur_pendaftaran_id' => ['required', 'numeric'],
                'jurusan_satu_id' => ['required', 'numeric'],
                'jurusan_dua_id' => ['required', 'numeric'],
                'hobi' => ['nullable', 'string', 'max:255'],
                'cita_cita' => ['nullable', 'string', 'max:255'],
                'asal_sekolah' => ['nullable', 'string', 'max:255'],
                'alamat_asal_sekolah' => ['nullable', 'string', 'max:255'],
                'nama' => ['required', 'string', 'max:255'],
                'jenis_kelamin' => ['required', 'in:M,F'],
                'nik' => ['required', 'numeric', 'unique:students'],
                'no_kk' => ['required', 'numeric',],
                'nis' => ['required', 'numeric',],
                'nisn' => ['required', 'numeric',],
                'agama_id' => ['required'],
                'kebutuhan_khusus_id' => ['required'],
                'tempat_lahir' => ['required', 'string', 'max:255'],
                'tanggal_lahir' => ['required', 'date'],
                'alamat' => ['required', 'string', 'max:255'],
                'desa' => ['required', 'string', 'max:255'],
                'kecamatan' => ['required', 'string', 'max:255'],
                'kota_kabupaten' => ['required', 'string', 'max:255'],
                'kode_pos' => ['required', 'numeric'],
                'tempat_tinggal_id' => ['required', 'numeric'],
                'moda_transpotasi_id' => ['required', 'numeric'],
                'no_hp' => ['required', 'numeric'],
                'email' => ['required', 'email'],
                'sktm' => ['nullable', 'numeric'],
                'kip' => ['nullable', 'numeric'],
                'kewarganegaraan' => ['required'],
                'nama_ayah' => ['required', 'string', 'max:255'],
                'nik_ayah' => ['nullable', 'numeric',],
                'alamat_ayah' => ['nullable', 'string',],
                'ayah_tanggal_lahir' => ['nullable', 'date'],
                'ayah_pendidikan_id' => ['nullable', 'numeric'],
                'ayah_pekerjaan_id' => ['nullable', 'numeric'],
                'ayah_penghasilan_id' => ['nullable', 'numeric'],
                'nama_ibu' => ['required', 'string', 'max:255'],
                'nik_ibu' => ['nullable', 'numeric',],
                'alamat_ibu' => ['nullable', 'string',],
                'ibu_tanggal_lahir' => ['nullable', 'date'],
                'ibu_pendidikan_id' => ['nullable', 'numeric'],
                'ibu_pekerjaan_id' => ['nullable', 'numeric'],
                'ibu_penghasilan_id' => ['nullable', 'numeric'],
                'nama_wali' => ['nullable', 'string', 'max:255'],
                'nik_wali' => ['nullable', 'numeric',],
                'alamat_wali' => ['nullable', 'string',],
                'wali_tanggal_lahir' => ['nullable', 'date'],
                'wali_pendidikan_id' => ['nullable', 'numeric'],
                'wali_pekerjaan_id' => ['nullable', 'numeric'],
                'wali_penghasilan_id' => ['nullable', 'numeric'],
                'tinggi_badan' => ['nullable', 'numeric'],
                'berat_badan' => ['nullable', 'numeric'],
                'lingkar_kepala' => ['nullable', 'numeric',],
                'jarak_tempat_tinggal' => ['nullable', 'numeric'],
                'waktu_tempuh_sekolah' => ['nullable', 'numeric'],
                'jumlah_saudara_kandung' => ['nullable', 'numeric'],
            ],
            [
                'email' => 'Email Tidak Valid',
                'nik.unique' => 'NIK Sudah Terdaftar (Silahkan hubungi operator untuk melakukan perubahan data)',
                'nik.numeric' => 'NIK Harus Berupa Angka',
                'no_kk.numeric' => 'NOMOR KK Harus Berupa Angka',
                'kode_pos.numeric' => 'Kode Pos Harus Berupa Angka',
                'no_hp.numeric' => 'Nomer HP Harus Berupa Angka',
                'nis.numeric' => 'NIS Harus Berupa Angka',
                'nisn.numeric' => 'NISN Harus Berupa Angka',
                'sktm.numeric' => 'SKTM Harus Berupa Angka',
                'kip.numeric' => 'KIP Harus Berupa Angka',
                'nik_ayah.numeric' => 'NIK Ayah Harus Berupa Angka',
                'nik_ibu.numeric' => 'NIK Ibu Harus Berupa Angka',
                'nik_wali.numeric' => 'NIK Wali Harus Berupa Angka',
            ]
        );

        $year = DB::table('settings')->where('setting_variable', 'admission_year')->pluck('setting_value');
        $siswa = Students::latest()->first();
        if ($siswa == null) {
            $noreg = "0001";
        } else {
            $noreg = (int)substr($siswa->no_pendaftaran, 4, 4) + 1;
            $noreg = "000" . $noreg;
        }
        $prefix = $year[0];
        $reg_code = $prefix . $noreg;

        $validatedData['no_pendaftaran'] = $reg_code;
        $validatedData['registrasi_ulang'] = 'false';

        if ($validatedData['jenis_pendaftaran'] == "true") {
            $jenis_pendaftaran = 'Baru';
        } else {
            $jenis_pendaftaran = 'Pindahan';
        }
        if ($validatedData['jenis_kelamin'] == "M") {
            $jenis_kelamin = 'Laki-Laki';
        } else {
            $jenis_kelamin = 'Perempuan';
        }
        $tanggal_lahir = Carbon::parse($validatedData['tanggal_lahir'])->format('d-m-Y');
        $tanggal_lahir_ayah = Carbon::parse($validatedData['ayah_tanggal_lahir'])->format('d-m-Y');
        $tanggal_lahir_ibu = Carbon::parse($validatedData['ibu_tanggal_lahir'])->format('d-m-Y');
        if ($validatedData['wali_tanggal_lahir'] != null) {
            $tanggal_lahir_wali = Carbon::parse($validatedData['wali_tanggal_lahir'])->format('d-m-Y');
        } else {
            $tanggal_lahir_wali = "";
        }

        $date = Carbon::now()->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('j F Y');

        $jalur = DB::table('options')->where('id', $validatedData['jalur_pendaftaran_id'])->pluck('option_name');
        $jurusan1 = DB::table('options')->where('id', $validatedData['jurusan_satu_id'])->pluck('option_name');
        $jurusan2 = DB::table('options')->where('id', $validatedData['jurusan_dua_id'])->pluck('option_name');
        $agama = DB::table('options')->where('id', $validatedData['agama_id'])->pluck('option_name');
        $kebutuhan = DB::table('options')->where('id', $validatedData['kebutuhan_khusus_id'])->pluck('option_name');
        $tempat_tinggal = DB::table('options')->where('id', $validatedData['tempat_tinggal_id'])->pluck('option_name');
        $transportasi = DB::table('options')->where('id', $validatedData['moda_transpotasi_id'])->pluck('option_name');
        $pendidikan_ayah = DB::table('options')->where('id', $validatedData['ayah_pendidikan_id'])->pluck('option_name');
        $pekerjaan_ayah = DB::table('options')->where('id', $validatedData['ayah_pekerjaan_id'])->pluck('option_name');
        $pendapatan_ayah = DB::table('options')->where('id', $validatedData['ayah_penghasilan_id'])->pluck('option_name');
        $pendidikan_ibu = DB::table('options')->where('id', $validatedData['ibu_pendidikan_id'])->pluck('option_name');
        $pekerjaan_ibu = DB::table('options')->where('id', $validatedData['ibu_pekerjaan_id'])->pluck('option_name');
        $pendapatan_ibu = DB::table('options')->where('id', $validatedData['ibu_penghasilan_id'])->pluck('option_name');
        $pendidikan_wali = DB::table('options')->where('id', $validatedData['wali_pendidikan_id'])->pluck('option_name');
        $pekerjaan_wali = DB::table('options')->where('id', $validatedData['wali_pekerjaan_id'])->pluck('option_name');
        $pendapatan_wali = DB::table('options')->where('id', $validatedData['wali_penghasilan_id'])->pluck('option_name');

        if ($pendidikan_wali == "[]" && $pekerjaan_wali == "[]" && $pendapatan_wali == "[]") {
            $pendidikan_wali = "";
            $pekerjaan_wali = "";
            $pendapatan_wali = "";
        } else {
            $pendidikan_wali = $pendidikan_wali[0];
            $pekerjaan_wali = $pekerjaan_wali[0];
            $pendapatan_wali = $pendapatan_wali[0];
        }

        Students::create($validatedData);
        $html = "
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
                            .px-10{
                                padding-top: 5px;
                                padding-bottom: 5px;
                            }
                            .date{
                                padding-top: 20px;
                                height: 50px;
                            }
                            .ttd{
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
                                    <td>{$reg_code}</td>
                                </tr>
                                <tr>
                                    <td>Jenis Pendaftaran</td>
                                    <td>:</td>
                                    <td>{$jenis_pendaftaran}</td>
                                </tr>
                                <tr>
                                    <td>Jalur Pendaftaran</td>
                                    <td>:</td>
                                    <td>{$jalur[0]}</td>
                                </tr>
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td>:</td>
                                    <td>{$validatedData['nama']}</td>
                                </tr>
                                <tr>
                                    <td>Jurusan Pertama</td>
                                    <td>:</td>
                                    <td>{$jurusan1[0]}</td>
                                </tr>
                                <tr>
                                    <td>Jurusan Kedua</td>
                                    <td>:</td>
                                    <td>{$jurusan2[0]}</td>
                                </tr>
                                <tr>
                                    <td>Asal Sekolah</td>
                                    <td>:</td>
                                    <td>{$validatedData['asal_sekolah']}</td>
                                </tr>
                                <tr>
                                    <td>Alamat Asal Sekolah</td>
                                    <td>:</td>
                                    <td>{$validatedData['alamat_asal_sekolah']}</td>
                                </tr>
                                <tr>
                                    <td>Hobi</td>
                                    <td>:</td>
                                    <td>{$validatedData['hobi']}</td>
                                </tr>
                                <tr>
                                    <td>Cita-Cita</td>
                                    <td>:</td>
                                    <td>{$validatedData['cita_cita']}</td>
                                </tr>
                                <tr>
                                    <td class='bold px-10'>Data Diri</td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>{$validatedData['nama']}</td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>:</td>
                                    <td>{$jenis_kelamin}</td>
                                </tr>
                                <tr>
                                    <td>NIK</td>
                                    <td>:</td>
                                    <td>{$validatedData['nik']}</td>
                                </tr>
                                <tr>
                                    <td>Nomor KK</td>
                                    <td>:</td>
                                    <td>{$validatedData['no_kk']}</td>
                                </tr>
                                <tr>
                                    <td>NIS</td>
                                    <td>:</td>
                                    <td>{$validatedData['nis']}</td>
                                </tr>
                                <tr>
                                    <td>NISN</td>
                                    <td>:</td>
                                    <td>{$validatedData['nisn']}</td>
                                </tr>
                                <tr>
                                    <td>Agama</td>
                                    <td>:</td>
                                    <td>{$agama[0]}</td>
                                </tr>
                                <tr>
                                    <td>Kebutuhan Khusus</td>
                                    <td>:</td>
                                    <td>{$kebutuhan[0]}</td>
                                </tr>
                                <tr>
                                    <td>Tempat Tanggal Lahir</td>
                                    <td>:</td>
                                    <td>{$validatedData['tempat_lahir']}, {$tanggal_lahir}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td>{$validatedData['alamat']}, {$validatedData['desa']}, </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>{$validatedData['kecamatan']}, {$validatedData['kota_kabupaten']}, {$validatedData['kode_pos']}</td>
                                </tr>
                                <tr>
                                    <td>Tempat Tinggal</td>
                                    <td>:</td>
                                    <td>{$tempat_tinggal[0]}</td>
                                </tr>
                                <tr>
                                    <td>Moda Transpotasi</td>
                                    <td>:</td>
                                    <td>{$transportasi[0]}</td>
                                </tr>
                                <tr>
                                    <td>No HP</td>
                                    <td>:</td>
                                    <td>{$validatedData['no_hp']}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>{$validatedData['email']}</td>
                                </tr>
                                <tr>
                                    <td>SKTM</td>
                                    <td>:</td>
                                    <td>{$validatedData['sktm']}</td>
                                </tr>
                                <tr>
                                    <td>KIP</td>
                                    <td>:</td>
                                    <td>{$validatedData['kip']}</td>
                                </tr>
                                <tr>
                                    <td>Kewarganegaraan</td>
                                    <td>:</td>
                                    <td>{$validatedData['kewarganegaraan']}</td>
                                </tr>
                                <tr>
                                    <td class='bold px-10'>Data Orang Tua/Wali</td>
                                </tr>
                                <tr>
                                    <td>Nama Ayah</td>
                                    <td>:</td>
                                    <td>{$validatedData['nama_ayah']}</td>
                                </tr>
                                <tr>
                                    <td>NIK</td>
                                    <td>:</td>
                                    <td>{$validatedData['nik_ayah']}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td>{$validatedData['alamat_ayah']}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td>:</td>
                                    <td>{$tanggal_lahir_ayah[0]}</td>
                                </tr>
                                <tr>
                                    <td>Pendidikan</td>
                                    <td>:</td>
                                    <td>{$pendidikan_ayah[0]}</td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan</td>
                                    <td>:</td>
                                    <td>{$pekerjaan_ayah[0]}</td>
                                </tr>
                                <tr>
                                    <td>Penghasilan</td>
                                    <td>:</td>
                                    <td>{$pendapatan_ayah[0]}</td>
                                </tr>
                                <tr>
                                    <td>Nama Ibu</td>
                                    <td>:</td>
                                    <td>{$validatedData['nama_ibu']}</td>
                                </tr>
                                <tr>
                                    <td>NIK</td>
                                    <td>:</td>
                                    <td>{$validatedData['nik_ibu']}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td>{$validatedData['alamat_ibu']}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td>:</td>
                                    <td>{$tanggal_lahir_ibu[0]}</td>
                                </tr>
                                <tr>
                                    <td>Pendidikan</td>
                                    <td>:</td>
                                    <td>{$pendidikan_ibu[0]}</td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan</td>
                                    <td>:</td>
                                    <td>{$pekerjaan_ibu[0]}</td>
                                </tr>
                                <tr>
                                    <td>Penghasilan</td>
                                    <td>:</td>
                                    <td>{$pendapatan_ibu[0]}</td>
                                </tr>
                                <tr>
                                    <td class='bold px-10'>(Opsional)</td>
                                </tr>
                                <tr>
                                    <td>Nama Wali</td>
                                    <td>:</td>
                                    <td>{$validatedData['nama_wali']}</td>
                                </tr>
                                <tr>
                                    <td>NIK</td>
                                    <td>:</td>
                                    <td>{$validatedData['nik_wali']}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td>{$validatedData['alamat_wali']}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td>:</td>
                                    <td>{$tanggal_lahir_wali}</td>
                                </tr>
                                <tr>
                                    <td>Pendidikan</td>
                                    <td>:</td>
                                    <td>{$pendidikan_wali}</td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan</td>
                                    <td>:</td>
                                    <td>{$pekerjaan_wali}</td>
                                </tr>
                                <tr>
                                    <td>Penghasilan</td>
                                    <td>:</td>
                                    <td>{$pendapatan_wali}</td>
                                </tr>
                                <tr>
                                    <td class='bold px-10'>Data Periodik</td>
                                </tr>
                                <tr>
                                    <td>Tinggi Badan</td>
                                    <td>:</td>
                                    <td>{$validatedData['tinggi_badan']} Cm</td>
                                </tr>
                                <tr>
                                    <td>Berat Badan</td>
                                    <td>:</td>
                                    <td>{$validatedData['berat_badan']} Kg</td>
                                </tr>
                                <tr>
                                    <td>Lingkar Kepala</td>
                                    <td>:</td>
                                    <td>{$validatedData['lingkar_kepala']} Cm</td>
                                </tr>
                                <tr>
                                    <td>Jarak Tempat Tinggal</td>
                                    <td>:</td>
                                    <td>{$validatedData['jarak_tempat_tinggal']} Km</td>
                                </tr>
                                <tr>
                                    <td>Waktu Tempuh Ke-Sekolah</td>
                                    <td>:</td>
                                    <td>{$validatedData['waktu_tempuh_sekolah']} Menit</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Saudara Kandung</td>
                                    <td>:</td>
                                    <td>{$validatedData['jumlah_saudara_kandung']}</td>
                                </tr>
                                <!-- <tr>
                                    <td></td>
                                    <td></td>
                                    <td class='date tengah'>Sebulu, {$date}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td class='tengah'>Calon Peserta Didik</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td class='ttd tengah'>...............................</td>
                                </tr> -->
                            </table>
                        </div>
                    </body>
                </html>";


        $pdf = Pdf::loadHTML($html);
        return $pdf->download("Formulir Pendaftaran {$validatedData['nama']}.pdf");
    }
}
