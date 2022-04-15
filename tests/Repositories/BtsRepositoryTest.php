<?php namespace Tests\Repositories;

use App\Models\Bts;
use App\Repositories\BtsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BtsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BtsRepository
     */
    protected $btsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->btsRepo = \App::make(BtsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_bts()
    {
        $bts = Bts::factory()->make()->toArray();

        $createdBts = $this->btsRepo->create($bts);

        $createdBts = $createdBts->toArray();
        $this->assertArrayHasKey('id', $createdBts);
        $this->assertNotNull($createdBts['id'], 'Created Bts must have id specified');
        $this->assertNotNull(Bts::find($createdBts['id']), 'Bts with given id must be in DB');
        $this->assertModelData($bts, $createdBts);
    }

    /**
     * @test read
     */
    public function test_read_bts()
    {
        $bts = Bts::factory()->create();

        $dbBts = $this->btsRepo->find($bts->id);

        $dbBts = $dbBts->toArray();
        $this->assertModelData($bts->toArray(), $dbBts);
    }

    /**
     * @test update
     */
    public function test_update_bts()
    {
        $bts = Bts::factory()->create();
        $fakeBts = Bts::factory()->make()->toArray();

        $updatedBts = $this->btsRepo->update($fakeBts, $bts->id);

        $this->assertModelData($fakeBts, $updatedBts->toArray());
        $dbBts = $this->btsRepo->find($bts->id);
        $this->assertModelData($fakeBts, $dbBts->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_bts()
    {
        $bts = Bts::factory()->create();

        $resp = $this->btsRepo->delete($bts->id);

        $this->assertTrue($resp);
        $this->assertNull(Bts::find($bts->id), 'Bts should not exist in DB');
    }
}
