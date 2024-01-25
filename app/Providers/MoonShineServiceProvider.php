<?php

declare(strict_types=1);

namespace App\Providers;

use MoonShine\MoonShine;
use MoonShine\Menu\MenuItem;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuDivider;
use App\MoonShine\Resources\CityResource;
use App\MoonShine\Resources\IdeaResource;
use App\MoonShine\Resources\PageResource;
use App\MoonShine\Resources\PostResource;
use App\MoonShine\Resources\RoleResource;
use App\MoonShine\Resources\UserResource;
use App\MoonShine\Resources\BranchResource;
use App\MoonShine\Resources\ExpertResource;
use App\MoonShine\Resources\SliderResource;
use App\MoonShine\Resources\IdeaCategoryResource;
use App\MoonShine\Resources\MoonshineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    protected function resources(): array
    {
        return [];
    }

    protected function pages(): array
    {
        return [];
    }

    protected function menu(): array
    {
        return [
            MenuGroup::make(static fn() => 'Системные', [
               MenuItem::make(
                   static fn() => 'Администраторы',
                   new MoonshineUserResource()
               )
                    ->icon('heroicons.users'),
            //    MenuItem::make(
            //        static fn() => 'Роли',
            //        new RoleResource()
            //    )
            //       ->icon('heroicons.shield-check'),
            ])
            ->icon('heroicons.cog-6-tooth'),
            MenuGroup::make(static fn() => 'Идеи', [
                MenuItem::make(
                    static fn() => 'Идеи',
                    new IdeaResource()
                )
                    ->icon('heroicons.clipboard-document-list'),
                MenuItem::make(
                    static fn() => 'Категории',
                    new IdeaCategoryResource()
                )
                    ->icon('heroicons.queue-list'),
             ])
             ->icon('heroicons.rocket-launch'),
             MenuGroup::make(static fn() => 'Участники', [
                MenuItem::make(
                    static fn() => 'Участники',
                    new UserResource()
                )
                    ->icon('heroicons.users'),
                MenuItem::make(
                    static fn() => 'Категории',
                    new BranchResource()
                )
                    ->icon('heroicons.briefcase'),
            ])
                ->icon('heroicons.user-group'),
            MenuItem::make(
                static fn() => 'География',
                new CityResource()
                )
                ->icon('heroicons.globe-europe-africa'),
            MenuItem::make(
                static fn() => 'Эксперты',
                new ExpertResource()
                )
                ->icon('heroicons.academic-cap'),
            MenuItem::make(
                static fn() => 'Новости',
                new PostResource()
                )
                ->icon('heroicons.clipboard-document-list'),
            MenuItem::make(
                    static fn() => 'Страницы',
                    new PageResource()
                )
                ->icon('heroicons.clipboard-document-list'),
            MenuItem::make(
                    static fn() => 'Цитаты',
                    new SliderResource()
                )
                ->icon('heroicons.clipboard-document-list'),


        ];
    }

    /**
     * @return array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [
            'colors' => [
                'primary' => '#5190fe',
                'secondary' => '#b62982',
            ],
            'darkColors' => [
                'primary' => '#5190fe',
                'secondary' => '#b62982',
            ]
        ];
    }
}
