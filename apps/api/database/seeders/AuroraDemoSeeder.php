<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Person;
use App\Models\Relationship;

class AuroraDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $person = Person::create();

        $person->profile()->create([
            'display_name' => 'Taylor',
            'bio' => 'Fundador do Aurora',
        ]);

        $relationship = Relationship::create([
            'type' => 'assistant',
        ]);

        $person->relationships()->attach($relationship->id, [
            'role' => 'owner',
        ]);

        $relationship->interactions()->create([
            'person_id' => $person->id,
            'type' => 'message',
            'content' => 'TOlá Aurora!',
        ]);

        $relationship->memories()->create([
            'content' => 'Primeira conversa registrada.',
        ]);
        
    }
}
