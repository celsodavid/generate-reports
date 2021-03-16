<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class UsersCustomExport implements FromQuery, WithHeadings, WithTitle
{
    use Exportable;

    public function headings(): array
    {
        return [
            ['#', 'Name', 'E-mail', 'E-mail VerifiedAt', 'CreatedAt', 'UpdatedAt'],
        ];
    }

    public function query()
    {
        return User::query();
        //return User::query()->where('email', 'celunico43@gmail.com');
    }

    public function title(): string
    {
        return 'Titulo Teste';
    }
}

