<?php
namespace App\Filament\Resources;
use App\Filament\Resources\NewsletterResource\Pages;
use App\Filament\Resources\NewsletterResource\RelationManagers;
use App\Models\Newsletter;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Set;
use Filament\Forms\Get;
use Illuminate\Support\Str;
use App\Models\User;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;

class NewsletterResource extends Resource
{
    protected static ?string $model = Newsletter::class;
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('subject')
                    ->reactive()
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                        if (($get('slug') ?? '') !== Str::slug($old)) {
                            return;
                        }
                        $set('slug', Str::slug($state));
                    })
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->readonly(),
                Forms\Components\Select::make('author')
                    ->options(User::all()->pluck('name', 'name'))
                    ->placeholder('Select an author')
                    ->required(),
                Forms\Components\DateTimePicker::make('published_at')
                    ->nullable()
                    ->seconds(false)
                    ->default(now())
                    ->required()
                    ->label('Publish Date'),
                Forms\Components\FileUpload::make('thumbnail')
                    ->label('Thumbnail')
                    ->required()
                    ->image(),
                Forms\Components\Textarea::make('description')
                    ->autosize(),
                Forms\Components\Builder::make('blocks')
                    ->blocks([
                        Forms\Components\Builder\Block::make('heading')
                            ->schema([
                                TextInput::make('heading')
                                    ->label('Heading')
                                    ->columnSpan(2)
                                    ->required(),
                                Select::make('level')
                                    ->options([
                                        'h1' => 'Heading 1',
                                        'h2' => 'Heading 2',
                                        'h3' => 'Heading 3',
                                        'h4' => 'Heading 4',
                                        'h5' => 'Heading 5',
                                        'h6' => 'Heading 6',
                                    ])
                                    ->required(),
                                Select::make('position')
                                    ->options([
                                        'text-left' => 'Left',
                                        'text-center' => 'Centered',
                                    ])
                                    ->required(),
                            ])
                            ->columns(2),
                        Forms\Components\Builder\Block::make('text')
                            ->schema([
                                RichEditor::make('content')
                                    ->label('Text')
                                    ->disableToolbarButtons([
                                        'blockquote',
                                        'strike',
                                    ])
                                    ->required(),
                                Select::make('columns')
                                    ->options([
                                        'columns-1' => 'One column',
                                        'columns-2' => 'Two columns',
                                    ])
                                    ->required(),
                            ]),
                        Forms\Components\Builder\Block::make('image')
                            ->schema([
                                FileUpload::make('url')
                                    ->label('Image')
                                    ->image()
                                    ->required()
                                    ->columnSpan(2),
                                Select::make('size')
                                    ->options([
                                        'w-full' => 'Full width',
                                        'w-1/2' => 'Half width',
                                        'w-1/3' => 'Third width',
                                        'w-1/4' => 'Quarter width',
                                    ])
                                    ->placeholder('Select a size'),
                                TextInput::make('alt')
                                    ->label('Alt text')
                                    ->required(),
                            ])
                            ->columns(2),
                    ])
                    ->reorderableWithButtons()
                    ->collapsible()
                    ->columnSpan(2),
                ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('subject')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('author')
                    ->label('Author')
                    ->searchable(),
                Tables\Columns\TextColumn::make('published_at')
                    ->dateTime('d-m-Y, H:i')
                    ->sortable()
                    ->label('Publish Date'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d-m-Y, H:i'),
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
            'index' => Pages\ListNewsletters::route('/'),
            'create' => Pages\CreateNewsletter::route('/create'),
            'edit' => Pages\EditNewsletter::route('/{record}/edit'),
        ];
    }
}