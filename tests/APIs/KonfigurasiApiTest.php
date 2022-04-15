<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Konfigurasi;

class KonfigurasiApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_konfigurasi()
    {
        $konfigurasi = Konfigurasi::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/konfigurasis', $konfigurasi
        );

        $this->assertApiResponse($konfigurasi);
    }

    /**
     * @test
     */
    public function test_read_konfigurasi()
    {
        $konfigurasi = Konfigurasi::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/konfigurasis/'.$konfigurasi->id
        );

        $this->assertApiResponse($konfigurasi->toArray());
    }

    /**
     * @test
     */
    public function test_update_konfigurasi()
    {
        $konfigurasi = Konfigurasi::factory()->create();
        $editedKonfigurasi = Konfigurasi::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/konfigurasis/'.$konfigurasi->id,
            $editedKonfigurasi
        );

        $this->assertApiResponse($editedKonfigurasi);
    }

    /**
     * @test
     */
    public function test_delete_konfigurasi()
    {
        $konfigurasi = Konfigurasi::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/konfigurasis/'.$konfigurasi->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/konfigurasis/'.$konfigurasi->id
        );

        $this->response->assertStatus(404);
    }
}
