<?php

namespace App\Filament\Resources\StudentsResource\Pages;

use App\Filament\Resources\StudentsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;
use pxlrbt\FilamentExcel\Actions\Pages\ExportAction;
use pxlrbt\FilamentExcel\Columns\Column;
use pxlrbt\FilamentExcel\Exports\ExcelExport;

class ManageStudents extends ManageRecords
{
    protected static string $resource = StudentsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->label('Tambah Peserta Didik'),
            ExportAction::make()->label('Export Data')->exports([
                ExcelExport::make()
                    ->withColumns([
                        Column::make('no_pendaftaran')->heading('No Pendaftaran'),
                        Column::make('jenis_pendaftaran')->formatStateUsing(fn ($state) => str_replace('M', 'Laki-Laki', $state))->heading('Jenis Pendaftaran'),
                        Column::make('JalurPendaftaran.option_name')->heading('Jalur Pendaftaran'),
                        Column::make('created_at')->heading('Tanggal Pendaftaran'),
                        Column::make('JurusanSatu.option_name')->heading('Jurusan Pertama'),
                        Column::make('JurusanDua.option_name')->heading('Jurusan Kedua'),
                        Column::make('no_ijazah')->heading('No Ijazah'),
                        Column::make('asal_sekolah')->heading('Asal Sekolah'),
                        Column::make('alamat_asal_sekolah')->heading('Alamat Asal Sekolah'),
                        Column::make('hobi')->heading('Hobi'),
                        Column::make('cita_cita')->heading('Cita-Cita'),
                        Column::make('nama')->heading('Nama Lengkap'),
                        Column::make('jenis_kelamin')->heading('Jenis Kelamin'),
                        Column::make('nik')->heading('NIK'),
                        Column::make('no_kk')->heading('NO KK'),
                        Column::make('nis')->heading('NIS'),
                        Column::make('tempat_lahir')->heading('Tempat Lahir'),
                        Column::make('tanggal_lahir')->heading('Tanggal Lahir'),
                        Column::make('Agama.option_name')->heading('Agama'),
                        Column::make('KebutuhanKhusus.option_name')->heading('Kebutuhan Khusus'),
                        Column::make('alamat')->heading('Alamat'),
                        Column::make('desa')->heading('Desa'),
                        Column::make('kecamatan')->heading('Kecamatan'),
                        Column::make('kota_kabupaten')->heading('Kota/Kabupaten'),
                        Column::make('kode_pos')->heading('Kode Pos'),
                        Column::make('TempatTinggal.option_name')->heading('Tempat Tinggal'),
                        Column::make('ModaTransportasi.option_name')->heading('Moda Transportasi'),
                        Column::make('no_hp')->heading('Nomor HP'),
                        Column::make('email')->heading('Email'),
                        Column::make('sktm')->heading('SKTM'),
                        Column::make('kip')->heading('KIP'),
                        Column::make('kewarganegaraan')->heading('Kewarganegaraan'),
                        Column::make('nama_ayah')->heading('Nama Ayah'),
                        Column::make('nik_ayah')->heading('NIK Ayah'),
                        Column::make('ayah_tanggal_lahir')->heading('Tanggal Lahir Ayah'),
                        Column::make('AyahPendidikan.option_name')->heading('Pendidikan Ayah'),
                        Column::make('AyahPekerjaan.option_name')->heading('Pekerjaan Ayah'),
                        Column::make('AyahPenghasilan.option_name')->heading('Penghasilan Ayah'),
                        Column::make('nama_ibu')->heading('Nama Ibu'),
                        Column::make('nik_ibu')->heading('NIK Ibu'),
                        Column::make('ibu_tanggal_lahir')->heading('Tanggal Lahir Ibu'),
                        Column::make('IbuPendidikan.option_name')->heading('Pendidikan Ibu'),
                        Column::make('IbuPekerjaan.option_name')->heading('Pekerjaan Ibu'),
                        Column::make('IbuPenghasilan.option_name')->heading('Penghasilan Ibu'),
                        Column::make('nama_wali')->heading('Nama Wali'),
                        Column::make('nik_wali')->heading('NIK Wali'),
                        Column::make('wali_tanggal_lahir')->heading('Tanggal Lahir Wali'),
                        Column::make('WaliPendidikan.option_name')->heading('Pendidikan Wali'),
                        Column::make('WaliPekerjaan.option_name')->heading('Pekerjaan Wali'),
                        Column::make('WaliPenghasilan.option_name')->heading('Penghasilan Wali'),
                        Column::make('tinggi_badan')->heading('Tinggi Badan'),
                        Column::make('berat_badan')->heading('Berat Badan'),
                        Column::make('lingkar_kepala')->heading('Lingkar Kepala'),
                        Column::make('jarak_tempat_tinggal')->heading('Jarak Tempat Tinggal'),
                        Column::make('waktu_tempuh_sekolah')->heading('Waktu Tempu Ke-Sekolah'),
                        Column::make('jumlah_saudara_kandung')->heading('Jumlah Saudara Kandung'),
                    ])
                    ->withFilename('Data Siswa')
            ])
        ];
    }
}
