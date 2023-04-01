<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\CsvExport;
use Excel;

class CsvController extends Controller
{
    //
    public function export()
    {
        $users = [
            [
                'id' => 1,
                'name' => 'Hardik',
                'email' => 'hardik@gmail.com'
            ],
            [
                'id' => 2,
                'name' => 'Vimal',
                'email' => 'vimal@gmail.com'
            ],
            [
                'id' => 3,
                'name' => 'Harshad',
                'email' => 'harshad@gmail.com'
            ]
        ];

        return Excel::download(new CsvExport($users),'user.csv');
    }
}
