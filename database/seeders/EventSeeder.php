<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Event; // Pastikan model Event sudah dibuat

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tambahkan kode untuk mengisi tabel events dengan data awal
        Event::create([
            'title' => 'Web Design 1.01',
            'description' => 'Miliki skill desain web yang dibutuhkan untuk bersaing di industri digital.',
            'location' => 'Online | Live Zoom',
            'date' => '2025-12-12',
            'start_time' => '08:00:00',
            'end_time' => '17:00:00',
            'quota' => 100,
            'price' => 500000,
            'image' => 'event1.jpg',
        ]);

        Event::create([
            'title' => 'Seni Dalam Mengolah Pikiran',
            'description' => 'Pelajari cara mengelola pikiran dan emosi untuk mencapai kesejahteraan mental.',
            'location' => 'Online | Live Zoom',
            'date' => '2025-12-13',
            'start_time' => '08:00:00',
            'end_time' => '17:00:00',
            'quota' => 100,
            'price' => 0,
            'image' => 'event2.jpg',
        ]);

        Event::create([
            'title' => 'Online Broadcast & Advert Scheme',
            'description' => 'Pelajari cara efektif untuk mempromosikan produkmu secara online.',
            'location' => 'Online | Live Zoom',
            'date' => '2025-12-14',
            'start_time' => '08:00:00',
            'end_time' => '17:00:00',
            'quota' => 100,
            'price' => 300000,
            'image' => 'event3.jpg',
        ]);
    }
}
