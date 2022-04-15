<?php namespace Tests\Repositories;

use App\Models\Kuesioner;
use App\Repositories\KuesionerRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class KuesionerRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var KuesionerRepository
     */
    protected $kuesionerRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->kuesionerRepo = \App::make(KuesionerRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_kuesioner()
    {
        $kuesioner = Kuesioner::factory()->make()->toArray();

        $createdKuesioner = $this->kuesionerRepo->create($kuesioner);

        $createdKuesioner = $createdKuesioner->toArray();
        $this->assertArrayHasKey('id', $createdKuesioner);
        $this->assertNotNull($createdKuesioner['id'], 'Created Kuesioner must have id specified');
        $this->assertNotNull(Kuesioner::find($createdKuesioner['id']), 'Kuesioner with given id must be in DB');
        $this->assertModelData($kuesioner, $createdKuesioner);
    }

    /**
     * @test read
     */
    public function test_read_kuesioner()
    {
        $kuesioner = Kuesioner::factory()->create();

        $dbKuesioner = $this->kuesionerRepo->find($kuesioner->id);

        $dbKuesioner = $dbKuesioner->toArray();
        $this->assertModelData($kuesioner->toArray(), $dbKuesioner);
    }

    /**
     * @test update
     */
    public function test_update_kuesioner()
    {
        $kuesioner = Kuesioner::factory()->create();
        $fakeKuesioner = Kuesioner::factory()->make()->toArray();

        $updatedKuesioner = $this->kuesionerRepo->update($fakeKuesioner, $kuesioner->id);

        $this->assertModelData($fakeKuesioner, $updatedKuesioner->toArray());
        $dbKuesioner = $this->kuesionerRepo->find($kuesioner->id);
        $this->assertModelData($fakeKuesioner, $dbKuesioner->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_kuesioner()
    {
        $kuesioner = Kuesioner::factory()->create();

        $resp = $this->kuesionerRepo->delete($kuesioner->id);

        $this->assertTrue($resp);
        $this->assertNull(Kuesioner::find($kuesioner->id), 'Kuesioner should not exist in DB');
    }
}
