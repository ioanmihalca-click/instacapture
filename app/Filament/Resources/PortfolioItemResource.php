<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortfolioItemResource\Pages;
use App\Models\Category;
use App\Models\PortfolioItem;
use App\Services\CloudinaryService;
use Filament\Actions;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Collection;

class PortfolioItemResource extends Resource
{
    protected static ?string $model = PortfolioItem::class;

    protected static ?string $navigationLabel = 'Portofoliu Items';

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-camera';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\Select::make('category_id')
                    ->label('Category')
                    ->options(Category::all()->pluck('name', 'id'))
                    ->required(),
                FileUpload::make('image')
                    ->image()
                    ->maxSize(10024)
                    ->directory('portfolio')
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state) {
                            $cloudinaryService = app(CloudinaryService::class);
                            $result = $cloudinaryService->uploadImage($state);
                            $set('image_public_id', $result['public_id']);
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
            ->recordActions([
                Actions\EditAction::make(),
                Actions\DeleteAction::make()
                    ->before(function (PortfolioItem $record) {
                        $cloudinaryService = app(CloudinaryService::class);
                        $cloudinaryService->deleteImage($record->image_public_id);
                    }),
            ])
            ->toolbarActions([
                Actions\DeleteBulkAction::make()
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
