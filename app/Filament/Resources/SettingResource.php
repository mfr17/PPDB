<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Filament\Resources\SettingResource\RelationManagers;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SettingResource extends Resource
{
    protected static ?int $navigationSort = 5;
    protected static ?string $model = Setting::class;
    protected static ?string $navigationLabel = 'Pengaturan';
    protected static ?string $pluralModelLabel = 'Pengaturan';
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('setting_description')
                    ->label("Label"),
                TextColumn::make('setting_value')
                    ->label("Value")
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->form(function (Setting $record) {
                    switch ($record->type) {
                        case 'int':
                            return [Forms\Components\TextInput::make('setting_value')->label($record->setting_description)->tel()];
                            break;
                        case 'options':
                            return [Forms\Components\Select::make('setting_value')->options(['Dibuka' => 'Dibuka', 'Ditutup' => 'Ditutup'])->label($record->setting_description)];
                            break;
                        case 'date':
                            return [Forms\Components\DatePicker::make('setting_value')->default('setting_default_value')->native(false)->displayFormat('d-m-Y')->label($record->setting_description)];
                            break;
                    }
                }),
            ]);
        // Tables\Actions\DeleteAction::make(),
        // ->bulkActions([
        //     Tables\Actions\BulkActionGroup::make([
        //         Tables\Actions\DeleteBulkAction::make(),
        //     ]),
        // ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSettings::route('/'),
        ];
    }
}
