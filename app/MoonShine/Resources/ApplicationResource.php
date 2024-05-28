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
use MoonShine\Fields\Field;
use MoonShine\Fields\ID;
use MoonShine\Fields\Phone;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Relationships\HasMany;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;

/**
 * @extends ModelResource<Application>
 */
class ApplicationResource extends ModelResource
{
    protected string $model = Application::class;

    protected string $title = 'Заявки';

    protected int $itemsPerPage = 15;

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Grid::make([
                    Column::make([
                        Flex::make([
                            BelongsTo::make('Вид записи', 'applicationTypes', 'name', resource: new Application_typeResource())
                        ]),
                        Flex::make([
                            Text::make('Имя', 'name')->required(),
                            Phone::make('Телефон', 'phone')
                                ->mask('+7 999 999 99 99')
                                ->locked()
                                ->required(),
                        ]),
                        Flex::make([
                            Date::make('Дата записи', 'application_date')
                                ->format('d.m.Y')
                                ->required(),
                            Text::make('Время', 'application_time')->required(),
                        ]),
                        Switcher::make('Подтверждение', 'confirm')
                        ->sortable()
                    ]),
                ]),
            ]),
        ];
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
