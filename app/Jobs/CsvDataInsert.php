<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use DB;
use Event;
use App\Events\sendMail;

class CsvDataInsert implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $user;
    public function __construct($user)
    {
        //
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
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
                'name' => $row[1],
                'email' => $row[2],
                'class' => $row[3],
                'school' => $row[4],
                'total_score' => $row[5],
                'address' => $row[6],
                'phone' => $row[7],
            ]);
        }

        Event::dispatch(new sendMail($this->user));

    }
}
