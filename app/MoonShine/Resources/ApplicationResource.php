<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Application;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Flex;
use MoonShine\Decorations\Grid;
use MoonShine\Fields\Date;
use MoonShine\Fields\DateRange;
use MoonShine\Fields\Field;
use MoonShine\Fields\ID;
use MoonShine\Fields\Phone;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Relationships\BelongsToMany;
use MoonShine\Fields\Select;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\Resources\ModelResource;

/**
 * @extends ModelResource<Application>
 */
class ApplicationResource extends ModelResource
{
    protected string $model = Application::class;

    protected string $title = 'Заявки';
    protected int $itemsPerPage = 15;

    protected string $sortDirection = 'asc';
    protected string $sortColumn = 'confirm';

    public function import(): ?ImportHandler
    {
        return null;
    }
    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()
                    ->sortable()
                    ->hideOnIndex(),
                Grid::make([
                    Column::make([
                        Flex::make([
                            BelongsTo::make('Вид записи', 'applicationTypes', 'name', resource: new Application_typeResource())
                                ->showOnExport(),
                        ]),
                        Flex::make([
                            Text::make('Имя', 'name')
                                ->required()
                                ->showOnExport(),
                            Phone::make('Телефон', 'phone')
                                ->mask('+7 999 999 99 99')
                                ->locked()
                                ->required()
                                ->showOnExport(),
                        ]),
                        Flex::make([
                            Date::make('Дата записи', 'application_date')
                                ->format('d.m.Y')
                                ->required()
                                ->showOnExport(),
                            Select::make('Время', 'application_time')
                                ->options([
                                    '09:00' => '9:00',
                                    '10:00' => '10:00',
                                    '11:00' => '11:00',
                                    '12:00' => '12:00',
                                    '13:00' => '13:00',
                                    '14:00' => '14:00',
                                    '15:00' => '15:00',
                                ])
                                ->nullable()
                                ->searchable()
                                ->required()
                                ->showOnExport(),
                        ]),
                        Switcher::make('Подтверждение', 'confirm')
                            ->sortable()
                            ->showOnExport(),
                    ]),
                ]),
            ]),
        ];
    }

    public function filters(): array
    {
        return [
            Text::make('Текст', 'text'),
            BelongsTo::make('Вид записи', 'applicationTypes', 'name', resource: new Application_typeResource())
                ->nullable(),
            DateRange::make('Дата', 'created_at')
                ->format('d.m.Y'),
            Select::make('Время', 'application_time')
                ->options([
                    '09:00' => '9:00',
                    '10:00' => '10:00',
                    '11:00' => '11:00',
                    '12:00' => '12:00',
                    '13:00' => '13:00',
                    '14:00' => '14:00',
                    '15:00' => '15:00',
                ])
                ->nullable()
                ->searchable(),
            Switcher::make('Подтверждение', 'confirm'),
        ];
    }

    public function export(): ?ExportHandler
    {
        return ExportHandler::make('Export')
            ->filename(sprintf('export_%s', date('Ymd-His')));
    }

    /**
     * @param Application $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
