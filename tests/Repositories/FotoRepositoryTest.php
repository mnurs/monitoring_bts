<?php namespace Tests\Repositories;

use App\Models\Foto;
use App\Repositories\FotoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class FotoRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var FotoRepository
     */
    protected $fotoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->fotoRepo = \App::make(FotoRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_foto()
    {
        $foto = Foto::factory()->make()->toArray();

        $createdFoto = $this->fotoRepo->create($foto);

        $createdFoto = $createdFoto->toArray();
        $this->assertArrayHasKey('id', $createdFoto);
        $this->assertNotNull($createdFoto['id'], 'Created Foto must have id specified');
        $this->assertNotNull(Foto::find($createdFoto['id']), 'Foto with given id must be in DB');
        $this->assertModelData($foto, $createdFoto);
    }

    /**
     * @test read
     */
    public function test_read_foto()
    {
        $foto = Foto::factory()->create();

        $dbFoto = $this->fotoRepo->find($foto->id);

        $dbFoto = $dbFoto->toArray();
        $this->assertModelData($foto->toArray(), $dbFoto);
    }

    /**
     * @test update
     */
    public function test_update_foto()
    {
        $foto = Foto::factory()->create();
        $fakeFoto = Foto::factory()->make()->toArray();

        $updatedFoto = $this->fotoRepo->update($fakeFoto, $foto->id);

        $this->assertModelData($fakeFoto, $updatedFoto->toArray());
        $dbFoto = $this->fotoRepo->find($foto->id);
        $this->assertModelData($fakeFoto, $dbFoto->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_foto()
    {
        $foto = Foto::factory()->create();

        $resp = $this->fotoRepo->delete($foto->id);

        $this->assertTrue($resp);
        $this->assertNull(Foto::find($foto->id), 'Foto should not exist in DB');
    }
}
