<?php

namespace App\Repositories;

use App\Models\Kuesioner;
use App\Repositories\BaseRepository;

/**
 * Class KuesionerRepository
 * @package App\Repositories
 * @version April 15, 2022, 1:56 pm UTC
*/

class KuesionerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return Kuesioner::class;
    }
}
