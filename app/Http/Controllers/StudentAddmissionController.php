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

    public function cetak(Students $id)
    {
        if ($id['jenis_kelamin'] == "L") {
            $jenis_kelamin = 'Laki-Laki';
        } else {
            $jenis_kelamin = 'Perempuan';
        }
        $jalur = DB::table('options')->where('id', $id['jalur_pendaftaran_id'])->pluck('option_name');
        $jurusan1 = DB::table('options')->where('id', $id['jurusan_satu_id'])->pluck('option_name');
        $jurusan2 = DB::table('options')->where('id', $id['jurusan_dua_id'])->pluck('option_name');
        $agama = DB::table('options')->where('id', $id['agama_id'])->pluck('option_name');
        $kebutuhan = DB::table('options')->where('id', $id['kebutuhan_khusus_id'])->pluck('option_name');
        $tempat_tinggal = DB::table('options')->where('id', $id['tempat_tinggal_id'])->pluck('option_name');
        $transportasi = DB::table('options')->where('id', $id['moda_transportasi_id'])->pluck('option_name');
        $pendidikan_ayah = DB::table('options')->where('id', $id['ayah_pendidikan_id'])->pluck('option_name');
        $pekerjaan_ayah = DB::table('options')->where('id', $id['ayah_pekerjaan_id'])->pluck('option_name');
        $pendapatan_ayah = DB::table('options')->where('id', $id['ayah_penghasilan_id'])->pluck('option_name');
        $pendidikan_ibu = DB::table('options')->where('id', $id['ibu_pendidikan_id'])->pluck('option_name');
        $pekerjaan_ibu = DB::table('options')->where('id', $id['ibu_pekerjaan_id'])->pluck('option_name');
        $pendapatan_ibu = DB::table('options')->where('id', $id['ibu_penghasilan_id'])->pluck('option_name');
        $pendidikan_wali = DB::table('options')->where('id', $id['wali_pendidikan_id'])->pluck('option_name');
        $pekerjaan_wali = DB::table('options')->where('id', $id['wali_pekerjaan_id'])->pluck('option_name');
        $pendapatan_wali = DB::table('options')->where('id', $id['wali_penghasilan_id'])->pluck('option_name');
        if ($pendidikan_wali == "[]" && $pekerjaan_wali == "[]" && $pendapatan_wali == "[]") {
            $pendidikan_wali = "";
            $pekerjaan_wali = "";
            $pendapatan_wali = "";
        } else {
            $pendidikan_wali = $pendidikan_wali[0];
            $pekerjaan_wali = $pekerjaan_wali[0];
            $pendapatan_wali = $pendapatan_wali[0];
        }
        $tanggal_lahir = Carbon::parse($id['tanggal_lahir'])->format('d-m-Y');
        $tanggal_lahir_ayah = Carbon::parse($id['ayah_tanggal_lahir'])->format('d-m-Y');
        $tanggal_lahir_ibu = Carbon::parse($id['ibu_tanggal_lahir'])->format('d-m-Y');
        if ($id['wali_tanggal_lahir'] != null) {
            $tanggal_lahir_wali = Carbon::parse($id['wali_tanggal_lahir'])->format('d-m-Y');
        } else {
            $tanggal_lahir_wali = "";
        }
        // dd($id);
        $pdf = Pdf::loadView('ppdb.cetak', compact('id', 'jalur', 'jurusan1', 'jurusan2', 'jenis_kelamin', 'agama', 'kebutuhan', 'tempat_tinggal', 'transportasi', 'pendidikan_ayah', 'pekerjaan_ayah', 'pendapatan_ayah', 'pendidikan_ibu', 'pekerjaan_ibu', 'pendapatan_ibu', 'pendidikan_wali', 'pekerjaan_wali', 'pendapatan_wali', 'tanggal_lahir', 'tanggal_lahir_ayah', 'tanggal_lahir_ibu', 'tanggal_lahir_wali'));
        return $pdf->stream();
    }

    public function download(Students $id)
    {
        // dd($id);
        if ($id['jenis_kelamin'] == "L") {
            $jenis_kelamin = 'Laki-Laki';
        } else {
            $jenis_kelamin = 'Perempuan';
        }
        $tanggal_lahir = Carbon::parse($id['tanggal_lahir'])->format('d-m-Y');
        $tanggal_lahir_ayah = Carbon::parse($id['ayah_tanggal_lahir'])->format('d-m-Y');
        $tanggal_lahir_ibu = Carbon::parse($id['ibu_tanggal_lahir'])->format('d-m-Y');
        if ($id['wali_tanggal_lahir'] != null) {
            $tanggal_lahir_wali = Carbon::parse($id['wali_tanggal_lahir'])->format('d-m-Y');
        } else {
            $tanggal_lahir_wali = "";
        }

        $date = Carbon::now()->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('j F Y');

        $jalur = DB::table('options')->where('id', $id['jalur_pendaftaran_id'])->pluck('option_name');
        $jurusan1 = DB::table('options')->where('id', $id['jurusan_satu_id'])->pluck('option_name');
        $jurusan2 = DB::table('options')->where('id', $id['jurusan_dua_id'])->pluck('option_name');
        $agama = DB::table('options')->where('id', $id['agama_id'])->pluck('option_name');
        $kebutuhan = DB::table('options')->where('id', $id['kebutuhan_khusus_id'])->pluck('option_name');
        $tempat_tinggal = DB::table('options')->where('id', $id['tempat_tinggal_id'])->pluck('option_name');
        $transportasi = DB::table('options')->where('id', $id['moda_transportasi_id'])->pluck('option_name');
        $pendidikan_ayah = DB::table('options')->where('id', $id['ayah_pendidikan_id'])->pluck('option_name');
        $pekerjaan_ayah = DB::table('options')->where('id', $id['ayah_pekerjaan_id'])->pluck('option_name');
        $pendapatan_ayah = DB::table('options')->where('id', $id['ayah_penghasilan_id'])->pluck('option_name');
        $pendidikan_ibu = DB::table('options')->where('id', $id['ibu_pendidikan_id'])->pluck('option_name');
        $pekerjaan_ibu = DB::table('options')->where('id', $id['ibu_pekerjaan_id'])->pluck('option_name');
        $pendapatan_ibu = DB::table('options')->where('id', $id['ibu_penghasilan_id'])->pluck('option_name');
        $pendidikan_wali = DB::table('options')->where('id', $id['wali_pendidikan_id'])->pluck('option_name');
        $pekerjaan_wali = DB::table('options')->where('id', $id['wali_pekerjaan_id'])->pluck('option_name');
        $pendapatan_wali = DB::table('options')->where('id', $id['wali_penghasilan_id'])->pluck('option_name');

        if ($pendidikan_wali == "[]" && $pekerjaan_wali == "[]" && $pendapatan_wali == "[]") {
            $pendidikan_wali = "";
            $pekerjaan_wali = "";
            $pendapatan_wali = "";
        } else {
            $pendidikan_wali = $pendidikan_wali[0];
            $pekerjaan_wali = $pekerjaan_wali[0];
            $pendapatan_wali = $pendapatan_wali[0];
        }
        $pdf = Pdf::loadView('ppdb.cetak', compact('id', 'jalur', 'jurusan1', 'jurusan2', 'jenis_kelamin', 'agama', 'kebutuhan', 'tempat_tinggal', 'transportasi', 'pendidikan_ayah', 'pekerjaan_ayah', 'pendapatan_ayah', 'pendidikan_ibu', 'pekerjaan_ibu', 'pendapatan_ibu', 'pendidikan_wali', 'pekerjaan_wali', 'pendapatan_wali', 'tanggal_lahir', 'tanggal_lahir_ayah', 'tanggal_lahir_ibu', 'tanggal_lahir_wali'));
        return $pdf->download("Formuli Pendaftaran {$id['nama']} {$id['no_pendaftaran']}.pdf");
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
                'jenis_kelamin' => ['required', 'in:L,P'],
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
                'moda_transportasi_id' => ['required', 'numeric'],
                'no_hp' => ['required', 'numeric'],
                'no_hp_ortu' => ['required', 'numeric'],
                'email' => ['required', 'email'],
                'sktm' => ['nullable', 'numeric'],
                'kip' => ['nullable', 'numeric'],
                'kewarganegaraan' => ['required'],
                'anak_ke' => ['required', 'numeric'],
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
        $validatedData['registrasi_ulang'] = 'Tidak';

        Students::create($validatedData);
        $id = Students::latest()->first();
        return redirect()->route('siswa.download', $id);
    }
}
