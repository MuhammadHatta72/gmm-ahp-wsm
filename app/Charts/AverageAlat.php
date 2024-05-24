<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Alat;

class AverageAlat
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function buildUtilisasi(): \ArielMejiaDev\LarapexCharts\RadialChart
    {
        $averageUtilisasi = Alat::avg('utilisasi');

        return $this->chart->radialChart()
            ->addData([$averageUtilisasi])
            ->setLabels(['Utilisasi'])
            ->setWidth(300)
            ->setHeight(300);
    }

    public function buildAvailability(): \ArielMejiaDev\LarapexCharts\RadialChart
    {
        $averageAvailability = Alat::avg('availability');

        return $this->chart->radialChart()
            ->addData([$averageAvailability])
            ->setLabels(['Availability'])
            ->setWidth(300)
            ->setHeight(300);
    }

    public function buildReliability(): \ArielMejiaDev\LarapexCharts\RadialChart
    {
        $averageReliability = Alat::avg('reliability');

        return $this->chart->radialChart()
            ->addData([$averageReliability])
            ->setLabels(['Reliability'])
            ->setWidth(300)
            ->setHeight(300);
    }

    public function buildIdle(): \ArielMejiaDev\LarapexCharts\RadialChart
    {
        $averageIdle = Alat::avg('idle');

        return $this->chart->radialChart()
            ->addData([$averageIdle])
            ->setLabels(['Idle'])
            ->setWidth(300)
            ->setHeight(300);
    }
}
