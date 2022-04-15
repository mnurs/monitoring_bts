<?php

namespace App\Repositories;

use App\Models\Foto;
use App\Repositories\BaseRepository;

/**
 * Class FotoRepository
 * @package App\Repositories
 * @version April 15, 2022, 1:53 pm UTC
*/

class FotoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_bts',
        'path_foto',
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
        return Foto::class;
    }
}
