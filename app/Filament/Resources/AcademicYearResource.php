<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AcademicYearResource\Pages;
use App\Filament\Resources\AcademicYearResource\RelationManagers;
use App\Models\AcademicYears;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use function Laravel\Prompts\text;

class AcademicYearResource extends Resource
{
    protected static ?string $model = AcademicYears::class;
    protected static ?string $slug = 'tahun-ajaran';
    protected static ?string $navigationLabel = 'Tahun Ajaran';
    protected static ?string $pluralModelLabel = 'Tahun Ajaran';
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('tahun_ajaran')
                    ->label('Tahun Ajaran')
                    ->required(),
                Select::make('semester')
                    ->label('Semester')
                    ->options([
                        "Ganjil" => "Ganjil",
                        "Genap" => "Genap",
                    ])
                    ->required(),
                Checkbox::make('aktif')
                    ->label('Semester Aktif?'),
                Checkbox::make('tahun_pendaftaran')
                    ->label('PPDB Aktif?'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tahun_ajaran')
                    ->label('Tahun Ajaran'),
                TextColumn::make('semester')
                    ->label('Semester'),
                CheckboxColumn::make('aktif')
                    ->label('Semester Aktif?'),
                CheckboxColumn::make('tahun_pendaftaran')
                    ->label('PPDB Aktif?'),
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
            'index' => Pages\ManageAcademicYears::route('/'),
        ];
    }
}
