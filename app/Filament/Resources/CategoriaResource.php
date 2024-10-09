<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoriaResource\Pages;
use App\Filament\Resources\CategoriaResource\RelationManagers;
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



  
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('bloque_id')
                    ->label('Bloque')
                    ->relationship('bloque', 'nombre')  // relación con el modelo Bloque y mostrar el código
                    ->searchable()  // habilita la búsqueda en el combo
                    ->required(),
                Forms\Components\TextInput::make('nombre')
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
                ->label('Nombre del Bloque')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('nombre')
                ->label('Categoría')
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
                ->label('Filtrar por Bloque')
                ->relationship('bloque', 'nombre')  // Usamos la relación con bloque y mostramos el nombre
                ->options(
                    Bloque::all()->pluck('nombre', 'id')->toArray()  // Obtenemos los bloques para el filtro
                ),
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
