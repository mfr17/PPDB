<?php

namespace App\Filament\Resources\QuotaResource\Pages;

use App\Filament\Resources\QuotaResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageQuotas extends ManageRecords
{
    protected static string $resource = QuotaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Tambah Kuota Penerimaan'),
        ];
    }
}
