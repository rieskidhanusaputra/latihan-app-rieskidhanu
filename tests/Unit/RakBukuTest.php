<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\RakBuku;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RakBukuTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     */
    public function test_create(): void
    {
        $data = [
            'nama' => 'Contoh Rak',
            'lokasi' => 'C01',
            'keterangan' => 'Ini Contoh Rak Buku',
        ];

        $response = $this->post('/rak_buku', $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('rak_bukus', $data);
    }

    public function test_show(): void
    {
        $rak_buku = RakBuku::factory()->create();
        $response = $this->get('/rak_buku/' . $rak_buku->id);
        $response->assertStatus(200)
            ->assertJson([
                'nama' => $rak_buku->nama,
                'lokasi' => $rak_buku->lokasi,
                'keterangan' => $rak_buku->keterangan,
            ]);
    }

    public function test_update(): void
    {
        $rak_buku = RakBuku::factory()->create();
        $data = [
            'nama' => 'RakBuku Baru',
            'lokasi' => 'CB01',
            'keterangan' => 'rak_buku telah diubah.',
        ];
        $response = $this->put('/rak_buku/' . $rak_buku->id, $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('rak_bukus', $data);
    }

    public function test_delete(): void
    {
        $rak_buku = RakBuku::factory()->create();
        $response = $this->delete('/rak_buku/' . $rak_buku->id);
        $response->assertStatus(204);
        $this->assertDatabaseMissing('rak_bukus', ['id' => $rak_buku->id]);
    }
}
