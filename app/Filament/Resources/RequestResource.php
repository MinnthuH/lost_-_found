<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RequestResource\Pages;
use App\Models\Request; // Ensure you're using the correct Request model
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;

class RequestResource extends Resource
{
    protected static ?string $model = Request::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([                
                Forms\Components\Select::make('status')
                    ->options([
                        'inreview' => 'Inreview',
                        'running' => 'Running',
                        'success' => 'Success',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('job_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name') // Use 'user.name' to display the user's name
                    ->label('User Name') // Optional: set a label for the column
                    ->searchable(),
                Tables\Columns\TextColumn::make('brand.name') // Use 'brand.name' to display the brand's name
                    ->label('Brand Name') // Optional: set a label for the column
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone_model')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone_color')
                    ->searchable(),
                Tables\Columns\TextColumn::make('imei_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('lost_date')
                    ->dateTime()
                    ->searchable(),
                Tables\Columns\TextColumn::make('lost_time')
                    ->searchable(),
                Tables\Columns\TextColumn::make('lost_location')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('social_url')
                    ->searchable(),
                Tables\Columns\TextColumn::make('message')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Image')
                    ->url(fn($record) => asset('images/' . $record->image)), // Generate the URL dynamically
                Tables\Columns\TextColumn::make('status')
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
                // Add any filters you want here
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRequests::route('/'),
            'create' => Pages\CreateRequest::route('/create'),
            'edit' => Pages\EditRequest::route('/{record}/edit'),
        ];
    }
}
