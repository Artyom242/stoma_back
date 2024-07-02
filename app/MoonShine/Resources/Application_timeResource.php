<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Application;
use Illuminate\Database\Eloquent\Model;
use App\Models\Application_time;

use Illuminate\Support\Arr;
use MoonShine\Fields\Select;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Application_time>
 */
class Application_timeResource extends ModelResource
{
    protected string $model = Application_time::class;

    protected string $title = 'Application_times';

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
                Select::make('Time', 'time')
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
//                    ->options(function (){
//                        $times = [
//                            '8:45' => '8:45',
//                            '9:00 - 10:00' => '9:00 - 10:00',
//                            '10:00 - 11:00' => '10:00 - 11:00',
//                            '11:00 - 12:00' => '11:00 - 12:00',
//                            '12:00 - 13:00' => '12:00 - 13:00',
//                            '13:00 - 14:00' => '13:00 - 14:00',
//                            '14:00 - 15:00' => '14:00 - 15:00',
//                            '15:00 - 16:00' => '15:00 - 16:00',
//                            '16:00 - 17:00' => '16:00 - 17:00',
//                        ];
////
////                        $existsTime = Application::query();
////
////                        array_filter($times, fn($time) => $time);
//                    })
                    ->multiple()
                    ->badge('success')
                    ->nullable()
                    ->searchable()
                    ->required()
                    ->showOnExport(),
                Text::make('Запись_id', 'application_id')
                    ->hideOnAll(),
        ]),
        ];
    }

    /**
     * @param Application_time $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [
            'time' => ['required'],
        ];
    }
}
