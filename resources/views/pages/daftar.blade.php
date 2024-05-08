<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $_ENV['APP_NAME'] }}</title>
    <link rel="stylesheet" href="{{ asset('build/assets/app-Dvj3ZyXu.css') }}">
    {{-- @vite('resources/css/app.css') --}}
</head>

<body class="bg-gray-100 p-2">
    <div class="max-w-screen-2xl md:max-w-screen-xl sm:max-w-screen-sm mx-auto bg-white p-6  shadow-md">
        <div class="px-8 mb-4">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="bg-red-500 text-white font-bold px-4 py-2">
                    Terjadi Kesalahan...
                </div>
                <ul class="border border-t-0 border-red-400 bg-red-100 px-4 py-2 text-red-700">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <p class="text-lg font-bold mb-4">Registrati Peserta Didik</p>

                <div class="flex items-center mb-4">
                    <label for="jenis_pendaftaran" class="w-2/4 pr-2">Jenis Pendaftaran <span
                            class="text-red-700">*</span></label>
                    <select name="jenis_pendaftaran" id="jenis_pendaftaran" class="w-2/3 p-2 border " required>
                        <option value="Baru" {{ old('jenis_pendaftaran') == 'true' ? 'selected' : '' }}>Baru</option>
                        <option value="Pindahan"{{ old('jenis_pendaftaran') == 'false' ? 'selected' : '' }}>Pindahan
                        </option>
                    </select>
                </div>
                <div class="flex items-center mb-4">
                    <label for="jalur_pendaftaran" class="w-2/4 pr-2">Jalur Pendaftaran <span
                            class="text-red-700">*</span></label>
                    <select name="jalur_pendaftaran_id" id="jalur_pendaftaran" class="w-2/3 p-2 border " required>
                        @foreach ($jalur as $key => $value)
                            <option
                                value="{{ $key }} "{{ old('jalur_pendaftaran_id') == $key ? 'selected' : '' }}>
                                {{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-center mb-4">
                    <label for="jurusan_1" class="w-2/4 pr-2">Jurusan Pertama<span class="text-red-700">*</span></label>
                    <select name="jurusan_satu_id" id="jurusan_1" class="w-2/3 p-2 border " required>
                        @foreach ($jurusan as $key => $value)
                            <option value="{{ $key }}"
                                {{ old('jurusan_satu_id') == $key ? 'selected' : '' }}>
                                {{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-center mb-4">
                    <label for="jurusan_2" class="w-2/4 pr-2">Jurusan Kedua<span class="text-red-700">*</span></label>
                    <select name="jurusan_dua_id" id="jurusan_2" class="w-2/3 p-2 border " required>
                        @foreach ($jurusan as $key => $value)
                            <option value="{{ $key }}" {{ old('jurusan_dua_id') == $key ? 'selected' : '' }}>
                                {{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-center mb-4">
                    <label for="asal_sekolah" class="w-2/4 pr-2">Asal Sekolah</label>
                    <input type="text" name="asal_sekolah" id="asal_sekolah" class="w-2/3 p-2 border "
                        value="{{ old('asal_sekolah') }}">
                </div>
                <div class="flex items-center mb-4">
                    <label for="alamat_asal_sekolah" class="w-2/4 pr-2">Alamat Asal Sekolah</label>
                    <input type="text" name="alamat_asal_sekolah" id="alamat_asal_sekolah" class="w-2/3 p-2 border "
                        value=" {{ old('alamat_asal_sekolah') }}">
                </div>
                <div class="flex items-center mb-4">
                    <label for="hobi" class="w-2/4 pr-2">Hobi</label>
                    <input type="text" name="hobi" id="hobi" class="w-2/3 p-2 border"
                        value="{{ old('hobi') }}">
                </div>
                <div class="flex items-center mb-4">
                    <label for="cita_cita" class="w-2/4 pr-2">Cita-Cita</label>
                    <input type="text" name="cita_cita" id="cita_cita" class="w-2/3 p-2 border "
                        value="{{ old('cita_cita') }}">
                </div>
            </div>

            <p class="text-lg font-bold mb-4">Data Diri</p>
            <div class="flex items-center mb-4">
                <label for="nama" class="w-2/4 pr-2">Nama Lengkap <span class="text-red-700">*</span></label>
                <input type="text" name="nama" id="nama" class="w-2/3 p-2 border"
                    value="{{ old('nama') }}" required>
            </div>
            <div class="flex items-center mb-4">
                <label for="jenis_kelamin" class="w-2/4 pr-2">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="w-2/3 p-2 border ">
                    <option value="L" {{ old('jenis_kelamin') == 'M' ? 'selected' : '' }}>Laki-Laki</option>
                    <option value="P" {{ old('jenis_kelamin') == 'F' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
            <div class="flex items-center mb-4">
                <label for="nik" class="w-2/4 pr-2">NIK <span class="text-red-700">*</span></label>
                <input type="text" name="nik" id="nik" class="w-2/3 p-2 border " maxlength="16"
                    value="{{ old('nik') }}" required>
            </div>
            <div class="flex items-center mb-4">
                <label for="no_kk" class="w-2/4 pr-2">Nomor KK <span class="text-red-700">*</span></label>
                <input type="text" name="no_kk" id="no_kk" class="w-2/3 p-2 border " maxlength="16"
                    value="{{ old('no_kk') }}" required>
            </div>
            <div class="flex items-center mb-4">
                <label for="nis" class="w-2/4 pr-2">NIS <span class="text-red-700">*</span></label>
                <input type="text" name="nis" id="nis" class="w-2/3 p-2 border " maxlength="10"
                    value="{{ old('nis') }}" required>
            </div>
            <div class="flex items-center mb-4">
                <label for="nisn" class="w-2/4 pr-2">NISN <span class="text-red-700">*</span></label>
                <input type="text" name="nisn" id="nisn" class="w-2/3 p-2 border " maxlength="10"
                    value="{{ old('nisn') }}" required>
            </div>
            <div class="flex items-center mb-4">
                <label for="agama" class="w-2/4 pr-2">Agama</label>
                <select name="agama_id" id="agama" class="w-2/3 p-2 border ">
                    @foreach ($agama as $key => $value)
                        <option value="{{ $key }}" {{ old('agama_id') == $key ? 'selected' : '' }}>
                            {{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-center mb-4">
                <label for="kebutuhan_khusus" class="w-2/4 pr-2">Kebutuhan Khusus <span
                        class="text-red-700">*</span></label>
                <select name="kebutuhan_khusus_id" id="kebutuhan_khusus" class="w-2/3 p-2 border " required>
                    @foreach ($kebutuhan as $key => $value)
                        <option
                            value="{{ $key }}"{{ old('kebutuhan_khusus_id') == $key ? 'selected' : '' }}>
                            {{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-center mb-4">
                <label for="tmpt_lahir" class="w-2/4 pr-2">Tempat Lahir <span class="text-red-700">*</span></label>
                <input type="text" name="tempat_lahir" id="tmpt_lahir" class="w-2/3 p-2 border "
                    value="{{ old('tempat_lahir') }}" required>
            </div>
            <div class="flex items-center mb-4">
                <label for="tgl_lahir" class="w-2/4 pr-2">Tanggal Lahir <span class="text-red-700">*</span></label>
                <input type="date" name="tanggal_lahir" id="tgl_lahir" class="w-2/3 p-2 border "
                    value="{{ old('tanggal_lahir') }}" required>
            </div>
            <div class="flex items-center mb-4">
                <label for="alamat" class="w-2/4 pr-2">Alamat <span class="text-red-700">*</span></label>
                <input type="text" name="alamat" id="alamat" class="w-2/3 p-2 border "
                    value="{{ old('alamat') }}" required>
            </div>
            <div class="flex items-center mb-4">
                <label for="desa" class="w-2/4 pr-2">Desa <span class="text-red-700">*</span></label>
                <input type="text" name="desa" id="desa" class="w-2/3 p-2 border "
                    value="{{ old('desa') }}" required>
            </div>
            <div class="flex items-center mb-4">
                <label for="kecamatan" class="w-2/4 pr-2">Kecamatan <span class="text-red-700">*</span></label>
                <input type="text" name="kecamatan" id="kecamatan"
                    class="w-2/3 p-2 border "value="{{ old('kecamatan') }}" required>
            </div>
            <div class="flex items-center mb-4">
                <label for="kota_kabupaten" class="w-2/4 pr-2">Kota/Kabupaten <span
                        class="text-red-700">*</span></label>
                <input type="text" name="kota_kabupaten" id="kota_kabupaten"
                    class="w-2/3 p-2 border "value="{{ old('kota_kabupaten') }}" required>
            </div>
            <div class="flex items-center mb-4">
                <label for="kode_pos" class="w-2/4 pr-2">Kode Pos <span class="text-red-700">*</span></label>
                <input type="text" name="kode_pos" id="kode_pos"
                    class="w-2/3 p-2 border "value="{{ old('kode_pos') }}" maxlength="5" required>
            </div>
            <div class="flex items-center mb-4">
                <label for="tempat_tinggal" class="w-2/4 pr-2">Tinggal Bersama <span
                        class="text-red-700">*</span></label>
                <select name="tempat_tinggal_id" id="tempat_tinggal" class="w-2/3 p-2 border " required>
                    @foreach ($tempat_tinggal as $key => $value)
                        <option value="{{ $key }}"
                            value="{{ old('tempat_tinggal_id') == $key ? 'selected' : '' }}">{{ $value }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-center mb-4">
                <label for="transportasi" class="w-2/4 pr-2">Moda Transpotasi <span
                        class="text-red-700">*</span></label>
                <select name="moda_transportasi_id" id="transportasi" class="w-2/3 p-2 border " required>
                    @foreach ($transpotasi as $key => $value)
                        <option value="{{ $key }}"
                            value="{{ old('moda_transportasi_id') == $key ? 'selected' : '' }}">{{ $value }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-center mb-4">
                <label for="no_hp" class="w-2/4 pr-2">Nomor HP <span class="text-red-700">*</span></label>
                <input type="tel" name="no_hp" id="no_hp" class="w-2/3 p-2 border "
                    value="{{ old('no_hp') }}" maxlength="13" required>
            </div>
            <div class="flex items-center mb-4">
                <label for="no_hp_ortu" class="w-2/4 pr-2">Nomor HP Orang Tua/Wali <span
                        class="text-red-700">*</span></label>
                <input type="tel" name="no_hp_ortu" id="no_hp_ortu" class="w-2/3 p-2 border "
                    value="{{ old('no_hp_ortu') }}" maxlength="13" required>
            </div>
            <div class="flex items-center mb-4">
                <label for="email" class="w-2/4 pr-2">Email <span class="text-red-700">*</span></label>
                <input type="email" name="email" id="email" class="w-2/3 p-2 border "
                    value="{{ old('email') }}" required>
            </div>
            <div class="flex items-center mb-4">
                <label for="sktm" class="w-2/4 pr-2">SKTM (Jika Ada)</label>
                <input type="text" name="sktm" id="sktm" class="w-2/3 p-2 border "
                    value="{{ old('sktm') }}">
            </div>
            <div class="flex items-center mb-4">
                <label for="kip" class="w-2/4 pr-2">KIP (Jika Ada)</label>
                <input type="text" name="kip" id="kip" class="w-2/3 p-2 border "
                    value="{{ old('kip') }}">
            </div>
            <div class="flex items-center mb-4">
                <label for="anak_ke" class="w-2/4 pr-2">Anak Ke- <span class="text-red-700">*</span></label>
                <input type="text" name="anak_ke" id="anak_ke" class="w-2/3 p-2 border "
                    value="{{ old('anak_ke') }}">
            </div>
            <div class="flex items-center mb-4">
                <label for="kewarganegaraan" class="w-2/4 pr-2">Kewarganegaraan <span
                        class="text-red-700">*</span></label>
                <select name="kewarganegaraan" id="kewarganegaraan" class="w-2/3 p-2 border " required>
                    <option value="WNI" {{ old('kewarganegaraan') == 'WNI' ? 'selected' : '' }}>WNI</option>
                    <option value="WNA" {{ old('kewarganegaraan') == 'WNA' ? 'selected' : '' }}>WNA</option>
                </select>
            </div>


            <p class="text-lg font-bold mb-4">Data Orang Tua/Wali</p>
            <div class="flex items-center mb-4">
                <label for="nama_ayah" class="w-2/4 pr-2">Nama Ayah <span class="text-red-700">*</span></label>
                <input type="text" name="nama_ayah" id="nama_ayah" class="w-2/3 p-2 border "
                    value="{{ old('nama_ayah') }}" required>
            </div>
            <div class="flex items-center mb-4">
                <label for="nik_ayah" class="w-2/4 pr-2">NIK </label>
                <input type="text" name="nik_ayah" id="nik_ayah" class="w-2/3 p-2 border " maxlength="16"
                    value="{{ old('nik_ayah') }}">
            </div>
            <div class="flex items-center mb-4">
                <label for="alamat_ayah" class="w-2/4 pr-2">Alamat Ayah</label>
                <input type="text" name="alamat_ayah" id="alamat_ayah" class="w-2/3 p-2 border "
                    value="{{ old('alamat_ayah') }}">
            </div>
            <div class="flex items-center mb-4">
                <label for="ayah_tanggal_lahir" class="w-2/4 pr-2">Tanggal Lahir</label>
                <input type="date" name="ayah_tanggal_lahir" id="ayah_tanggal_lahir" class="w-2/3 p-2 border "
                    value="{{ old('ayah_tanggal_lahir') }}">
            </div>
            <div class="flex items-center mb-4">
                <label for="ayah_pendidikan" class="w-2/4 pr-2">Pendidikan Terakhir</label>
                <select name="ayah_pendidikan_id" id="ayah_pendidikan" class="w-2/3 p-2 border ">
                    @foreach ($pendidikan as $key => $value)
                        <option value="{{ $key }}"
                            {{ old('ayah_pendidikan_id') == $key ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-center mb-4">
                <label for="ayah_pekerjaan" class="w-2/4 pr-2">Pekerjaan</label>
                <select name="ayah_pekerjaan_id" id="ayah_pekerjaan" class="w-2/3 p-2 border ">
                    @foreach ($pekerjaan as $key => $value)
                        <option value="{{ $key }}"
                            {{ old('ayah_pekerjaan_id') == $key ? 'selected' : ' ' }}>
                            {{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-center mb-4">
                <label for="ayah_penghasilan" class="w-2/4 pr-2">Penghasilan</label>
                <select name="ayah_penghasilan_id" id="ayah_penghasilan" class="w-2/3 p-2 border ">
                    <option value="" hidden selected>Pilih Penghasilan</option>
                    @foreach ($pendapatan as $key => $value)
                        <option value="{{ $key }}"
                            {{ old('ayah_penghasilan_id') == $key ? 'selected' : ' ' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-center mb-4">
                <label for="nama_ibu" class="w-2/4 pr-2">Nama Ibu <span class="text-red-700">*</span></label>
                <input type="text" name="nama_ibu" id="nama_ibu" class="w-2/3 p-2 border "
                    value="{{ old('nama_ibu') }}" required>
            </div>
            <div class="flex items-center mb-4">
                <label for="nik_ibu" class="w-2/4 pr-2">NIK</label>
                <input type="text" name="nik_ibu" id="nik_ibu" class="w-2/3 p-2 border " maxlength="16"
                    value="{{ old('nik_ibu') }}">
            </div>
            <div class="flex items-center mb-4">
                <label for="alamat_ibu" class="w-2/4 pr-2">Alamat Ibu</label>
                <input type="text" name="alamat_ibu" id="alamat_ibu" class="w-2/3 p-2 border "
                    value="{{ old('alamat_ibu') }}">
            </div>
            <div class="flex items-center mb-4">
                <label for="ibu_tanggal_lahir" class="w-2/4 pr-2">Tanggal Lahir</label>
                <input type="date" name="ibu_tanggal_lahir" id="ibu_tanggal_lahir" class="w-2/3 p-2 border "
                    value="{{ old('ibu_tanggal_lahir') }}">
            </div>
            <div class="flex items-center mb-4">
                <label for="ibu_pendidikan" class="w-2/4 pr-2">Pendidikan Terakhir</label>
                <select name="ibu_pendidikan_id" id="ibu_pendidikan" class="w-2/3 p-2 border ">
                    @foreach ($pendidikan as $key => $value)
                        <option value="{{ $key }}"
                            {{ old('ibu_pendidikan_id') == $key ? 'selected' : ' ' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-center mb-4">
                <label for="ibu_pekerjaan" class="w-2/4 pr-2">Pekerjaan</label>
                <select name="ibu_pekerjaan_id" id="ibu_pekerjaan" class="w-2/3 p-2 border ">
                    @foreach ($pekerjaan as $key => $value)
                        <option value="{{ $key }}" {{ old('ibu_pekerjaan_id') == $key ? 'selected' : ' ' }}>
                            {{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-center mb-4">
                <label for="ibu_penghasilan" class="w-2/4 pr-2">Penghasilan</label>
                <select name="ibu_penghasilan_id" id="ibu_penghasilan" class="w-2/3 p-2 border ">
                    <option value="" hidden selected>Pilih Penghasilan</option>
                    @foreach ($pendapatan as $key => $value)
                        <option value="{{ $key }}"
                            {{ old('ibu_penghasilan_id') == $key ? 'selected' : ' ' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <p class="text-lg font-bold mb-4">(Opsional)</p>

            <div class="flex items-center mb-4">
                <label for="nama_wali" class="w-2/4 pr-2">Nama Wali</label>
                <input type="text" name="nama_wali" id="nama_wali" class="w-2/3 p-2 border "
                    value="{{ old('nama_wali') }}">
            </div>
            <div class="flex items-center mb-4">
                <label for="nik_wali" class="w-2/4 pr-2">NIK</label>
                <input type="text" name="nik_wali" id="nik_wali" class="w-2/3 p-2 border " maxlength="16"
                    value="{{ old('nik_wali') }}">
            </div>
            <div class="flex items-center mb-4">
                <label for="alamat_wali" class="w-2/4 pr-2">Alamat Wali</label>
                <input type="text" name="alamat_wali" id="alamat_wali" class="w-2/3 p-2 border "
                    value="{{ old('alamat_wali') }}">
            </div>
            <div class="flex items-center mb-4">
                <label for="wali_tanggal_lahir" class="w-2/4 pr-2">Tanggal Lahir</label>
                <input type="date" name="wali_tanggal_lahir" id="wali_tanggal_lahir" class="w-2/3 p-2 border "
                    value="{{ old('wali_tanggal_lahir') }}">
            </div>
            <div class="flex items-center mb-4">
                <label for="wali_pendidikan" class="w-2/4 pr-2">Pendidikan Terakhir</label>
                <select name="wali_pendidikan_id" id="wali_pendidikan" class="w-2/3 p-2 border ">
                    <option value="" hidden selected>Pilih Pendidikan</option>
                    @foreach ($pendidikan as $key => $value)
                        <option value="{{ $key }}"
                            {{ old('wali_pendidikan_id') == $key ? 'selected' : ' ' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-center mb-4">
                <label for="wali_pekerjaan" class="w-2/4 pr-2">Pekerjaan</label>
                <select name="wali_pekerjaan_id" id="wali_pekerjaan" class="w-2/3 p-2 border ">
                    <option value="" hidden selected>Pilih Pekerjaan</option>
                    @foreach ($pekerjaan as $key => $value)
                        <option value="{{ $key }}"
                            {{ old('wali_pekerjaan_id') == $key ? 'selected' : ' ' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-center mb-4">
                <label for="wali_penghasilan" class="w-2/4 pr-2">Penghasilan</label>
                <select name="wali_penghasilan_id" id="wali_penghasilan" class="w-2/3 p-2 border ">
                    <option value="" hidden selected>Pilih Penghasilan</option>
                    @foreach ($pendapatan as $key => $value)
                        <option value="{{ $key }}"
                            {{ old('wali_pendapatan_id') == $key ? 'selected' : ' ' }}>{{ $value }}</option>
                    @endforeach
                </select>

            </div>
            <p class="text-lg font-bold mb-4">Data Periodik</p>
            <div class="flex items-center mb-4">
                <label for="tinggi_badan" class="w-2/4 pr-2">Tinggi Badan (Cm)</label>
                <input type="number" name="tinggi_badan" id="tinggi_badan"
                    class="w-2/3 p-2 border "value="{{ old('tinggi_badan') }}">
            </div>
            <div class="flex items-center mb-4">
                <label for="berat_badan" class="w-2/4 pr-2">Beran Badan (Kg)</label>
                <input type="number" name="berat_badan" id="berat_badan"
                    class="w-2/3 p-2 border "value="{{ old('berat_badan') }}">
            </div>
            <div class="flex items-center mb-4">
                <label for="lingkar_kepala" class="w-2/4 pr-2">Lingkar Kepala (Cm)</label>
                <input type="number" name="lingkar_kepala" id="lingkar_kepala"
                    class="w-2/3 p-2 border "value="{{ old('lingkar_kepala') }}">
            </div>
            <div class="flex items-center mb-4">
                <label for="jarak" class="w-2/4 pr-2">Jarak Tempat Tinggal (Km)</label>
                <input type="number" name="jarak_tempat_tinggal" id="jarak"
                    class="w-2/3 p-2 border "value="{{ old('jarak_tempat_tinggal') }}">
            </div>
            <div class="flex items-center mb-4">
                <label for="waktu" class="w-2/4 pr-2">Waktu Tempuh Ke-sekolah (Menit)</label>
                <input type="number" name="waktu_tempuh_sekolah" id="waktu"
                    class="w-2/3 p-2 border "value="{{ old('waktu_tempuh_sekolah') }}">
            </div>
            <div class="flex items-center mb-4">
                <label for="saudara" class="w-2/4 pr-2">Jumlah Saudara Kandung</label>
                <input type="number" name="jumlah_saudara_kandung" id="saudara"
                    class="w-2/3 p-2 border "value="{{ old('jumlah_saudara_kandung') }}">
            </div>
            <p class="text-lg font-bold mb-4">Pertanyaan Keamanan</p>
            <div class="flex items-center mb-4">
                <label for="keamanan" class="w-2/4 pr-2">Pertanyaan <span class="text-red-700">*</span></label>
                <div class="flex w-2/3">
                    <input type="checkbox" name="keamanan" id="keamanan" class="mr-2" required>
                    <span>Saya menyatakan dengan sesungguhnya bahwa isian data dalam formulir ini adalah benar. Apabila
                        ternyata data tersebut tidak benar / palsu, maka saya bersedia menerima sanksi sesuai ketentuan
                        yang berlaku di SMK Negeri 1 Sebulu</span>
                </div>
            </div>

            <div class="flex justify-center mt-6">
                <button type="submit" class="bg-blue-700 text-white text-lg px-4 py-2  hover:bg-blue-600">Kirim
                    Formulir
                    Pendaftaran</button>
            </div>
        </form>
    </div>
</body>

</html>
