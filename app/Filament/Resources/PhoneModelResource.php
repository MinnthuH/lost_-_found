<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PhoneModelResource\Pages;
use App\Models\PhoneModel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PhoneModelResource extends Resource
{
    protected static ?string $model = PhoneModel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // Form Schema
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\Select::make('device_id')
                //     ->label('Device')
                //     ->relationship('device', 'name') // Assuming 'device' is the related model
                //     ->required(),

                Forms\Components\Select::make('brand_id')
                    ->label('Brand')
                    ->relationship('brand', 'name') // Assuming 'brand' is the related model
                    ->required(),

                Forms\Components\TextInput::make('model')
                    ->required()
                    ->maxLength(255)
                    ->label('Model Name'),

                // Color (Multiple selection)
                Forms\Components\TagsInput::make('color')
                    ->suggestions(['grey', 'black', 'white'])  // Predefined color suggestions
                    ->afterStateUpdated(fn ($state, callable $set) => $set('color', implode(',', $state)))  // Convert array to comma-separated string
                    ->required(),

                Forms\Components\TextInput::make('description')
                    ->nullable()
                    ->maxLength(255)
                    ->label('Description'),

                Forms\Components\Toggle::make('status')
                    ->required()
                    ->label('Active Status'),

                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->directory('images')
                    ->nullable()
                    ->label('Upload Image'),
                    
            ]);
    }

    // Table Schema
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('device.name')
                    ->label('Device')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('brand.name')
                    ->label('Brand')
                    ->searchable(),

                Tables\Columns\TextColumn::make('model')
                    ->label('Model')
                    ->searchable(),

                Tables\Columns\TextColumn::make('color')
                    ->label('Color')
                    ->searchable(),

                Tables\Columns\IconColumn::make('status')
                    ->boolean()
                    ->label('Status'),

                Tables\Columns\ImageColumn::make('image')
                    ->url(fn ($record) => $record->image ? asset('storage/images/' . $record->image) : null)
                    ->label('Image'),

                Tables\Columns\TextColumn::make('description')
                    ->label('Description')
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Created At'),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Updated At'),
            ])
            ->filters([
                // Add filters here (e.g., status, date range)
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([ 
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    // Relations
    public static function getRelations(): array
    {
        return [
            // Add any relations here if necessary
        ];
    }

    // Pages Configuration
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPhoneModels::route('/'),
            'create' => Pages\CreatePhoneModel::route('/create'),
            'edit' => Pages\EditPhoneModel::route('/{record}/edit'),
        ];
    }
}

