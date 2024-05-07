<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuotaResource\Pages;
use App\Filament\Resources\QuotaResource\RelationManagers;
use App\Models\AdmissionQuotas;
use App\Models\AcademicYears;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class QuotaResource extends Resource
{
    protected static ?int $navigationSort = 2;
    protected static ?string $model = AdmissionQuotas::class;
    protected static ?string $slug = 'kuota-penerimaan';
    protected static ?string $navigationLabel = 'Kuota Penerimaan';
    protected static ?string $pluralModelLabel = 'Kuota Penerimaan';
    protected static ?string $navigationIcon = 'heroicon-o-wallet';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('tahun_ajaran_id')
                    ->label('Tahun Ajaran')
                    ->relationship(name: 'TahunAjaran', titleAttribute: 'tahun_ajaran')
                    ->required(),
                Select::make('jalur_pendaftaran_id')
                    ->relationship(name: 'JalurPendaftaran', titleAttribute: 'option_name', modifyQueryUsing: fn (Builder $query) => $query->where('option_group', 'admission_types')->orderBy('id'))
                    ->required(),
                Select::make('jurusan_id')
                    ->relationship(name: 'Jurusan', titleAttribute: 'option_name', modifyQueryUsing: fn (Builder $query) => $query->where('option_group', 'school_major')->orderBy('id'))
                    ->required(),
                TextInput::make('kuota')
                    ->label('Kuota Penerimaan')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('TahunAjaran.tahun_ajaran')
                    ->label('Tahun Ajaran'),
                TextColumn::make('JalurPendaftaran.option_name')
                    ->label('Jalur Pendaftaran'),
                TextColumn::make('Jurusan.option_name')
                    ->label('Jurusan'),
                TextColumn::make('kuota')
                    ->label('Kuota Penerimaan'),
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
            'index' => Pages\ManageQuotas::route('/'),
        ];
    }
}
