<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JurusanResource\Pages;
use App\Filament\Resources\JurusanResource\RelationManagers;
use App\Models\Options;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JurusanResource extends Resource
{
    protected static ?string $model = Options::class;
    protected static ?string $slug = 'jurusan';
    protected static ?string $navigationLabel = 'Jurusan';
    protected static ?string $pluralModelLabel = 'Jurusan';
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('option_group')->default('school_major')->readOnly()->password()->label('Key')->required(),
                TextInput::make('option_name')->label("Jurusan")->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        $filter = "school_major";
        return $table
            ->modifyQueryUsing(function (Builder $query) use ($filter) {
                $query->where('option_group', $filter);
            })
            ->columns([
                TextColumn::make('option_name')->label("Jurusan")
            ])
            ->actions([
                Tables\Actions\EditAction::make()->form(function () {
                    return [TextInput::make('option_name')->label("Jurusan")];
                }),
                Tables\Actions\DeleteAction::make()
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageJurusans::route('/'),
        ];
    }
}
