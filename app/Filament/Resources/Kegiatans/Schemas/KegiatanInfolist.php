<?php

namespace App\Filament\Resources\Kegiatans\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class KegiatanInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('judul'),
                TextEntry::make('tanggal')
                    ->date(),
                TextEntry::make('ringkasan')
                    ->placeholder('-'),
                TextEntry::make('isi')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('foto')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
