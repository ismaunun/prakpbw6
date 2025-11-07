<?php

namespace App\Filament\Resources\Siswas\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class SiswaInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nisn'),
                TextEntry::make('nama'),
                TextEntry::make('jenis_kelamin')
                    ->badge(),
                TextEntry::make('kelas'),
                TextEntry::make('tanggal_lahir')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('alamat')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
