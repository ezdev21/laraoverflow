<?php

namespace App\Filament\Widgets;

use Filament\Widgets\PieChartWidget;

class QuestionsChart extends PieChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getHeading(): string
    {
        return 'Questions Asked';
    }

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Questions asked each month',
                    'data' => [0, 10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89],
                    'color'=>['red','blue','orange']
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            'backgroundColor' => ['red','green','yellow','blue','rose','purple','red','green','yellow','blue','rose','purple'],
        ];
    }
}
