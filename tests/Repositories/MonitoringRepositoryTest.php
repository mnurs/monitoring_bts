<?php namespace Tests\Repositories;

use App\Models\Monitoring;
use App\Repositories\MonitoringRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MonitoringRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MonitoringRepository
     */
    protected $monitoringRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->monitoringRepo = \App::make(MonitoringRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_monitoring()
    {
        $monitoring = Monitoring::factory()->make()->toArray();

        $createdMonitoring = $this->monitoringRepo->create($monitoring);

        $createdMonitoring = $createdMonitoring->toArray();
        $this->assertArrayHasKey('id', $createdMonitoring);
        $this->assertNotNull($createdMonitoring['id'], 'Created Monitoring must have id specified');
        $this->assertNotNull(Monitoring::find($createdMonitoring['id']), 'Monitoring with given id must be in DB');
        $this->assertModelData($monitoring, $createdMonitoring);
    }

    /**
     * @test read
     */
    public function test_read_monitoring()
    {
        $monitoring = Monitoring::factory()->create();

        $dbMonitoring = $this->monitoringRepo->find($monitoring->id);

        $dbMonitoring = $dbMonitoring->toArray();
        $this->assertModelData($monitoring->toArray(), $dbMonitoring);
    }

    /**
     * @test update
     */
    public function test_update_monitoring()
    {
        $monitoring = Monitoring::factory()->create();
        $fakeMonitoring = Monitoring::factory()->make()->toArray();

        $updatedMonitoring = $this->monitoringRepo->update($fakeMonitoring, $monitoring->id);

        $this->assertModelData($fakeMonitoring, $updatedMonitoring->toArray());
        $dbMonitoring = $this->monitoringRepo->find($monitoring->id);
        $this->assertModelData($fakeMonitoring, $dbMonitoring->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_monitoring()
    {
        $monitoring = Monitoring::factory()->create();

        $resp = $this->monitoringRepo->delete($monitoring->id);

        $this->assertTrue($resp);
        $this->assertNull(Monitoring::find($monitoring->id), 'Monitoring should not exist in DB');
    }
}
