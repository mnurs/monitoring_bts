<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Kuesioner;

class KuesionerApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_kuesioner()
    {
        $kuesioner = Kuesioner::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/kuesioners', $kuesioner
        );

        $this->assertApiResponse($kuesioner);
    }

    /**
     * @test
     */
    public function test_read_kuesioner()
    {
        $kuesioner = Kuesioner::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/kuesioners/'.$kuesioner->id
        );

        $this->assertApiResponse($kuesioner->toArray());
    }

    /**
     * @test
     */
    public function test_update_kuesioner()
    {
        $kuesioner = Kuesioner::factory()->create();
        $editedKuesioner = Kuesioner::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/kuesioners/'.$kuesioner->id,
            $editedKuesioner
        );

        $this->assertApiResponse($editedKuesioner);
    }

    /**
     * @test
     */
    public function test_delete_kuesioner()
    {
        $kuesioner = Kuesioner::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/kuesioners/'.$kuesioner->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/kuesioners/'.$kuesioner->id
        );

        $this->response->assertStatus(404);
    }
}
