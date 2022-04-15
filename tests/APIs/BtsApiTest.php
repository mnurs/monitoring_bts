<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Bts;

class BtsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_bts()
    {
        $bts = Bts::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/bts', $bts
        );

        $this->assertApiResponse($bts);
    }

    /**
     * @test
     */
    public function test_read_bts()
    {
        $bts = Bts::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/bts/'.$bts->id
        );

        $this->assertApiResponse($bts->toArray());
    }

    /**
     * @test
     */
    public function test_update_bts()
    {
        $bts = Bts::factory()->create();
        $editedBts = Bts::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/bts/'.$bts->id,
            $editedBts
        );

        $this->assertApiResponse($editedBts);
    }

    /**
     * @test
     */
    public function test_delete_bts()
    {
        $bts = Bts::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/bts/'.$bts->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/bts/'.$bts->id
        );

        $this->response->assertStatus(404);
    }
}
