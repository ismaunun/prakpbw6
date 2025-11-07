<?php

namespace App\Filament\Resources\Kegiatans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables;
use Filament\Forms\Components\DatePicker;

class KegiatansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul')
                    ->searchable(),
                TextColumn::make('tanggal')
                    ->date()
                    ->sortable(),
                TextColumn::make('ringkasan')
                    ->searchable(),
                TextColumn::make('foto')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto')
                    ->label('Foto')
                    ->square()
                    ->size(60),

                TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable()
                    ->limit(40)
                    ->wrap()
                    ->sortable(),

                TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),

                TextColumn::make('ringkasan')
                    ->label('Ringkasan')
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true),

                ImageColumn::make('foto')
                    ->label('Foto')
                    ->disk('public')
                    ->square()
                    ->size(60),
            ])
            ->defaultSort('tanggal', 'desc')
            ->filters([
                Tables\Filters\Filter::make('tahun')
                    ->form([
                        DatePicker::make('from')
                            ->label('Dari Tahun')
                            ->native(false)
                            ->displayFormat('Y'),

                        DatePicker::make('until')
                            ->label('Sampai Tahun')
                            ->native(false)
                            ->displayFormat('Y'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['from'] ?? null, fn ($q, $from) => 
                                $q->whereYear('tanggal', '>=', $from))
                            ->when($data['until'] ?? null, fn ($q, $until) => 
                                $q->whereYear('tanggal', '<=', $until));
                    }),
            ]);
    }
}
