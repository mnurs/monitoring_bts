<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Monitoring
 * @package App\Models
 * @version April 15, 2022, 1:57 pm UTC
 *
 * @property \App\Models\Bt $idBts
 * @property \App\Models\Kondisi $idKondisiBts
 * @property \App\Models\User $idUserSurveyor
 * @property \Illuminate\Database\Eloquent\Collection $kuesionerJawabans
 * @property integer $id_bts
 * @property integer $id_kondisi_bts
 * @property integer $id_user_surveyor
 * @property string $tgl_generate
 * @property string $tgl_kunjungan
 * @property integer $tahun
 * @property string $created_by
 * @property string $edited_by
 * @property string|\Carbon\Carbon $edited_at
 */
class Monitoring extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'monitoring';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'edited_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_bts' => 'integer',
        'id_kondisi_bts' => 'integer',
        'id_user_surveyor' => 'integer',
        'tgl_generate' => 'date',
        'tgl_kunjungan' => 'date',
        'tahun' => 'integer',
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
        'id_bts' => 'required|integer',
        'id_kondisi_bts' => 'nullable|integer',
        'id_user_surveyor' => 'nullable',
        'tgl_generate' => 'required',
        'tgl_kunjungan' => 'nullable',
        'tahun' => 'nullable|integer',
        'created_by' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'edited_by' => 'nullable|string|max:255',
        'edited_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idBts()
    {
        return $this->belongsTo(\App\Models\Bts::class, 'id_bts');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idKondisiBts()
    {
        return $this->belongsTo(\App\Models\Kondisi::class, 'id_kondisi_bts');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idUserSurveyor()
    {
        return $this->belongsTo(\App\Models\User::class, 'id_user_surveyor');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function kuesionerJawabans()
    {
        return $this->hasMany(\App\Models\KuesionerJawaban::class, 'id_monitoring');
    }
}
