<?php

namespace App\Repositories;

use App\Models\Kondisi;
use App\Repositories\BaseRepository;

/**
 * Class KondisiRepository
 * @package App\Repositories
 * @version April 15, 2022, 1:31 pm UTC
*/

class KondisiRepository extends BaseRepository
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
        return Kondisi::class;
    }
}
