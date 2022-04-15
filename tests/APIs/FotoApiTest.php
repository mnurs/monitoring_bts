<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Foto;

class FotoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_foto()
    {
        $foto = Foto::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/fotos', $foto
        );

        $this->assertApiResponse($foto);
    }

    /**
     * @test
     */
    public function test_read_foto()
    {
        $foto = Foto::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/fotos/'.$foto->id
        );

        $this->assertApiResponse($foto->toArray());
    }

    /**
     * @test
     */
    public function test_update_foto()
    {
        $foto = Foto::factory()->create();
        $editedFoto = Foto::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/fotos/'.$foto->id,
            $editedFoto
        );

        $this->assertApiResponse($editedFoto);
    }

    /**
     * @test
     */
    public function test_delete_foto()
    {
        $foto = Foto::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/fotos/'.$foto->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/fotos/'.$foto->id
        );

        $this->response->assertStatus(404);
    }
}
