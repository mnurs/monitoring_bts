<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Kuesioner
 * @package App\Models
 * @version April 15, 2022, 1:56 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $kuesionerJawabans
 * @property string $jawaban
 * @property string $created_by
 * @property string $edited_by
 * @property string|\Carbon\Carbon $edited_at
 */
class Kuesioner extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'kuesioner';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'edited_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'pertanyaan',
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
        'pertanyaan' => 'string',
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
        'jawaban' => 'required|string',
        'created_by' => 'nullable|string|max:255',
        'created_at' => 'required',
        'edited_by' => 'nullable|string|max:255',
        'edited_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function kuesionerJawabans()
    {
        return $this->hasMany(\App\Models\KuesionerJawaban::class, 'id_kuesioner');
    }

    public function kuesionerPilihans()
    {
        return $this->hasMany(\App\Models\KuesionerPilihan::class, 'id_kuesioner');
    }
}
