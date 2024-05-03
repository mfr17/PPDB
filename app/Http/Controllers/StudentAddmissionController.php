<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\Temp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentAddmissionController extends Controller
{
    public function create()
    {

        $jalur = DB::table('options')->where('option_group', 'admission_types')->pluck('option_name', 'id');
        $agama = DB::table('options')->where('option_group', 'religions')->pluck('option_name', 'id');
        $kebutuhan = DB::table('options')->where('option_group', 'special_needs')->pluck('option_name', 'id');
        $pendidikan = DB::table('options')->where('option_group', 'educations')->pluck('option_name', 'id');
        $pekerjaan = DB::table('options')->where('option_group', 'employments')->pluck('option_name', 'id');
        $pendapatan = DB::table('options')->where('option_group', 'monthly_incomes')->pluck('option_name', 'id');
        $tempat_tinggal = DB::table('options')->where('option_group', 'residences')->pluck('option_name', 'id');
        $transportasi = DB::table('options')->where('option_group', 'transportations')->pluck('option_name', 'id');


        $options = [
            'jalur' => $jalur,
            'agama' => $agama,
            'kebutuhan' => $kebutuhan,
            'pendidikan' => $pendidikan,
            'pekerjaan' => $pekerjaan,
            'pendapatan' => $pendapatan,
            'tempat_tinggal' => $tempat_tinggal,
            'transpotasi' => $transportasi,
        ];
        return view('test', $options);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'jenis_pendaftaran' => ['required'],
            'jalur_pendaftaran_id' => ['required', 'numeric'],
            'hobi' => ['required', 'string', 'max:255'],
            'cita_cita' => ['required', 'string', 'max:255'],
            'asal_sekolah' => ['required', 'string', 'max:255'],
            'alamat_asal_sekolah' => ['required', 'string', 'max:255'],
            'nama' => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required', 'in:M,F'],
            'nik' => ['required', 'numeric', 'unique:students'],
            'nis' => ['required', 'numeric',],
            'nisn' => ['required', 'numeric',],
            'agama_id' => ['required'],
            'kegbutuhan_khusus_id' => ['required'],
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
            'ayah_tanggal_lahir' => ['required', 'date'],
            'ayah_pendidikan_id' => ['required', 'numeric'],
            'ayah_pekerjaan_id' => ['required', 'numeric'],
            'ayah_penghasilan_id' => ['required', 'numeric'],
            'nama_ibu' => ['required', 'string', 'max:255'],
            'ibu_tanggal_lahir' => ['required', 'date'],
            'ibu_pendidikan_id' => ['required', 'numeric'],
            'ibu_pekerjaan_id' => ['required', 'numeric'],
            'ibu_penghasilan_id' => ['required', 'numeric'],
            'nama_wali' => ['nullable', 'string', 'max:255'],
            'wali_tanggal_lahir' => ['nullable', 'date'],
            'wali_pendidikan_id' => ['nullable', 'numeric'],
            'wali_pekerjaan_id' => ['nullable', 'numeric'],
            'wali_penghasilan_id' => ['nullable', 'numeric'],
            'tinggi_badan' => ['required', 'numeric'],
            'berat_badan' => ['required', 'numeric'],
            'jarak_tempat_tinggal' => ['required', 'numeric'],
            'waktu_tempuh_sekolah' => ['required', 'numeric'],
            'jumlah_saudara_kandung' => ['required', 'numeric'],
        ]);

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
        dd($validatedData);

        Students::create($validatedData);
    }
}
