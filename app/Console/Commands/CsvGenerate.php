<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Exports\CsvExport;
use Excel;
use Faker\Factory as Faker;

class CsvGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'csv:generate {numberOfRows}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for generate csv files';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // return Command::SUCCESS;
        $numb = $this->arguments()['numberOfRows'];

        $users = [];

        $faker = Faker::create();
        for ($i=1; $i <= $numb ; $i++) { 
            array_push($users,
                [
                    'id'=>$i,
                    'name'=>$faker->name,
                    'email'=>$faker->email,
                    'class'=>$faker->numberBetween($min = 1, $max = 12),
                    'school'=>$faker->randomElement(['ABC ', 'XYZ']) . ' School',
                    'total-score'=>$faker->numberBetween($min = 35, $max = 100),
                    'address'=>$faker->address,
                    'phone'=>$faker->phoneNumber,
                ]
            
        );
        }
        Excel::store(new CsvExport($users),'/export/user.csv');
    }
}
