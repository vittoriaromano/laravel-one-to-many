<?php

namespace Database\Seeders;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Schema::disableForeignKeyConstraints();
        Type::truncate();
        Schema::enableForeignKeyConstraints();

        for ($i = 0; $i <15; $i++){
            $type = new Type();
            $type->name = $faker->sentence(2);
            $type->slug = Str::slug($type->name);
            $type->save();
        }

    }
}
