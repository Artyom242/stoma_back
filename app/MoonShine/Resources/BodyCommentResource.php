<?php

declare(strict_types=1);
//future slice design

namespace App\MoonShine\Resources;

use App\Models\Body_feedback;
use Illuminate\Database\Eloquent\Model;
use MoonShine\ActionButtons\ActionButton;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Grid;
use MoonShine\Fields\Date;
use MoonShine\Fields\DateRange;
use MoonShine\Fields\Field;
use MoonShine\Fields\ID;
use MoonShine\Fields\Number;
use MoonShine\Fields\Phone;
use MoonShine\Fields\Relationships\BelongsToMany;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\Resources\ModelResource;

/**
 * @extends ModelResource<Body_feedback>
 */
class BodyCommentResource extends ModelResource
{
    protected string $model = Body_feedback::class;

    protected string $title = 'Отзывы';
    protected string $sortDirection = 'desc';

    protected int $itemsPerPage = 15;
    protected string $sortColumn = 'created_at';



    protected array $with = [
        'getServicesComment',
    ];

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
                ID::make()->sortable()
                    ->showOnExport(),
                Grid::make([
                    Column::make([
                        Block::make('Основная информация', [
                            Text::make('Имя', 'name')
                                ->showOnExport()
                                ->required(),
                            Phone::make('Телефон', 'phone')
                                ->mask('+7 999 999 99 99')
                                ->required()
                                ->hideOnIndex()
                                ->showOnExport(),
                            Textarea::make('Текст', 'text')
                                ->showOnExport()
                                ->required(),
                        ]),
                    ])->columnSpan(8),
                    Column::make([
                        Block::make('Дополнительная информация',[
                            BelongsToMany::make('Услуги', 'getServicesComment', 'name', resource: new BodyCommentResource())
                                ->selectMode()
                                ->inLine(' ', true)
                                ->showOnExport(),
                            Number::make('Оценка', 'rating')
                                ->max(5)
                                ->stars()
                                ->sortable()
                                ->showOnExport(),
                            Switcher::make('Подтверждение', 'confirm'),
                            Date::make('Дата', 'created_at')
                                ->format('d.m.Y')
                                ->hideOnAll()
                                ->showOnExport(),
                        ])
                    ])->columnSpan(4),
                ]),
        ];

    }

    public function formButtons(): array
    {
        return [
            ActionButton::make('Назад', fn() => $this->indexPageUrl())->customAttributes(['class' => 'btn-lg'])
        ];
    }
    public function detailButtons(): array
    {
        return [
            ActionButton::make('Назад', fn() => $this->indexPageUrl())->customAttributes(['class' => 'btn-lg'])
        ];
    }

    public function filters(): array
    {
        return [
            Text::make('Текст', 'text'),
            BelongsToMany::make('Услуги', 'getServicesComment', 'name', resource: new BodyCommentResource())
                ->selectMode()
                ->inLine(' ', true),
            DateRange::make('Дата', 'created_at')
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
     * @param Body_feedback $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
