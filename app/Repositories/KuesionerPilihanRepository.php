<?php

namespace App\Repositories;

use App\Models\KuesionerPilihan;
use App\Repositories\BaseRepository;

/**
 * Class KuesionerPilihanRepository
 * @package App\Repositories
 * @version April 15, 2022, 1:33 pm UTC
*/

class KuesionerPilihanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_kuesioner',
        'pilihan_jawaban',
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
        return KuesionerPilihan::class;
    }
}
