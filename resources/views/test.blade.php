<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar PPDB</title>
</head>

<body>
    {{-- @dd($jalur) --}}
    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <p>Registrati Peserta Didik</p>
        <label for="jenis_pendaftaran">Jenis Pendaftaran</label>
        <select name="jenis_pendaftaran" id="jenis_pendaftaran">
            <option value="true">Baru</option>
            <option value="false">Pindahan</option>
        </select><br>
        <label for="jalur_pendaftaran">Jalur Pendaftaran</label>
        <select name="jalur_pendaftaran_id" id="jalur_pendaftaran">
            @foreach ($jalur as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select><br>
        <label for="asal_sekolah">Asal Sekolah</label>
        <input type="text" name="asal_sekolah" id="asal_sekolah"><br>
        <label for="alamat_asal_sekolah">Alamat Asal Sekolah</label>
        <input type="text" name="alamat_asal_sekolah" id="alamat_asal_sekolah"><br>
        <label for="hobi">Hobi</label>
        <input type="text" name="hobi" id="hobi"><br>
        <label for="cita_cita">Cita-Cita</label>
        <input type="text" name="cita_cita" id="cita_cita"><br>

        <p>Data Diri</p>
        <label for="nama">Nama Lengkap</label>
        <input type="text" name="nama" id="nama"><br>
        <label for="jenis_kelamin">Jenis Kelamin</label>
        <select name="jenis_kelamin" id="jenis_kelamin">
            <option value="M">Laki-Laki</option>
            <option value="F">Perempuan</option>
        </select><br>
        <label for="nik">NIK</label>
        <input type="text" name="nik" id="nik"><br>
        <label for="nis">NIS</label>
        <input type="text" name="nis" id="nis"><br>
        <label for="nisn">NISN</label>
        <input type="text" name="nisn" id="nisn"><br>
        <label for="agama">Agama</label>
        <select name="agama_id" id="agama">
            @foreach ($agama as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select><br>
        <label for="transpotasi">Kebutuhan Khusus</label>
        <select name="kebutuhan_khusus_id" id="kebutuhan_khusus">
            @foreach ($kebutuhan as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select><br>
        <label for="tmpt_lahir">Tempat Lahir</label>
        <input type="text" name="tempat_lahir" id="tmpt_lahir"><br>
        <label for="tgl_lahir">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" id="tgl_lahir"><br>
        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" id="alamat"><br>
        <label for="desa">Desa</label>
        <input type="text" name="desa" id="desa"><br>
        <label for="kecamatan">Kecamatan</label>
        <input type="text" name="kecamatan" id="kecamatan"><br>
        <label for="alamat">Kota/Kabupaten</label>
        <input type="text" name="kota_kabupaten" id="kota_kabupaten"><br>
        <label for="kode_pos">Kode Pos</label>
        <input type="text" name="kode_pos" id="kode_pos"><br>
        <label for="tempat_tinggal">Tinggal Bersama</label>
        <select name="tempat_tinggal_id" id="tempat_tinggal">
            @foreach ($tempat_tinggal as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select><br>
        <label for="transpotasi">Moda Transpotasi</label>
        <select name="moda_transpotasi_id" id="transpotasi">
            @foreach ($transpotasi as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select><br>
        <label for="no_hp">Nomor HP</label>
        <input type="tel" name="no_hp" id="no_hp"><br>
        <label for="email">Email</label>
        <input type="email" name="email" id="email"><br>
        <label for="sktm">SKTM (Jika Ada)</label>
        <input type="tel" name="sktm" id="sktm"><br>
        <label for="kip">KIP (Jika Ada)</label>
        <input type="kip" name="kip" id="kip"><br>
        <label for="kewarganegaraan">Kewarganegaraan</label>
        <select name="kewarganegaraan" id="kewarganegaraan">
            <option value="WNI">WNI</option>
            <option value="WNA">WNA</option>
        </select>
        <br>
        <p>Data Orang Tua/Wali</p>
        <label for="nama_ayah">Nama Ayah</label>
        <input type="text" name="nama_ayah" id="nama_ayah"><br>
        <label for="ayah_tanggal_lahir">Tanggal Lahir</label>
        <input type="date" name="ayah_tanggal_lahir" id="ayah_tanggal_lahir"><br>
        <label for="ayah_pendidikan">Pendidikan Terakhir</label>
        <select name="ayah_pendidikan_id" id="ayah_pendidikan">
            @foreach ($pendidikan as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select><br>
        <label for="ayah_pekerjaan">Pekerjaan</label>
        <select name="ayah_pekerjaan_id" id="ayah_pekerjaan">
            @foreach ($pekerjaan as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select><br>
        <label for="ayah_penghasilan">Penghasilan</label>
        <select name="ayah_penghasilan_id" id="ayah_penghasilan">
            <option value="" hidden selected>Pilih Penghasilan</option>
            @foreach ($pendapatan as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select><br>
        <label for="nama_ibu">Nama Ibu</label>
        <input type="text" name="nama_ibu" id="nama_ibu"><br>
        <label for="ibu_tanggal_lahir">Tanggal Lahir</label>
        <input type="date" name="ibu_tanggal_lahir" id="ibu_tanggal_lahir"><br>
        <label for="ibu_pendidikan">Pendidikan Terakhir</label>
        <select name="ibu_pendidikan_id" id="ibu_pendidikan">
            @foreach ($pendidikan as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select><br>
        <label for="ibu_pekerjaan">Pekerjaan</label>
        <select name="ibu_pekerjaan_id" id="ibu_pekerjaan">
            @foreach ($pekerjaan as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select><br>
        <label for="ibu_penghasilan">Penghasilan</label>
        <select name="ibu_penghasilan_id" id="ibu_penghasilan">
            <option value="" hidden selected>Pilih Penghasilan</option>
            @foreach ($pendapatan as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select><br>
        <p>(Opsional)</p>
        <label for="nama_wali">Nama Wali</label>
        <input type="text" name="nama_wali" id="nama_wali"><br>
        <label for="wali_tanggal_lahir">Tanggal Lahir</label>
        <input type="date" name="wali_tanggal_lahir" id="wali_tanggal_lahir"><br>
        <label for="wali_pendidikan">Pendidikan Terakhir</label>
        <select name="wali_pendidikan_id" id="wali_pendidikan">
            <option value="" hidden selected>Pilih Pendidikan</option>
            @foreach ($pendidikan as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select><br>
        <label for="wali_pekerjaan">Pekerjaan</label>
        <select name="wali_pekerjaan_id" id="wali_pekerjaan">
            <option value="" hidden selected>Pilih Pekerjaan</option>
            @foreach ($pekerjaan as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select><br>
        <label for="wali_penghasilan">Penghasilan</label>
        <select name="wali_penghasilan_id" id="wali_penghasilan">
            <option value="" hidden selected>Pilih Penghasilan</option>
            @foreach ($pendapatan as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select><br>

        <p>Data Periodik</p>
        <label for="tinggi_badan">Tinggi Badan</label>
        <input type="number" name="tinggi_badan" id="tinggi_badan"><br>
        <label for="berat_badan">Beran Badan</label>
        <input type="number" name="berat_badan" id="berat_badan"><br>
        <label for="jarak">Jarak Tempat Tinggal</label>
        <input type="number" name="jarak_tempat_tinggal" id="jarak"><br>
        <label for="waktu">Waktu Tempuh Ke-sekolah</label>
        <input type="number" name="waktu_tempuh_sekolah" id="waktu"><br>
        <label for="saudara">Jumlah Saudara Kandung</label>
        <input type="number" name="jumlah_saudara_kandung" id="saudara"><br>
        <button type="submit">Submit</button>
    </form>
</body>

</html>
