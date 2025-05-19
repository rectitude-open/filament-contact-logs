<?php

declare(strict_types=1);

namespace RectitudeOpen\FilamentContactLogs\Resources;

use Filament\Forms\Components\DateTimePicker;
// use RectitudeOpen\FilamentContactLogs\Forms\Components\InfoAlert;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use RectitudeOpen\FilamentContactLogs\Models\ContactLog;
use RectitudeOpen\FilamentContactLogs\Resources\ContactLogResource\Pages;

class ContactLogResource extends Resource
{
    public static function getModel(): string
    {
        return config('filament-contact-logs.model', ContactLog::class);
    }

    public static function getNavigationIcon(): string | Htmlable | null
    {
        return static::$navigationIcon ?? config('filament-contact-logs.navigation_icon', 'heroicon-o-envelope-open');
    }

    public static function getNavigationSort(): ?int
    {
        return config('filament-contact-logs.navigation_sort', 0);
    }

    public static function getNavigationLabel(): string
    {
        return __('filament-contact-logs::filament-contact-logs.nav.label');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('filament-contact-logs::filament-contact-logs.nav.group');
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // InfoAlert::make('info')
                //     ->message(__('Please note that the content displayed on this page is provided by visitors. Exercise caution and verify information independently before relying on it.'))
                //     ->type('warning')
                //     ->columnSpanFull(),
                Grid::make(['sm' => 3])->schema([
                    Grid::make()->schema([
                        TextInput::make('subject')
                            ->label(__('filament-contact-logs::filament-contact-logs.field.subject'))
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull()
                            ->dehydrateStateUsing(fn ($state) => $state ?? ''),
                        Textarea::make('message')
                            ->label(__('filament-contact-logs::filament-contact-logs.field.message'))
                            ->default('')
                            ->rows(5)
                            ->columnSpanFull()
                            ->dehydrateStateUsing(fn ($state) => $state ?? ''),
                    ])->columnSpan(['xl' => 2]),
                    Grid::make()->schema([
                        Section::make(__('Visitor Information'))
                            ->compact()
                            ->schema([
                                TextInput::make('name')
                                    ->label(__('filament-contact-logs::filament-contact-logs.field.name'))
                                    ->maxLength(255)
                                    ->inlineLabel()
                                    ->columnSpanFull()
                                    ->dehydrateStateUsing(fn ($state) => $state ?? ''),
                                TextInput::make('email')
                                    ->label(__('filament-contact-logs::filament-contact-logs.field.email'))
                                    ->maxLength(255)
                                    ->inlineLabel()
                                    ->columnSpanFull()
                                    ->dehydrateStateUsing(fn ($state) => $state ?? ''),
                                TextInput::make('phone')
                                    ->label(__('filament-contact-logs::filament-contact-logs.field.phone'))
                                    ->maxLength(255)
                                    ->inlineLabel()
                                    ->columnSpanFull()
                                    ->dehydrateStateUsing(fn ($state) => $state ?? ''),
                                TextInput::make('ip_address')
                                    ->label(__('filament-contact-logs::filament-contact-logs.field.ip_address'))
                                    ->maxLength(255)
                                    ->inlineLabel()
                                    ->columnSpanFull()
                                    ->dehydrateStateUsing(fn ($state) => $state ?? ''),
                                Textarea::make('user_agent')
                                    ->label(__('filament-contact-logs::filament-contact-logs.field.user_agent'))
                                    ->default('')
                                    ->rows(3)
                                    ->columnSpanFull()
                                    ->dehydrateStateUsing(fn ($state) => $state ?? ''),
                                DateTimePicker::make('created_at')
                                    ->label(__('filament-contact-logs::filament-contact-logs.field.created_at'))
                                    ->native(false)
                                    ->default(now())
                                    ->suffixIcon('heroicon-o-calendar')
                                    ->columnSpanFull()
                                    ->inlineLabel()
                                    ->format(config('filament-contact-logs.datetime_format', 'Y-m-d H:i:s'))
                                    ->displayFormat(config('filament-contact-logs.datetime_format', 'Y-m-d H:i:s')),
                            ])
                            ->collapsible(),
                    ])->columnSpan(['xl' => 1]),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('subject')
                    ->label(__('filament-contact-logs::filament-contact-logs.field.subject'))
                    ->searchable()
                    ->limit(50),
                TextColumn::make('name')
                    ->label(__('filament-contact-logs::filament-contact-logs.field.name'))
                    ->searchable()
                    ->limit(50),
                TextColumn::make('created_at')
                    ->label(__('filament-contact-logs::filament-contact-logs.field.created_at'))
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactLogs::route('/'),
            'view' => Pages\ViewContactLog::route('/{record}'),
        ];
    }
}
