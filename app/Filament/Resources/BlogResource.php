<?php

namespace App\Filament\Resources;

use AmidEsfahani\FilamentTinyEditor\TinyEditor;
use App\Filament\Resources\BlogResource\Pages;
use App\Models\Blog;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-document-text';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('meta_title')
                    ->maxLength(60)
                    ->helperText('Lungimea ideala este de 50-60 caractere'),
                TinyEditor::make('content')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('cover_image')
                    ->image()
                    ->imageCropAspectRatio('1200:630')
                    ->imageResizeTargetWidth('1200')
                    ->imageResizeTargetHeight('630')
                    ->directory('blog-covers')
                    ->helperText('Dimensiuni recomandate: 1200x630 pixels'),
                Forms\Components\DateTimePicker::make('published_at')
                    ->label('Publish Date'),

                Forms\Components\Textarea::make('meta_description')
                    ->maxLength(160)
                    ->helperText('Lungimea ideala este de 150-160 caractere'),
                Forms\Components\TextInput::make('meta_keywords')
                    ->helperText('Cuvinte cheie separate cu virgula, maxim 255 caractere'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('cover_image')
                    ->width(50)
                    ->height(50),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('published_at')
                    ->dateTime(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->defaultSort('published_at', 'desc');
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
