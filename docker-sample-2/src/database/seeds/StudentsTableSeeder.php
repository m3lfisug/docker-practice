<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('students')->delete();
        $array = [];
        for ($i = 1; $i <= 30; $i++) {
            $now = date("Y-m-d H:i:s");
            $array[] = [
                'name' => Str::random(10),
                'age' => rand(1,99),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }
        DB::table('students')->insert($array);
    }
}
