<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\CsvExport;
use Excel;
use App\Models\student;
use App\Jobs\CsvdataInsert;
use DB;
use Event;
use App\Events\SendMail;

class CsvController extends Controller
{
    //
    public function csv_data()
    {
        $email =   Auth()->user();
        dispatch(new CsvDataInsert($email));
    
        return response()->json([
            'status'=>200,
            'message'=>"please check your email",
        ]);
        
        
    }
}
