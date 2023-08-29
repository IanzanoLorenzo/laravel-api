<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Faker\Generator as Faker;
use Faker\Provider\en_US\Person;
use Illuminate\Support\Str;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker, Person $person)
    {
        for( $i=0; $i<10; $i++ ){
            $project = new Project;
            $project->type_id = $faker->numberBetween(1, 5);
            $project->project_name = $faker->words(3, true);
            $project->project_name_slug = Str::slug($project->project_name);
            $project->description = $faker->text(100);
            $project->creator_name = $person->name();
            $project->creation_date = $faker->dateTimeBetween('-2 year', 'now');
            $project->save();
        }
    }
}
