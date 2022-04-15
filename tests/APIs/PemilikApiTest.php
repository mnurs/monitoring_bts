<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Pemilik;

class PemilikApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_pemilik()
    {
        $pemilik = Pemilik::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/pemiliks', $pemilik
        );

        $this->assertApiResponse($pemilik);
    }

    /**
     * @test
     */
    public function test_read_pemilik()
    {
        $pemilik = Pemilik::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/pemiliks/'.$pemilik->id
        );

        $this->assertApiResponse($pemilik->toArray());
    }

    /**
     * @test
     */
    public function test_update_pemilik()
    {
        $pemilik = Pemilik::factory()->create();
        $editedPemilik = Pemilik::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/pemiliks/'.$pemilik->id,
            $editedPemilik
        );

        $this->assertApiResponse($editedPemilik);
    }

    /**
     * @test
     */
    public function test_delete_pemilik()
    {
        $pemilik = Pemilik::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/pemiliks/'.$pemilik->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/pemiliks/'.$pemilik->id
        );

        $this->response->assertStatus(404);
    }
}
