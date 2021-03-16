<?php


namespace App\Exports\Sheets;


use App\User;
use Illuminate\Database\Query\Builder;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class UsersCustomSheet implements FromQuery, WithTitle, WithHeadings
{
    private $model;
    private $name;

    public function __construct(string $model, string $name)
    {
        $this->model = $model;
        $this->name = $name;
    }

    public function headings(): array
    {
        return [
            ['#', 'Name', 'E-mail', 'E-mail VerifiedAt', 'CreatedAt', 'UpdatedAt'],
        ];
    }

    public function query()
    {
        $class = "\App\\$this->model";
        return $class::query();
    }

    public function title(): string
    {
        return $this->name;
    }
}
