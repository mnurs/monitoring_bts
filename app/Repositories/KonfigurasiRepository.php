<?php

namespace App\Repositories;

use App\Models\Konfigurasi;
use App\Repositories\BaseRepository;

/**
 * Class KonfigurasiRepository
 * @package App\Repositories
 * @version April 15, 2022, 1:55 pm UTC
*/

class KonfigurasiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'value',
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
        return Konfigurasi::class;
    }
}
