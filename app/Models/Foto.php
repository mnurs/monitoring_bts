<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Foto
 * @package App\Models
 * @version April 15, 2022, 1:30 pm UTC
 *
 * @property \App\Models\Bt $idBts
 * @property integer $id_bts
 * @property string $path_foto
 * @property string $created_by
 * @property string $edited_by
 * @property string|\Carbon\Carbon $edited_at
 */
class Foto extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'foto';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_bts',
        'path_foto',
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
        'path_foto' => 'string',
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
        'path_foto' => 'required|string',
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
        return $this->belongsTo(\App\Models\Bt::class, 'id_bts');
    }
}
