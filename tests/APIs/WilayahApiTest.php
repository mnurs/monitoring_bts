<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Wilayah;

class WilayahApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_wilayah()
    {
        $wilayah = Wilayah::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/wilayahs', $wilayah
        );

        $this->assertApiResponse($wilayah);
    }

    /**
     * @test
     */
    public function test_read_wilayah()
    {
        $wilayah = Wilayah::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/wilayahs/'.$wilayah->id
        );

        $this->assertApiResponse($wilayah->toArray());
    }

    /**
     * @test
     */
    public function test_update_wilayah()
    {
        $wilayah = Wilayah::factory()->create();
        $editedWilayah = Wilayah::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/wilayahs/'.$wilayah->id,
            $editedWilayah
        );

        $this->assertApiResponse($editedWilayah);
    }

    /**
     * @test
     */
    public function test_delete_wilayah()
    {
        $wilayah = Wilayah::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/wilayahs/'.$wilayah->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/wilayahs/'.$wilayah->id
        );

        $this->response->assertStatus(404);
    }
}
