<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Section;

use MoonShine\ActionButtons\ActionButton;
use MoonShine\Fields\Image;
use MoonShine\Fields\Text;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Section>
 */
class SectionResource extends ModelResource
{
    protected string $model = Section::class;

    protected string $title = 'Разделы услуг';


    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()
                    ->sortable(),
                Text::make('Название','name'),
                Text::make('Английский транслит', 'name_en')
                    ->disabled(),
                Image::make('Иконка', 'image')
                    ->disk('public')
                    ->dir('images/icons'),
            ]),
        ];
    }

    /**
     * @param Section $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
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

    public function import(): ?ImportHandler
    {
        return null;
    }

    public function export(): ?ExportHandler
    {
        return null;
    }
}
