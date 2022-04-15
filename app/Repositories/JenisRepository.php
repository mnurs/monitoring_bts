<?php

namespace App\Repositories;

use App\Models\Jenis;
use App\Repositories\BaseRepository;

/**
 * Class JenisRepository
 * @package App\Repositories
 * @version April 15, 2022, 1:30 pm UTC
*/

class JenisRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
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
        return Jenis::class;
    }
}
