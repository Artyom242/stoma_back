<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Application;
use Illuminate\Database\Eloquent\Model;
use MoonShine\ActionButtons\ActionButton;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Flex;
use MoonShine\Decorations\Grid;
use MoonShine\Fields\Date;
use MoonShine\Fields\DateRange;
use MoonShine\Fields\Field;
use MoonShine\Fields\Fields;
use MoonShine\Fields\ID;
use MoonShine\Fields\Phone;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Relationships\HasMany;
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
                    ->sortable(),
                Grid::make([
                    Column::make([
                        Flex::make([
                            BelongsTo::make('Вид записи', 'applicationTypes', 'name', resource: new Application_typeResource())
                                ->required()
                                ->showOnExport()
                                ->hideOnIndex(),
                        ]),
                        Flex::make([
                            Text::make('Имя', 'name')
                                ->required()
                                ->showOnExport(),
                            Phone::make('Телефон', 'phone')
                                ->mask('+7 999 999 99 99')
                                ->required()
                                ->showOnExport(),
                        ]),
                        Flex::make([
                            Date::make('Дата записи', 'application_date')
                                ->format('d.m.Y')
                                ->required()
                                ->showOnExport(),
                            Select::make('Время', 'application_times')
                                ->options([
                                    '8:45' => '8:45',
                                    '9:00 - 10:00' => '9:00 - 10:00',
                                    '10:00 - 11:00' => '10:00 - 11:00',
                                    '11:00 - 12:00' => '11:00 - 12:00',
                                    '12:00 - 13:00' => '12:00 - 13:00',
                                    '13:00 - 14:00' => '13:00 - 14:00',
                                    '14:00 - 15:00' => '14:00 - 15:00',
                                    '15:00 - 16:00' => '15:00 - 16:00',
                                    '16:00 - 17:00' => '16:00 - 17:00',
                                ])
                                ->multiple()
                                ->badge('success')
                                ->nullable()
                                ->searchable()
                                ->required()
                                ->showOnExport()
                                ->hideOnIndex()
                                ->changeFill(function (Application $application){
                                    return $application->applicationTimes()->pluck('time')->toArray();
                                }),
                            HasMany::make('Время', 'applicationTimes', resource: new Application_timeResource())
                                ->hideOnAll()
                                ->showOnIndex()
                                ->required(),
                        ]),
                        Switcher::make('Подтверждение', 'confirm')
                            ->sortable()
                            ->showOnExport(),
                    ]),
                ]),
            ]),
        ];
    }

    public function save(Model $item, ?Fields $fields = null): Model
    {
        $item->fill(request()->only(['application_type_id', 'name', 'phone', 'application_date', 'confirm']));
        $item->save();

        $item->applicationTimes()->delete();

        foreach (request()->input('application_times') as $time){
            $item->applicationTimes()->create(['time'=> $time]);
        }

        return $item;
    }

    public function delete(Model $item, ?Fields $fields = null): bool
    {
        $item->applicationTimes()->delete();

        return $item->delete();
    }

    public function filters(): array
    {
        return [
            Text::make('Текст', 'text'),
            BelongsTo::make('Вид записи', 'applicationTypes', 'name', resource: new Application_typeResource())
                ->nullable(),
            DateRange::make('Дата', 'application_date')
                ->format('d.m.Y'),
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
