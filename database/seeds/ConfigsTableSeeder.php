<?php

use Illuminate\Database\Seeder;

use App\BlogConfig;

class ConfigsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $config = new \App\BlogConfig();
        $config->text = "Write code...";
        $config->image = "default.jpg";
        $config->pagination = 6;
        $config->save();

    }
}
