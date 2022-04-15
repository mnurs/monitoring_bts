<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\KuesionerPilihan;

class KuesionerPilihanApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_kuesioner_pilihan()
    {
        $kuesionerPilihan = KuesionerPilihan::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/kuesioner_pilihans', $kuesionerPilihan
        );

        $this->assertApiResponse($kuesionerPilihan);
    }

    /**
     * @test
     */
    public function test_read_kuesioner_pilihan()
    {
        $kuesionerPilihan = KuesionerPilihan::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/kuesioner_pilihans/'.$kuesionerPilihan->id
        );

        $this->assertApiResponse($kuesionerPilihan->toArray());
    }

    /**
     * @test
     */
    public function test_update_kuesioner_pilihan()
    {
        $kuesionerPilihan = KuesionerPilihan::factory()->create();
        $editedKuesionerPilihan = KuesionerPilihan::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/kuesioner_pilihans/'.$kuesionerPilihan->id,
            $editedKuesionerPilihan
        );

        $this->assertApiResponse($editedKuesionerPilihan);
    }

    /**
     * @test
     */
    public function test_delete_kuesioner_pilihan()
    {
        $kuesionerPilihan = KuesionerPilihan::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/kuesioner_pilihans/'.$kuesionerPilihan->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/kuesioner_pilihans/'.$kuesionerPilihan->id
        );

        $this->response->assertStatus(404);
    }
}
