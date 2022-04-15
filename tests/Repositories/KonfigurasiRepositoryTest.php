<?php namespace Tests\Repositories;

use App\Models\Konfigurasi;
use App\Repositories\KonfigurasiRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class KonfigurasiRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var KonfigurasiRepository
     */
    protected $konfigurasiRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->konfigurasiRepo = \App::make(KonfigurasiRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_konfigurasi()
    {
        $konfigurasi = Konfigurasi::factory()->make()->toArray();

        $createdKonfigurasi = $this->konfigurasiRepo->create($konfigurasi);

        $createdKonfigurasi = $createdKonfigurasi->toArray();
        $this->assertArrayHasKey('id', $createdKonfigurasi);
        $this->assertNotNull($createdKonfigurasi['id'], 'Created Konfigurasi must have id specified');
        $this->assertNotNull(Konfigurasi::find($createdKonfigurasi['id']), 'Konfigurasi with given id must be in DB');
        $this->assertModelData($konfigurasi, $createdKonfigurasi);
    }

    /**
     * @test read
     */
    public function test_read_konfigurasi()
    {
        $konfigurasi = Konfigurasi::factory()->create();

        $dbKonfigurasi = $this->konfigurasiRepo->find($konfigurasi->id);

        $dbKonfigurasi = $dbKonfigurasi->toArray();
        $this->assertModelData($konfigurasi->toArray(), $dbKonfigurasi);
    }

    /**
     * @test update
     */
    public function test_update_konfigurasi()
    {
        $konfigurasi = Konfigurasi::factory()->create();
        $fakeKonfigurasi = Konfigurasi::factory()->make()->toArray();

        $updatedKonfigurasi = $this->konfigurasiRepo->update($fakeKonfigurasi, $konfigurasi->id);

        $this->assertModelData($fakeKonfigurasi, $updatedKonfigurasi->toArray());
        $dbKonfigurasi = $this->konfigurasiRepo->find($konfigurasi->id);
        $this->assertModelData($fakeKonfigurasi, $dbKonfigurasi->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_konfigurasi()
    {
        $konfigurasi = Konfigurasi::factory()->create();

        $resp = $this->konfigurasiRepo->delete($konfigurasi->id);

        $this->assertTrue($resp);
        $this->assertNull(Konfigurasi::find($konfigurasi->id), 'Konfigurasi should not exist in DB');
    }
}
