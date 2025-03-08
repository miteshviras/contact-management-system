<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Contact;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use App\Filament\Resources\ContactResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ContactResource\RelationManagers;
use App\Models\Company;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(self::formSchema($form->getLivewire()->record));
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('position')
                    ->searchable(),
                Tables\Columns\TextColumn::make('department')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company_id')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }

    public static function formSchema(?Contact $contact = null)
    {
        $companyOptions = Company::latest()
            ->limit(10)
            ->pluck('name', 'id')
            ->toArray();
        return [Grid::make([
            'default' => 1,
        ])
            ->schema([
                Split::make([
                    Section::make([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        TextInput::make('phone')
                            ->tel()
                            ->required()
                            ->maxLength(15),
                        Textarea::make('address')
                            ->required()
                            ->rows(3)
                            ->columnSpanFull(),
                        Textarea::make('notes')->rows(3)->columnSpanFull(),
                    ]),
                    Section::make([
                        FileUpload::make('image')
                            ->image(),
                        Select::make('company_id')
                            ->searchable()
                            ->required()
                            ->label('Company')
                            ->options($companyOptions)
                            ->getSearchResultsUsing(
                                fn(string $search): array =>
                                Company::where('name', 'like', "%{$search}%")
                                    ->limit(10)
                                    ->pluck('name', 'id')
                                    ->toArray()
                            )
                            ->preload(),
                        TextInput::make('position')
                            ->maxLength(255),
                        TextInput::make('department')
                            ->maxLength(255),
                        DateTimePicker::make('created_at')->disabled(),
                        DateTimePicker::make('updated_at')->disabled(),
                    ])->grow(false),
                ])->from('md')
            ])];
    }
}
