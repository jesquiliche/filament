<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PreguntaResource\Pages;
use App\Filament\Resources\PreguntaResource\RelationManagers;
use App\Models\Pregunta;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PreguntaResource extends Resource
{
    protected static ?string $model = Pregunta::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('categoria_id') // Cambia a Select para mostrar las categorías
                    ->relationship('categoria', 'nombre') // Usa la relación y el campo 'nombre' para mostrar
                    ->required(),
                Forms\Components\Textarea::make('pregunta')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('a')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('b')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('c')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('d')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('respuesta')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('categoria.nombre') // Mostrar el nombre de la categoría
                    ->label('Categoría') // Etiqueta para la columna
                    ->sortable()
                    ->searchable(), // Hacerla searchable
                Tables\Columns\TextColumn::make('pregunta')
                    ->searchable(),
                
                
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('categoria_id') // Filtro para categorías
                    ->label('Categoría')
                    ->relationship('categoria', 'nombre'), // Usar la relación y el nombre para el filtro
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
            'index' => Pages\ListPreguntas::route('/'),
            'create' => Pages\CreatePregunta::route('/create'),
            'edit' => Pages\EditPregunta::route('/{record}/edit'),
        ];
    }
}
