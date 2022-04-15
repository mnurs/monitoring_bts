<?php namespace Tests\Repositories;

use App\Models\Kondisi;
use App\Repositories\KondisiRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class KondisiRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var KondisiRepository
     */
    protected $kondisiRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->kondisiRepo = \App::make(KondisiRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_kondisi()
    {
        $kondisi = Kondisi::factory()->make()->toArray();

        $createdKondisi = $this->kondisiRepo->create($kondisi);

        $createdKondisi = $createdKondisi->toArray();
        $this->assertArrayHasKey('id', $createdKondisi);
        $this->assertNotNull($createdKondisi['id'], 'Created Kondisi must have id specified');
        $this->assertNotNull(Kondisi::find($createdKondisi['id']), 'Kondisi with given id must be in DB');
        $this->assertModelData($kondisi, $createdKondisi);
    }

    /**
     * @test read
     */
    public function test_read_kondisi()
    {
        $kondisi = Kondisi::factory()->create();

        $dbKondisi = $this->kondisiRepo->find($kondisi->id);

        $dbKondisi = $dbKondisi->toArray();
        $this->assertModelData($kondisi->toArray(), $dbKondisi);
    }

    /**
     * @test update
     */
    public function test_update_kondisi()
    {
        $kondisi = Kondisi::factory()->create();
        $fakeKondisi = Kondisi::factory()->make()->toArray();

        $updatedKondisi = $this->kondisiRepo->update($fakeKondisi, $kondisi->id);

        $this->assertModelData($fakeKondisi, $updatedKondisi->toArray());
        $dbKondisi = $this->kondisiRepo->find($kondisi->id);
        $this->assertModelData($fakeKondisi, $dbKondisi->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_kondisi()
    {
        $kondisi = Kondisi::factory()->create();

        $resp = $this->kondisiRepo->delete($kondisi->id);

        $this->assertTrue($resp);
        $this->assertNull(Kondisi::find($kondisi->id), 'Kondisi should not exist in DB');
    }
}
