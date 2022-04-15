<?php namespace Tests\Repositories;

use App\Models\Pemilik;
use App\Repositories\PemilikRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PemilikRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PemilikRepository
     */
    protected $pemilikRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->pemilikRepo = \App::make(PemilikRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_pemilik()
    {
        $pemilik = Pemilik::factory()->make()->toArray();

        $createdPemilik = $this->pemilikRepo->create($pemilik);

        $createdPemilik = $createdPemilik->toArray();
        $this->assertArrayHasKey('id', $createdPemilik);
        $this->assertNotNull($createdPemilik['id'], 'Created Pemilik must have id specified');
        $this->assertNotNull(Pemilik::find($createdPemilik['id']), 'Pemilik with given id must be in DB');
        $this->assertModelData($pemilik, $createdPemilik);
    }

    /**
     * @test read
     */
    public function test_read_pemilik()
    {
        $pemilik = Pemilik::factory()->create();

        $dbPemilik = $this->pemilikRepo->find($pemilik->id);

        $dbPemilik = $dbPemilik->toArray();
        $this->assertModelData($pemilik->toArray(), $dbPemilik);
    }

    /**
     * @test update
     */
    public function test_update_pemilik()
    {
        $pemilik = Pemilik::factory()->create();
        $fakePemilik = Pemilik::factory()->make()->toArray();

        $updatedPemilik = $this->pemilikRepo->update($fakePemilik, $pemilik->id);

        $this->assertModelData($fakePemilik, $updatedPemilik->toArray());
        $dbPemilik = $this->pemilikRepo->find($pemilik->id);
        $this->assertModelData($fakePemilik, $dbPemilik->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_pemilik()
    {
        $pemilik = Pemilik::factory()->create();

        $resp = $this->pemilikRepo->delete($pemilik->id);

        $this->assertTrue($resp);
        $this->assertNull(Pemilik::find($pemilik->id), 'Pemilik should not exist in DB');
    }
}
