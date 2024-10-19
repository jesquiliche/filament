<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FalloResource\Pages;
use App\Filament\Resources\FalloResource\RelationManagers;
use App\Models\Fallo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FalloResource extends Resource
{
    protected static ?string $model = Fallo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('pregunta_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('pregunta')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('seleccionada')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('correcta')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('a')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('b')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('c')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image')
                    ->image(),
                Forms\Components\TextInput::make('categoria_id')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('pregunta_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pregunta')
                    ->searchable(),
                Tables\Columns\TextColumn::make('seleccionada')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('categoria_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListFallos::route('/'),
            'create' => Pages\CreateFallo::route('/create'),
            'edit' => Pages\EditFallo::route('/{record}/edit'),
        ];
    }
}
