<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
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
        $types = [ 'Frontend', 'Backend', 'Fullstack', 'Design', 'DevOps' ];

        foreach($types as $single_type){
            $type = new Type();

            $type->name = $single_type;
            $type->name_slug = Str::slug($single_type, '-');

            $type->save();
        }
    }
}
