<?php

declare(strict_types=1);

namespace Modules\LU\Charts;

use Carbon\Carbon;
use Chartisan\PHP\Chartisan;
use Fidum\ChartTile\Charts\Chart;
use Illuminate\Http\Request;

/**
 * Undocumented class.
 */
class DailyUsersChart extends Chart
{
    /**
     * Undocumented function.
     */
    public function handler(Request $request): Chartisan
    {
        $date = Carbon::now()->subMonth()->startOfDay();

        $data = collect(range(0, 12))->map(function ($days) use ($date) {
            return [
                'x' => $date->clone()->addDays($days)->toDateString(),
                'y' => rand(100, 500),
            ];
        });
        $labels = $data->pluck('x')->toArray();
        $dataset = $data->toArray();
        $labels[0] = $request->qid;

        return Chartisan::build()
            ->labels($labels)
            ->dataset('Example Data', $dataset);
    }

    public function type(): string
    {
        return 'bar';
    }

    public function options(): array
    {
        return [
            'responsive' => true,
            'maintainAspectRatio' => false,
            // etc ...
        ];
    }
}
