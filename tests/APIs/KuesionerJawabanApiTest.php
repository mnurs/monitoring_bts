<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\KuesionerJawaban;

class KuesionerJawabanApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_kuesioner_jawaban()
    {
        $kuesionerJawaban = KuesionerJawaban::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/kuesioner_jawabans', $kuesionerJawaban
        );

        $this->assertApiResponse($kuesionerJawaban);
    }

    /**
     * @test
     */
    public function test_read_kuesioner_jawaban()
    {
        $kuesionerJawaban = KuesionerJawaban::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/kuesioner_jawabans/'.$kuesionerJawaban->id
        );

        $this->assertApiResponse($kuesionerJawaban->toArray());
    }

    /**
     * @test
     */
    public function test_update_kuesioner_jawaban()
    {
        $kuesionerJawaban = KuesionerJawaban::factory()->create();
        $editedKuesionerJawaban = KuesionerJawaban::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/kuesioner_jawabans/'.$kuesionerJawaban->id,
            $editedKuesionerJawaban
        );

        $this->assertApiResponse($editedKuesionerJawaban);
    }

    /**
     * @test
     */
    public function test_delete_kuesioner_jawaban()
    {
        $kuesionerJawaban = KuesionerJawaban::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/kuesioner_jawabans/'.$kuesionerJawaban->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/kuesioner_jawabans/'.$kuesionerJawaban->id
        );

        $this->response->assertStatus(404);
    }
}
