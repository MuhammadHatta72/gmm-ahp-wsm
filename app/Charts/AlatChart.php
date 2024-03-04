<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Alat;

class AlatChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $data = [
            Alat::where('nama', 'like', 'FL%')->count(),
            Alat::where('nama', 'like', 'QCC%')->count(),
            Alat::where('nama', 'like', 'RST%')->count(),
            Alat::where('nama', 'like', 'RTG%')->count(),
            Alat::where('nama', 'like', 'TTR%')->count(),
        ];
        $label = [
            'Forklift',
            'Quay Container Crane',
            'Reach Stacker',
            'Rubber Tyred Gantry ',
            'Terminal Tractor',
        ];
        // $totalData = collect($data)->sum();
        return $this->chart->donutChart()
            // ->setTitle('Data Alat')
            // ->setSubtitle($totalData)
            ->setWidth(500)
            ->setHeight(500)
            ->addData($data)
            ->setLabels($label)
        ;
    }
}
