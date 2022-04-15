<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Jenis;

class JenisApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_jenis()
    {
        $jenis = Jenis::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/jenis', $jenis
        );

        $this->assertApiResponse($jenis);
    }

    /**
     * @test
     */
    public function test_read_jenis()
    {
        $jenis = Jenis::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/jenis/'.$jenis->id
        );

        $this->assertApiResponse($jenis->toArray());
    }

    /**
     * @test
     */
    public function test_update_jenis()
    {
        $jenis = Jenis::factory()->create();
        $editedJenis = Jenis::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/jenis/'.$jenis->id,
            $editedJenis
        );

        $this->assertApiResponse($editedJenis);
    }

    /**
     * @test
     */
    public function test_delete_jenis()
    {
        $jenis = Jenis::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/jenis/'.$jenis->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/jenis/'.$jenis->id
        );

        $this->response->assertStatus(404);
    }
}
