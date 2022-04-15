<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Monitoring;

class MonitoringApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_monitoring()
    {
        $monitoring = Monitoring::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/monitorings', $monitoring
        );

        $this->assertApiResponse($monitoring);
    }

    /**
     * @test
     */
    public function test_read_monitoring()
    {
        $monitoring = Monitoring::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/monitorings/'.$monitoring->id
        );

        $this->assertApiResponse($monitoring->toArray());
    }

    /**
     * @test
     */
    public function test_update_monitoring()
    {
        $monitoring = Monitoring::factory()->create();
        $editedMonitoring = Monitoring::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/monitorings/'.$monitoring->id,
            $editedMonitoring
        );

        $this->assertApiResponse($editedMonitoring);
    }

    /**
     * @test
     */
    public function test_delete_monitoring()
    {
        $monitoring = Monitoring::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/monitorings/'.$monitoring->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/monitorings/'.$monitoring->id
        );

        $this->response->assertStatus(404);
    }
}
