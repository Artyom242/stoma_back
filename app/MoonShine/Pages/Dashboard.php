<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use App\Models\Application;
use App\Models\Body_feedback;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Grid;
use MoonShine\Fields\Preview;
use MoonShine\Metrics\ValueMetric;
use MoonShine\Pages\Page;
use MoonShine\Components\MoonShineComponent;

class Dashboard extends Page
{
    /**
     * @return array<string, string>
     */
    public function breadcrumbs(): array
    {
        return [
            '#' => $this->title()
        ];
    }

    public function title(): string
    {
        return $this->title ?: 'Главная';
    }

    /**
     * @return list<MoonShineComponent>
     */
    public function components(): array
	{
		return [
            Grid::make([
                Column::make([
                    ValueMetric::make('Записи')
                        ->columnSpan(6)
                        ->value(Application::query()->where('confirm', '0')->count()),
                ])->columnSpan(6),
                Column::make([
                    ValueMetric::make('Отзывы')
                        ->columnSpan(6)
                        ->value(Body_feedback::query()->where('confirm', '0')->count()),
                ])->columnSpan(6),
            ]),
            Preview::make('ada', 'name')
        ];
	}
}
