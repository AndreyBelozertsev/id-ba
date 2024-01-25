<?php

declare(strict_types=1);

namespace App\MoonShine;

use App\MoonShine\Components\Sidebar;
use MoonShine\Components\Layout\TopBar;
use MoonShine\ActionButtons\ActionButton;
use MoonShine\Contracts\MoonShineLayoutContract;
use MoonShine\Components\Layout\{Content, Flash, Footer, Header, LayoutBlock, LayoutBuilder, Menu };

final class MoonShineLayout implements MoonShineLayoutContract
{
    public static function build(): LayoutBuilder
    {
        return LayoutBuilder::make([
            TopBar::make([
                ActionButton::make(
                    label: 'На сайт',
                    url: '/',
                ),
            ]),
            Sidebar::make([
                Menu::make()->customAttributes(['class' => 'mt-2']),
            ]),
            LayoutBlock::make([

                Flash::make(),
                Header::make(),
                Content::make(),
                Footer::make(),
            ])->customAttributes(['class' => 'layout-page']),
        ])->customAttributes(['style' => 'padding-left: 18rem;']);
    }
}