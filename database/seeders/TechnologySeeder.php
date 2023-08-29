<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = [ 'HTML', 'CSS', 'JavaScript', 'TypeScript', 'PHP', 'Vue', 'Laravel' ];

        foreach($technologies as $single_technology){
            $technology = new Technology();

            $technology->name = $single_technology;
            $technology->name_slug = Str::slug($single_technology, '-');

            $technology->save();
        }
    }
}
