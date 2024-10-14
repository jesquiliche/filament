<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PreguntaResource\Pages;
use App\Filament\Resources\PreguntaResource\RelationManagers;
use App\Models\Pregunta;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
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
                Select::make('bloque_id')
                ->label('Carné de conducir')
                ->relationship('categoria.bloque', 'nombre')
                ->reactive() // Hacer el select reactivo
                ->afterStateUpdated(function (callable $set) {
                    // Limpiar la categoría cuando se cambia el bloque
                    $set('categoria_id', null);
                }),

            Select::make('categoria_id')
                ->label('Tema')
                ->options(function (callable $get) {
                    $bloqueId = $get('bloque_id');
                    if ($bloqueId) {
                        return \App\Models\Categoria::where('bloque_id', $bloqueId)
                            ->pluck('nombre', 'id');
                    }
                    return \App\Models\Categoria::pluck('nombre', 'id');
                })
                ->reactive()  // Reactivo para actualizar cuando cambie bloque_id
                ->disabled(fn (callable $get) => !$get('bloque_id')) // Desactivar si no hay bloque seleccionado
                ->required(),

                FileUpload::make('image')
                    ->label('Imagen')
                    ->image()
                    ->directory('uploads/images'),
                Forms\Components\Textarea::make('pregunta')
                    ->label('Pregunta')
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
                /* Forms\Components\TextInput::make('d')
                    ->required()
                    ->maxLength(255),*/
                Select::make('respuesta')
                    ->options([
                        'a' => 'A',
                        'b' => 'B',
                        'c' => 'C',
                        //        'd' => 'D',
                    ])
                    ->default(fn($get) => $get('respuesta')) // Utiliza el valor guardado en la base de datos
                    ->required(),




                Forms\Components\Textarea::make('Explicacion')
                    ->label('Explicación') // Etiqueta visible del campo
                    ->placeholder('Escribe la explicación aqui') // Marcador de posición
                    ->rows(4) // Número de líneas visibles del textarea
                    ->maxLength(65000)
                    ->columnSpanFull(),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Imagen')
                    ->size(60),
                TextColumn::make('categoria.bloque.nombre')
                    ->label('Carné')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('categoria.nombre') // Mostrar el nombre de la categoría
                    ->label('Tema') // Etiqueta para la columna
                    ->sortable()
                    ->searchable(), // Hacerla searchable
                Tables\Columns\TextColumn::make('pregunta')
                    ->searchable(),


            ])
            ->filters([
                Tables\Filters\SelectFilter::make('bloque_id') // Filtro para categorías
                ->label('Carné')
                ->relationship('categoria.bloque', 'nombre'),
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
