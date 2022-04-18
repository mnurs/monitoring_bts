<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Jenis
 * @package App\Models
 * @version April 15, 2022, 1:54 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $bts
 * @property string $nama
 * @property string $created_by
 * @property string $edited_by
 * @property string|\Carbon\Carbon $edited_at
 */
class Jenis extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'jenis';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'edited_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nama',
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
        'nama' => 'string',
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
        'nama' => 'required|string|max:255',
        'created_by' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'edited_by' => 'nullable|string|max:255',
        'edited_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function bts()
    {
        return $this->hasMany(\App\Models\Bt::class, 'id_jenis_bts');
    }
}
