<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $categoryId = DB::table('categories')->where('name', 'daring')->value('id');

     $eventId = DB::table('events')->insertGetId([
        'category_id' => $categoryId,
        'name'        => 'Seminar Nasional',
        'deskripsi'   => 'Event daring tingkat SMA',
        'start_date'  => '2026-12-01',
        'end_date'    => '2026-12-02',
        'poster'      => 'poster.jpg',
        'slug'        => 'seminar-nasional',
        'price'       => 0,
        'created_at'  => now(),
        'updated_at'  => now(),
    ]);

    $levelIds = DB::table('levels')->whereIn('name', ['smp'])->pluck('id');

    DB::table('event_level')->insert(
        $levelIds->map(fn ($id) => ['event_id' => $eventId, 'level_id' => $id])->all()
    );
}
    
    }

