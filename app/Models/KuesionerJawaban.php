<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class KuesionerJawaban
 * @package App\Models
 * @version April 15, 2022, 1:56 pm UTC
 *
 * @property \App\Models\Kuesioner $idKuesioner
 * @property \App\Models\KuesionerPilihan $jawaban
 * @property \App\Models\Monitoring $idMonitoring
 * @property integer $id_monitoring
 * @property integer $id_kuesioner
 * @property integer $jawaban
 * @property string $created_by
 * @property string $edited_by
 * @property string|\Carbon\Carbon $edited_at
 */
class KuesionerJawaban extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'kuesioner_jawaban';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_monitoring',
        'id_kuesioner',
        'jawaban',
        'created_by',
        'edited_by',
        'edited_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_monitoring' => 'integer',
        'id_kuesioner' => 'integer',
        'jawaban' => 'integer',
        'created_by' => 'string',
        'edited_by' => 'string',
        'edited_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_monitoring' => 'required|integer',
        'id_kuesioner' => 'required|integer',
        'jawaban' => 'required|integer',
        'created_by' => 'nullable|string|max:255',
        'created_at' => 'required',
        'edited_by' => 'nullable|string|max:255',
        'edited_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idKuesioner()
    {
        return $this->belongsTo(\App\Models\Kuesioner::class, 'id_kuesioner');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function jawaban()
    {
        return $this->belongsTo(\App\Models\KuesionerPilihan::class, 'jawaban');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idMonitoring()
    {
        return $this->belongsTo(\App\Models\Monitoring::class, 'id_monitoring');
    }
}
