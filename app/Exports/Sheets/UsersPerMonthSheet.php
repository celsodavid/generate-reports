<?php


namespace App\Exports\Sheets;


use App\User;
use Illuminate\Database\Query\Builder;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class UsersPerMonthSheet implements FromQuery, WithTitle, WithHeadings
{
    private $month;
    private $year;

    public function __construct(int $year, int $month)
    {
        $this->month = $month;
        $this->year  = $year;
    }

    public function headings(): array
    {
        return [
            ['#', 'Name', 'E-mail', 'E-mail VerifiedAt', 'CreatedAt', 'UpdatedAt'],
        ];
    }

    public function query()
    {
        return User::query()
            ->whereYear('created_at', $this->year)
            ->whereMonth('created_at', $this->month);
    }

    public function title(): string
    {
        return 'Month ' . $this->month;
    }
}
