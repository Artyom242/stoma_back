<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Application;
use App\Models\Body_feedback;
use App\MoonShine\Resources\Application_timeResource;
use App\MoonShine\Resources\ApplicationResource;
use App\MoonShine\Resources\BodyCommentResource;
use App\MoonShine\Resources\SectionResource;
use App\MoonShine\Resources\ServiceResource;
use App\MoonShine\Resources\WeekendResource;
use Closure;
use MoonShine\Contracts\Resources\ResourceContract;
use MoonShine\Menu\MenuElement;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use MoonShine\Pages\Page;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    /**
     * @return list<ResourceContract>
     */
    protected function resources(): array
    {
        return [
        ];
    }

    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [];
    }

    /**
     * @return Closure|list<MenuElement>
     */
    protected function menu(): array
    {
        return [
            MenuGroup::make(static fn() => __('moonshine::ui.resource.system'), [
               MenuItem::make(
                   static fn() => __('moonshine::ui.resource.admins_title'),
                   new MoonShineUserResource()
               ),
               MenuItem::make(
                   static fn() => __('moonshine::ui.resource.role_title'),
                   new MoonShineUserRoleResource()
               ),
            ]),

            MenuItem::make('Записи', new ApplicationResource())
                ->badge(fn() => Application::query()->where('confirm', '0')->count()),
            MenuItem::make('Отзывы', new BodyCommentResource())
                ->badge(fn()=>Body_feedback::query()->where('confirm', '0')->count()),
            MenuGroup::make('Услуги', [
                MenuItem::make('Все услуги', new ServiceResource()),
                MenuItem::make('Разделы', new SectionResource()),
            ]),
            MenuItem::make('Праздники', new WeekendResource())
        ];
    }

    /**
     * @return Closure|array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [];
    }
}
