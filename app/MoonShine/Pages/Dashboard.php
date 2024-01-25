<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use MoonShine\Pages\Page;
use Domain\Idea\Models\Idea;
use Domain\User\Models\User;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Column;
use MoonShine\Metrics\ValueMetric;
use MoonShine\Decorations\TextBlock;

class Dashboard extends Page
{
    protected string $title = 'Банк Идей';  
    protected string $subtitle = 'Республика Крым';

    public function breadcrumbs(): array
    {
        return [
            '#' => $this->title()
        ];
    }

    public function title(): string
    {
        return $this->title ?: 'Dashboard';
    }

    public function components(): array
	{
        return [
            Grid::make([
                Column::make([
                    ValueMetric::make('Идей')
                        ->value(Idea::count()),
                ])->columnSpan(6),
                Column::make([
                    ValueMetric::make('Зарегистрированных пользователей')
                        ->value(User::count()),
                ])->columnSpan(6),
            ])
        ];
	}

    public function metrics(): array 
    {
        return [

        ];
    } 
}
