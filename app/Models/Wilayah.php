<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Wilayah
 * @package App\Models
 * @version April 15, 2022, 1:57 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $bts
 * @property string $nama
 * @property boolean $level
 * @property integer $id_parent
 * @property string $created_by
 * @property string $edited_by
 * @property string|\Carbon\Carbon $edited_at
 */
class Wilayah extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'wilayah';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nama',
        'level',
        'id_parent',
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
        'level' => 'integer',
        'id_parent' => 'integer',
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
        'level' => 'required|integer',
        'id_parent' => 'nullable',
        'created_by' => 'nullable|string|max:255',
        'created_at' => 'required',
        'edited_by' => 'nullable|string|max:255',
        'edited_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function bts()
    {
        return $this->hasMany(\App\Models\Bt::class, 'id_wilayah');
    }
}
