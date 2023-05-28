<?php

namespace Database\Seeders;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;


class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Frontend', 'Backend','AI','Data Analitics','DBA'];
 
    
        Schema::disableForeignKeyConstraints();
        Type::truncate();
        Schema::enableForeignKeyConstraints();

        $type = new Type();
        $type->name = $type;
        $type->slug = Str::slug($type->name);
        $type->save();

    }
}
