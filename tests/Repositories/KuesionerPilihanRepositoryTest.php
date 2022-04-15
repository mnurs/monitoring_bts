<?php namespace Tests\Repositories;

use App\Models\KuesionerPilihan;
use App\Repositories\KuesionerPilihanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class KuesionerPilihanRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var KuesionerPilihanRepository
     */
    protected $kuesionerPilihanRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->kuesionerPilihanRepo = \App::make(KuesionerPilihanRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_kuesioner_pilihan()
    {
        $kuesionerPilihan = KuesionerPilihan::factory()->make()->toArray();

        $createdKuesionerPilihan = $this->kuesionerPilihanRepo->create($kuesionerPilihan);

        $createdKuesionerPilihan = $createdKuesionerPilihan->toArray();
        $this->assertArrayHasKey('id', $createdKuesionerPilihan);
        $this->assertNotNull($createdKuesionerPilihan['id'], 'Created KuesionerPilihan must have id specified');
        $this->assertNotNull(KuesionerPilihan::find($createdKuesionerPilihan['id']), 'KuesionerPilihan with given id must be in DB');
        $this->assertModelData($kuesionerPilihan, $createdKuesionerPilihan);
    }

    /**
     * @test read
     */
    public function test_read_kuesioner_pilihan()
    {
        $kuesionerPilihan = KuesionerPilihan::factory()->create();

        $dbKuesionerPilihan = $this->kuesionerPilihanRepo->find($kuesionerPilihan->id);

        $dbKuesionerPilihan = $dbKuesionerPilihan->toArray();
        $this->assertModelData($kuesionerPilihan->toArray(), $dbKuesionerPilihan);
    }

    /**
     * @test update
     */
    public function test_update_kuesioner_pilihan()
    {
        $kuesionerPilihan = KuesionerPilihan::factory()->create();
        $fakeKuesionerPilihan = KuesionerPilihan::factory()->make()->toArray();

        $updatedKuesionerPilihan = $this->kuesionerPilihanRepo->update($fakeKuesionerPilihan, $kuesionerPilihan->id);

        $this->assertModelData($fakeKuesionerPilihan, $updatedKuesionerPilihan->toArray());
        $dbKuesionerPilihan = $this->kuesionerPilihanRepo->find($kuesionerPilihan->id);
        $this->assertModelData($fakeKuesionerPilihan, $dbKuesionerPilihan->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_kuesioner_pilihan()
    {
        $kuesionerPilihan = KuesionerPilihan::factory()->create();

        $resp = $this->kuesionerPilihanRepo->delete($kuesionerPilihan->id);

        $this->assertTrue($resp);
        $this->assertNull(KuesionerPilihan::find($kuesionerPilihan->id), 'KuesionerPilihan should not exist in DB');
    }
}
