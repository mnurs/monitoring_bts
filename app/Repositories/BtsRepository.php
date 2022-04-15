<?php

namespace App\Repositories;

use App\Models\Bts;
use App\Repositories\BaseRepository;

/**
 * Class BtsRepository
 * @package App\Repositories
 * @version April 15, 2022, 1:47 pm UTC
*/

class BtsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_user_pic',
        'id_pemilik',
        'id_wilayah',
        'id_jenis_bts',
        'nama',
        'alamat',
        'latitude',
        'longitude',
        'tinggi_tower',
        'panjang_tanah',
        'lebar_tanah',
        'ada_genset',
        'ada_tembok_batas',
        'created_by',
        'edited_by',
        'edited_at'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Bts::class;
    }
}
