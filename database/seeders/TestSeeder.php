<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::truncate();
        $report = fopen(public_path("data/company.csv"), "r");
        $dataRow = true;
            while (($data = fgetcsv($report, 4000, ",")) !== FALSE) {
                if (!$dataRow) {
                    Company::create([
                        "name" => $data['0'],
                        "phone" => $data['1'],
                    ]);
                }
                $dataRow = false;
            }

        fclose($report);
    }
}
