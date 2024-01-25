<?php

declare(strict_types=1);

namespace App\MoonShine;


use MoonShine\Components\When;
use MoonShine\Components\Layout\Search;
use MoonShine\Components\Layout\TopBar;
use MoonShine\Components\Layout\Profile;
use MoonShine\Components\Layout\Sidebar;
use MoonShine\ActionButtons\ActionButton;
use MoonShine\Contracts\MoonShineLayoutContract;
use MoonShine\Components\Layout\{Content, Flash, Footer, Header, LayoutBlock, LayoutBuilder, Menu };

final class MoonShineLayout implements MoonShineLayoutContract
{
    public static function build(): LayoutBuilder
    {
        return LayoutBuilder::make([
            Sidebar::make([
                ActionButton::make(
                    label: 'На сайт',
                    url: '/',
                ),
                Menu::make()->customAttributes(['class' => 'mt-2']),
                When::make(
                    static fn () => config('moonshine.auth.enable', true),
                    static fn (): array => [Profile::make(withBorder: true)]
                ),
            ]),
            LayoutBlock::make([
                Flash::make(),
                Header::make([
                    Search::make(),
                ]),
                Content::make(),
                Footer::make()->menu([]),
            ])->customAttributes(['class' => 'layout-page']),
        ]);
    }
}