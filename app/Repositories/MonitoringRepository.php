<?php

namespace App\Repositories;

use App\Models\Monitoring;
use App\Repositories\BaseRepository;

/**
 * Class MonitoringRepository
 * @package App\Repositories
 * @version April 15, 2022, 1:33 pm UTC
*/

class MonitoringRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_bts',
        'id_kondisi_bts',
        'id_user_surveyor',
        'tgl_generate',
        'tgl_kunjungan',
        'tahun',
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
        return Monitoring::class;
    }
}
