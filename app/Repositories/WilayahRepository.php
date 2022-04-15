<?php

namespace App\Repositories;

use App\Models\Wilayah;
use App\Repositories\BaseRepository;

/**
 * Class WilayahRepository
 * @package App\Repositories
 * @version April 15, 2022, 1:35 pm UTC
*/

class WilayahRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'level',
        'id_parent',
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
        return Wilayah::class;
    }
}
