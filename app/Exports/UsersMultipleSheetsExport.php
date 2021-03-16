<?php

namespace App\Exports;

use App\Exports\Sheets\UsersCustomSheet;
use App\Exports\Sheets\UsersPerMonthSheet;
use App\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class UsersMultipleSheetsExport implements WithMultipleSheets
{
    use Exportable;

    protected $year;

    public function __construct(int $year)
    {
        $this->year = $year;
    }

    public function sheets(): array
    {
        $sheets = [];

//        $this->docExemple($sheets);

        $this->myExample($sheets);

        return $sheets;
    }

    private function docExemple(&$sheets)
    {
        for ($month = 1; $month <= 12; $month++) {
            $sheets[] = new UsersPerMonthSheet($this->year, $month);
        }
    }

    private function myExample(&$sheets)
    {
        $items = [
            'User' => 'Unidades Setembro 2020',
            'LarametricsLog' => 'Jornada Setembro 2020',
            'LarametricsModel' => 'Emails em Blackout',
            'LarametricsNotification' => 'Emails Falhas',
            'LarametricsRequest' => 'Emails Erros'
        ];

        foreach ($items as $model => $name) {
            $sheets[] = new UsersCustomSheet($model, $name);
        }
    }
}
