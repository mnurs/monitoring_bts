<?php namespace Tests\Repositories;

use App\Models\Jenis;
use App\Repositories\JenisRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class JenisRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var JenisRepository
     */
    protected $jenisRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->jenisRepo = \App::make(JenisRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_jenis()
    {
        $jenis = Jenis::factory()->make()->toArray();

        $createdJenis = $this->jenisRepo->create($jenis);

        $createdJenis = $createdJenis->toArray();
        $this->assertArrayHasKey('id', $createdJenis);
        $this->assertNotNull($createdJenis['id'], 'Created Jenis must have id specified');
        $this->assertNotNull(Jenis::find($createdJenis['id']), 'Jenis with given id must be in DB');
        $this->assertModelData($jenis, $createdJenis);
    }

    /**
     * @test read
     */
    public function test_read_jenis()
    {
        $jenis = Jenis::factory()->create();

        $dbJenis = $this->jenisRepo->find($jenis->id);

        $dbJenis = $dbJenis->toArray();
        $this->assertModelData($jenis->toArray(), $dbJenis);
    }

    /**
     * @test update
     */
    public function test_update_jenis()
    {
        $jenis = Jenis::factory()->create();
        $fakeJenis = Jenis::factory()->make()->toArray();

        $updatedJenis = $this->jenisRepo->update($fakeJenis, $jenis->id);

        $this->assertModelData($fakeJenis, $updatedJenis->toArray());
        $dbJenis = $this->jenisRepo->find($jenis->id);
        $this->assertModelData($fakeJenis, $dbJenis->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_jenis()
    {
        $jenis = Jenis::factory()->create();

        $resp = $this->jenisRepo->delete($jenis->id);

        $this->assertTrue($resp);
        $this->assertNull(Jenis::find($jenis->id), 'Jenis should not exist in DB');
    }
}
