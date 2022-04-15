<?php

namespace App\Repositories;

use App\Models\Pemilik;
use App\Repositories\BaseRepository;

/**
 * Class PemilikRepository
 * @package App\Repositories
 * @version April 15, 2022, 1:34 pm UTC
*/

class PemilikRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'alamat',
        'telepon',
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
        return Pemilik::class;
    }
}
