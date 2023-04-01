<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\CsvExport;
use Excel;
use App\Models\student;
use DB;

class CsvController extends Controller
{
    //
    public function export()
    {
        $users = [];

        if (($open = fopen(storage_path() . "/app/export/user.csv", "r")) !== FALSE) {
                
            while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {
                $users[] = $data;
            }

            fclose($open);
        }

        array_shift($users);
        // print_r($users);

        foreach($users as $row)
        {
            DB::table('students')->insert([
                'id' => $row[0],
                'name' => $row[1],
                'email' => $row[2],
                'class' => $row[3],
                'school' => $row[4],
                'total_score' => $row[5],
                'address' => $row[6],
                'phone' => $row[7],
            ]);
        }
    }
}
