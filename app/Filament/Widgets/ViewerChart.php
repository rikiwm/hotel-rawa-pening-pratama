<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class ViewerChart extends ChartWidget
{
    protected static ?string $heading = 'Viewer Analytic';
    // protected int | string | array $columnSpan = 'full';
    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Blog posts created',
                    'data' => [0, 10, 5, 2, 21, 32],
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
