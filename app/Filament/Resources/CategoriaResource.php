<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoriaResource\Pages;
use App\Models\Categoria;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use App\Models\Bloque;
use Filament\Tables\Filters\SelectFilter;




class CategoriaResource extends Resource
{
    protected static ?string $model = Categoria::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Temario'; // Etiqueta en la navegación

    protected static ?string $label = 'Tema'; // Título singular
    protected static ?string $pluralLabel = 'Temas'; // Título plural



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('bloque_id')
                    ->label('Carné de conducir')
                    ->relationship('bloque', 'nombre')  // relación con el modelo Bloque y mostrar el código
                    ->searchable()  // habilita la búsqueda en el combo
                    ->required(),
                Forms\Components\TextInput::make('nombre')
                    ->label('Tema')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('descripcion')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }



    public static function table(Table $table): Table
    {

        return $table
            ->columns([
                Tables\Columns\TextColumn::make('bloque.nombre')  // Muestra el nombre del bloque
                    ->label('Carné de conducir')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('nombre')
                    ->label('Tema')
                    ->searchable(),
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
                SelectFilter::make('bloque_id')  // El filtro se hace sobre el bloque_id
                    ->label('Filtrar por Carné')
                    ->relationship('bloque', 'nombre')  // Usamos la relación con bloque y mostramos el nombre
                    ->options(
                        Bloque::all()->pluck('nombre', 'id')->toArray()  // Obtenemos los bloques para el filtro
                    ),
                
                    SelectFilter::make('categoria_id')  // Filtro para la categoría
                    ->label('Filtrar por Tema')
                    ->options(function (callable $get) {  // Lógica dinámica basada en el bloque_id seleccionado
                        $bloqueId = $get('bloque_id');  // Obtener el bloque seleccionado
            
                        if ($bloqueId) {
                            
                            // Filtrar las categorías basadas en el bloque seleccionado
                            return Categoria::where('bloque_id', $bloqueId)->pluck('nombre', 'id')->toArray();
                        }
            
                        // Si no hay bloque seleccionado, devolver todas las categorías
                        return Categoria::all()->pluck('nombre', 'id')->toArray();
                    }),
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
            'index' => Pages\ListCategorias::route('/'),
            'create' => Pages\CreateCategoria::route('/create'),
            'edit' => Pages\EditCategoria::route('/{record}/edit'),
        ];
    }
}
