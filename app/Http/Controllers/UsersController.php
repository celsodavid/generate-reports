<?php

namespace App\Http\Controllers;

use App\Exports\UsersCustomExport;
use App\Exports\UsersExport;
use App\Exports\UsersMultipleSheetsExport;
use App\Exports\UsersSimpleExport;
use App\Exports\UsersViewExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UsersController extends Controller
{
    public function export($type)
    {
        switch ($type)
        {
            case 'simple':
                return Excel::download(new UsersSimpleExport(), 'users-simple.xlsx');

            case 'custom':
                return (new UsersCustomExport())->download('users-custom.xlsx');

            case 'view':
                return Excel::download(new UsersViewExport(), 'users-view.xlsx');

            case 'multiple':
                return (new UsersMultipleSheetsExport(2020))->download('users-multiple-sheets.xlsx');

            case 'save':
                Excel::store(new UsersViewExport(), 'export/users-view.xlsx');
                return 'fim';

            default:
                return Excel::download(new UsersExport(), 'users.xlsx');
        }
    }
}
