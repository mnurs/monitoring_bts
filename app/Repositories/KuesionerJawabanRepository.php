<?php

namespace App\Repositories;

use App\Models\KuesionerJawaban;
use App\Repositories\BaseRepository;

/**
 * Class KuesionerJawabanRepository
 * @package App\Repositories
 * @version April 15, 2022, 1:32 pm UTC
*/

class KuesionerJawabanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_monitoring',
        'id_kuesioner',
        'jawaban',
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
        return KuesionerJawaban::class;
    }
}
