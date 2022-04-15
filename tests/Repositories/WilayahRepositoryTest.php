<?php namespace Tests\Repositories;

use App\Models\Wilayah;
use App\Repositories\WilayahRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class WilayahRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var WilayahRepository
     */
    protected $wilayahRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->wilayahRepo = \App::make(WilayahRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_wilayah()
    {
        $wilayah = Wilayah::factory()->make()->toArray();

        $createdWilayah = $this->wilayahRepo->create($wilayah);

        $createdWilayah = $createdWilayah->toArray();
        $this->assertArrayHasKey('id', $createdWilayah);
        $this->assertNotNull($createdWilayah['id'], 'Created Wilayah must have id specified');
        $this->assertNotNull(Wilayah::find($createdWilayah['id']), 'Wilayah with given id must be in DB');
        $this->assertModelData($wilayah, $createdWilayah);
    }

    /**
     * @test read
     */
    public function test_read_wilayah()
    {
        $wilayah = Wilayah::factory()->create();

        $dbWilayah = $this->wilayahRepo->find($wilayah->id);

        $dbWilayah = $dbWilayah->toArray();
        $this->assertModelData($wilayah->toArray(), $dbWilayah);
    }

    /**
     * @test update
     */
    public function test_update_wilayah()
    {
        $wilayah = Wilayah::factory()->create();
        $fakeWilayah = Wilayah::factory()->make()->toArray();

        $updatedWilayah = $this->wilayahRepo->update($fakeWilayah, $wilayah->id);

        $this->assertModelData($fakeWilayah, $updatedWilayah->toArray());
        $dbWilayah = $this->wilayahRepo->find($wilayah->id);
        $this->assertModelData($fakeWilayah, $dbWilayah->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_wilayah()
    {
        $wilayah = Wilayah::factory()->create();

        $resp = $this->wilayahRepo->delete($wilayah->id);

        $this->assertTrue($resp);
        $this->assertNull(Wilayah::find($wilayah->id), 'Wilayah should not exist in DB');
    }
}
