<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\PortfolioItem;
use Filament\Resources\Resource;
use App\Services\CloudinaryService;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PortfolioItemResource\Pages;
use App\Filament\Resources\PortfolioItemResource\RelationManagers;

class PortfolioItemResource extends Resource
{
    protected static ?string $model = PortfolioItem::class;

    protected static ?string $navigationLabel = 'Portofoliu Items';

    protected static ?string $navigationIcon = 'heroicon-o-camera';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Select::make('category_id')
                ->label('Category')
                ->options(\App\Models\Category::all()->pluck('name', 'id'))
                ->required(),
                Forms\Components\FileUpload::make('image')
                ->image()
                ->maxSize(10024)
                ->directory('temp_portfolio')
                ->disk('local')
                ->visibility('private')
                ->afterStateUpdated(function ($state, callable $set) {
                    if ($state) {
                        $cloudinaryService = app(CloudinaryService::class);
                        $tempPath = storage_path('app/temp_portfolio/' . $state);
                        $result = $cloudinaryService->uploadImage($tempPath);
                        $set('image_public_id', $result['public_id']);
                        
                        // Ștergem fișierul temporar după încărcare
                        if (file_exists($tempPath)) {
                            unlink($tempPath);
                        }
                    }
                }),
            Forms\Components\Hidden::make('image_public_id'),
        ]);
}
    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('category.name')->label('Category'),
            Tables\Columns\ImageColumn::make('image')
                ->getStateUsing(function (PortfolioItem $record) {
                    $cloudinaryService = app(CloudinaryService::class);
                    return $cloudinaryService->getImageUrl($record->image_public_id, ['width' => 100, 'height' => 100, 'crop' => 'fill']);
                }),
        ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make()
                ->before(function (PortfolioItem $record) {
                    $cloudinaryService = app(CloudinaryService::class);
                    $cloudinaryService->deleteImage($record->image_public_id);
                }),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make()
                ->before(function (Collection $records) {
                    $cloudinaryService = app(CloudinaryService::class);
                    foreach ($records as $record) {
                        $cloudinaryService->deleteImage($record->image_public_id);
                    }
                }),
        ]);
}

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    protected function afterSave(): void
    {
        $tempDir = storage_path('app/temp_portfolio');
        if (is_dir($tempDir)) {
            $files = glob($tempDir . '/*');
            foreach($files as $file) {
                if(is_file($file)) {
                    unlink($file);
                }
            }
        }
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPortfolioItems::route('/'),
            'create' => Pages\CreatePortfolioItem::route('/create'),
            'edit' => Pages\EditPortfolioItem::route('/{record}/edit'),
        ];
    }
}
