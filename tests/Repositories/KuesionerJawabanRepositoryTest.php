<?php namespace Tests\Repositories;

use App\Models\KuesionerJawaban;
use App\Repositories\KuesionerJawabanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class KuesionerJawabanRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var KuesionerJawabanRepository
     */
    protected $kuesionerJawabanRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->kuesionerJawabanRepo = \App::make(KuesionerJawabanRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_kuesioner_jawaban()
    {
        $kuesionerJawaban = KuesionerJawaban::factory()->make()->toArray();

        $createdKuesionerJawaban = $this->kuesionerJawabanRepo->create($kuesionerJawaban);

        $createdKuesionerJawaban = $createdKuesionerJawaban->toArray();
        $this->assertArrayHasKey('id', $createdKuesionerJawaban);
        $this->assertNotNull($createdKuesionerJawaban['id'], 'Created KuesionerJawaban must have id specified');
        $this->assertNotNull(KuesionerJawaban::find($createdKuesionerJawaban['id']), 'KuesionerJawaban with given id must be in DB');
        $this->assertModelData($kuesionerJawaban, $createdKuesionerJawaban);
    }

    /**
     * @test read
     */
    public function test_read_kuesioner_jawaban()
    {
        $kuesionerJawaban = KuesionerJawaban::factory()->create();

        $dbKuesionerJawaban = $this->kuesionerJawabanRepo->find($kuesionerJawaban->id);

        $dbKuesionerJawaban = $dbKuesionerJawaban->toArray();
        $this->assertModelData($kuesionerJawaban->toArray(), $dbKuesionerJawaban);
    }

    /**
     * @test update
     */
    public function test_update_kuesioner_jawaban()
    {
        $kuesionerJawaban = KuesionerJawaban::factory()->create();
        $fakeKuesionerJawaban = KuesionerJawaban::factory()->make()->toArray();

        $updatedKuesionerJawaban = $this->kuesionerJawabanRepo->update($fakeKuesionerJawaban, $kuesionerJawaban->id);

        $this->assertModelData($fakeKuesionerJawaban, $updatedKuesionerJawaban->toArray());
        $dbKuesionerJawaban = $this->kuesionerJawabanRepo->find($kuesionerJawaban->id);
        $this->assertModelData($fakeKuesionerJawaban, $dbKuesionerJawaban->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_kuesioner_jawaban()
    {
        $kuesionerJawaban = KuesionerJawaban::factory()->create();

        $resp = $this->kuesionerJawabanRepo->delete($kuesionerJawaban->id);

        $this->assertTrue($resp);
        $this->assertNull(KuesionerJawaban::find($kuesionerJawaban->id), 'KuesionerJawaban should not exist in DB');
    }
}
