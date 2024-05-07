<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentsResource\Pages;
use App\Filament\Resources\StudentsResource\RelationManagers;
use App\Models\Students;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class StudentsResource extends Resource
{
    protected static ?int $navigationSort = 1;
    protected static ?string $model = Students::class;
    protected static ?string $slug = 'calon-peserta-didik';
    protected static ?string $navigationLabel = 'Calon Peserta Didik';
    protected static ?string $pluralModelLabel = 'Calon Peserta Didik';
    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Registrasi Peserta Didik')
                    ->schema([
                        Select::make('jenis_pendaftaran')
                            ->label('Jenis Pendaftaran')
                            ->options([
                                'Baru' => 'Baru',
                                'Pindahan' => 'Pindahan'
                            ])
                            ->required(),
                        Select::make('jalur_pendaftaran_id')
                            ->label('Jalur Pendaftaran')
                            ->relationship(name: 'JalurPendaftaran', titleAttribute: 'option_name', modifyQueryUsing: fn (Builder $query) => $query->where('option_group', 'admission_types')->orderBy('id'))
                            ->required(),
                        Select::make('jurusan_satu_id')
                            ->label('Jurusan Pertama')
                            ->relationship(name: 'JurusanSatu', titleAttribute: 'option_name', modifyQueryUsing: fn (Builder $query) => $query->where('option_group', 'school_major')->orderBy('id'))
                            ->required(),
                        Select::make('jurusan_dua_id')
                            ->label('Jurusan Kedua')
                            ->relationship(name: 'JurusanDua', titleAttribute: 'option_name', modifyQueryUsing: fn (Builder $query) => $query->where('option_group', 'school_major')->orderBy('id'))
                            ->required(),
                        TextInput::make('no_ijazah')
                            ->label('No Ijazah')
                            ->maxLength(24),
                        TextInput::make('asal_sekolah')
                            ->label('Asal Sekolah'),
                        TextInput::make('alamat_asal_sekolah')
                            ->label('Alamat Asal Sekolah'),
                        TextInput::make('hobi')
                            ->label('Hobi'),
                        TextInput::make('cita_cita')
                            ->label('Cita Cita'),
                    ]),
                Fieldset::make('Data Diri')
                    ->schema([
                        TextInput::make('nama')
                            ->label('Nama Lengkap')
                            ->required(),
                        Select::make('jenis_kelamin')
                            ->label('Jenis Kelamin')
                            ->options([
                                'L' => 'Laki-Laki',
                                'P' => 'Perempuan'
                            ])
                            ->required(),
                        TextInput::make('nik')
                            ->label('NIK')
                            ->unique(table: Students::class, ignoreRecord: true)
                            ->required()
                            ->maxLength(16),
                        TextInput::make('nis')
                            ->label('NIS')
                            ->required()
                            ->maxLength(10),
                        TextInput::make('nisn')
                            ->label('NISN')
                            ->required()
                            ->maxLength(10),
                        TextInput::make('tempat_lahir')
                            ->label('Tempat Lahir')
                            ->required(),
                        DatePicker::make('tanggal_lahir')
                            ->label('Tangal Lahir')
                            ->required(),
                        Select::make('agama_id')
                            ->label('Agama')
                            ->relationship(name: 'Agama', titleAttribute: 'option_name', modifyQueryUsing: fn (Builder $query) => $query->where('option_group', 'religions')->orderBy('id'))
                            ->required(),
                        Select::make('kebutuhan_khusus_id')
                            ->label('Kebutuhan Khusus')
                            ->relationship(name: 'KebutuhanKhusus', titleAttribute: 'option_name', modifyQueryUsing: fn (Builder $query) => $query->where('option_group', 'special_needs')->orderBy('id'))
                            ->required(),
                        TextInput::make('alamat')
                            ->label('Alamat')
                            ->required(),
                        TextInput::make('desa')
                            ->label('Desa')
                            ->required(),
                        TextInput::make('kecamatan')
                            ->label('Kecamatan')
                            ->required(),
                        TextInput::make('kota_kabupaten')
                            ->label('Kota/Kabupaten')
                            ->required(),
                        TextInput::make('kode_pos')
                            ->label('Kode Pos')
                            ->required(),
                        Select::make('tempat_tinggal_id')
                            ->label('Tinggal Bersama')
                            ->relationship(name: 'TempatTinggal', titleAttribute: 'option_name', modifyQueryUsing: fn (Builder $query) => $query->where('option_group', 'residences')->orderBy('id'))
                            ->required(),
                        Select::make('moda_transpotasi_id')
                            ->label('Moda Transpotasi')
                            ->relationship(name: 'ModaTransportasi', titleAttribute: 'option_name', modifyQueryUsing: fn (Builder $query) => $query->where('option_group', 'transportations')->orderBy('id'))
                            ->required(),
                        TextInput::make('no_hp')
                            ->label('Nomor HP')
                            ->tel()
                            ->required(),
                        TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->required(),
                        TextInput::make('sktm')
                            ->label('Nomor SKTM'),
                        TextInput::make('kip')
                            ->label('Nomor KIP'),
                    ]),
                Fieldset::make('Data Ayah')
                    ->schema([
                        TextInput::make('nama_ayah')
                            ->label('Nama')
                            ->required(),
                        TextInput::make('nik_ayah')
                            ->label('NIK'),
                        DatePicker::make('ayah_tanggal_lahir')
                            ->label('Tanggal Lahir'),
                        Select::make('ayah_pendidikan_id')
                            ->label('Pendidikan')
                            ->relationship(name: 'AyahPendidikan', titleAttribute: 'option_name', modifyQueryUsing: fn (Builder $query) => $query->where('option_group', 'educations')->orderBy('id')),
                        Select::make('ayah_pekerjaan_id')
                            ->label('Pekerjaan')
                            ->relationship(name: 'AyahPekerjaan', titleAttribute: 'option_name', modifyQueryUsing: fn (Builder $query) => $query->where('option_group', 'employments')->orderBy('id')),
                        Select::make('ayah_penghasilan_id')
                            ->label('Penghasilan')
                            ->relationship(name: 'AyahPenghasilan', titleAttribute: 'option_name', modifyQueryUsing: fn (Builder $query) => $query->where('option_group', 'monthly_incomes')->orderBy('id')),
                    ]),
                Fieldset::make('Data Ibu')
                    ->schema([
                        TextInput::make('nama_ibu')
                            ->label('Nama')
                            ->required(),
                        TextInput::make('nik_ibu')
                            ->label('NIK'),
                        DatePicker::make('ibu_tanggal_lahir')
                            ->label('Tanggal Lahir'),
                        Select::make('ibu_pendidikan_id')
                            ->label('Pendidikan')
                            ->relationship(name: 'IbuPendidikan', titleAttribute: 'option_name', modifyQueryUsing: fn (Builder $query) => $query->where('option_group', 'educations')->orderBy('id')),
                        Select::make('ibu_pekerjaan_id')
                            ->label('Pekerjaan')
                            ->relationship(name: 'IbuPekerjaan', titleAttribute: 'option_name', modifyQueryUsing: fn (Builder $query) => $query->where('option_group', 'employments')->orderBy('id')),
                        Select::make('ibu_penghasilan_id')
                            ->label('Penghasilan')
                            ->relationship(name: 'IbuPenghasilan', titleAttribute: 'option_name', modifyQueryUsing: fn (Builder $query) => $query->where('option_group', 'monthly_incomes')->orderBy('id')),
                    ]),
                Fieldset::make('Data Wali (Opsional)')
                    ->schema([
                        TextInput::make('nama_wali')
                            ->label('Nama'),
                        TextInput::make('nik_wali')
                            ->label('NIK'),
                        DatePicker::make('wali_tanggal_lahir')
                            ->label('Tanggal Lahir'),
                        Select::make('wali_pendidikan_id')
                            ->label('Pendidikan')
                            ->relationship(name: 'WaliPendidikan', titleAttribute: 'option_name', modifyQueryUsing: fn (Builder $query) => $query->where('option_group', 'educations')->orderBy('id')),
                        Select::make('wali_pekerjaan_id')
                            ->label('Pekerjaan')
                            ->relationship(name: 'WaliPekerjaan', titleAttribute: 'option_name', modifyQueryUsing: fn (Builder $query) => $query->where('option_group', 'employments')->orderBy('id')),
                        Select::make('wali_penghasilan_id')
                            ->label('Penghasilan')
                            ->relationship(name: 'WaliPenghasilan', titleAttribute: 'option_name', modifyQueryUsing: fn (Builder $query) => $query->where('option_group', 'monthly_incomes')->orderBy('id')),
                    ]),
                Fieldset::make('Data Periodik')
                    ->schema([
                        TextInput::make('tinggi_badan')
                            ->label('Tinggi Badan (Cm)')
                            ->numeric(),
                        TextInput::make('berat_badan')
                            ->label('Berat Badan (Kg)')
                            ->numeric(),
                        TextInput::make('lingkar_kepala')
                            ->label('Lingkar Kepala (Cm)')
                            ->numeric(),
                        TextInput::make('jarak_tempat_tinggal')
                            ->label('Jarak Tempat Tinggal (Km)')
                            ->numeric(),
                        TextInput::make('waktu_tempuh_sekolah')
                            ->label('Waktu Tempuh Ke-Sekolah (Menit)')
                            ->numeric(),
                        TextInput::make('jumlah_saudara_kandung')
                            ->label('Jumlah Saudara Kandung')
                            ->numeric(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        $filter = "false";
        return $table
            ->modifyQueryUsing(function (Builder $query) use ($filter) {
                $query->where('registrasi_ulang', $filter);
            })
            ->columns([
                TextColumn::make('no_pendaftaran')
                    ->label('No Pendaftaran')
                    ->sortable(),
                TextColumn::make('nama')
                    ->label('Nama Lengkap')
                    ->sortable(),
                TextColumn::make('tanggal_lahir')
                    ->label('Tanggal Lahir')
                    ->dateTime('d-m-Y')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Tanggal Daftar')
                    ->dateTime('d-m-Y')
                    ->sortable(),
                TextColumn::make('JalurPendaftaran.option_name')
                    ->label('Jalur Pendaftaran')
                    ->sortable(),
                IconColumn::make('registrasi_ulang')
                    ->label('Registrasi Ulang?')
                    ->icon(fn (string $state): string => match ($state) {
                        'true' => 'heroicon-o-check-circle',
                        'false' => 'heroicon-o-x-circle',
                    })
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),

            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageStudents::route('/'),
        ];
    }
}
