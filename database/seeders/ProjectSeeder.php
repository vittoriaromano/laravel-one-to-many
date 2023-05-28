<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Project::truncate();
        for ($i = 0; $i <15; $i++){
            $type = Type::inRandomOrder()->first();
            $project = new Project();
            $project->type_id = $type->id;
            $project->project_name = $faker->sentence(2);
            $project->slug = Str::slug($project->name, '-');
            $project->version = $faker->numberBetween(1, 10);
            $project->description = $faker->sentence();
            $project->start_date =$faker->dateTime();
            $project->upload_date = $faker->dateTimeInInterval($project->start_date, '+1 day');
            $project->value = $faker->randomFloat(2, 0, 10000);
            $project->completed = $faker->numberBetween(0, 1);
            $project->save();
        }
    }
}