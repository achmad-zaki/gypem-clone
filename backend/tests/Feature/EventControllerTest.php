<?php

namespace Tests\Feature;

use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EventControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_creates_lists_shows_updates_and_deletes_events(): void
    {
        $eventData = [
            'name' => 'Lomba Sains',
            'deskripsi' => 'Kompetisi sains tingkat sekolah',
            'category' => 'daring',
            'level' => 'smp',
            'start_date' => '2026-12-01',
            'end_date' => '2026-12-10',
            'poster' => 'poster.png',
            'slug' => 'lomba-sains',
            'price' => 0,
        ];

        $created = $this->postJson('/api/events', $eventData)
            ->assertCreated()
            ->assertJsonPath('data.name', 'Lomba Sains');

        $eventId = $created->json('data.id');

        $this->getJson('/api/events')
            ->assertOk()
            ->assertJsonCount(1, 'data');

        $this->getJson("/api/events/{$eventId}")
            ->assertOk()
            ->assertJsonPath('data.slug', 'lomba-sains');

        $this->patchJson("/api/events/{$eventId}", ['name' => 'Olimpiade Sains'])
            ->assertOk()
            ->assertJsonPath('data.name', 'Olimpiade Sains');

        $this->deleteJson("/api/events/{$eventId}")
            ->assertOk()
            ->assertJsonPath('success', true);

        $this->assertDatabaseMissing('events', ['id' => $eventId]);
    }

    public function test_it_rejects_invalid_event_data_and_invalid_date_ranges(): void
    {
        $this->postJson('/api/events', [
            'name' => 'Event invalid',
            'deskripsi' => 'Deskripsi',
            'category' => 'hybrid',
            'level' => 'kuliah',
            'start_date' => '2026-12-10',
            'end_date' => '2026-12-01',
            'poster' => 'poster.png',
            'slug' => 'event-invalid',
            'price' => -1,
        ])
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['category', 'level', 'end_date', 'price']);

        $event = Event::create([
            'name' => 'Lomba Sains',
            'deskripsi' => 'Kompetisi sains tingkat sekolah',
            'category' => 'daring',
            'level' => 'smp',
            'start_date' => '2026-12-01',
            'end_date' => '2026-12-10',
            'poster' => 'poster.png',
            'slug' => 'lomba-sains',
            'price' => 0,
        ]);

        $this->patchJson("/api/events/{$event->id}", ['start_date' => '2026-12-11'])
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['end_date']);
    }
}
