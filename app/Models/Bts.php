<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Bts
 * @package App\Models
 * @version April 15, 2022, 1:47 pm UTC
 *
 * @property \App\Models\Jeni $idJenisBts
 * @property \App\Models\Pemilik $idPemilik
 * @property \App\Models\User $idUserPic
 * @property \App\Models\Wilayah $idWilayah
 * @property \Illuminate\Database\Eloquent\Collection $fotos
 * @property \Illuminate\Database\Eloquent\Collection $monitorings
 * @property integer $id_user_pic
 * @property integer $id_pemilik
 * @property integer $id_wilayah
 * @property integer $id_jenis_bts
 * @property string $nama
 * @property string $alamat
 * @property number $latitude
 * @property number $longitude
 * @property integer $tinggi_tower
 * @property integer $panjang_tanah
 * @property integer $lebar_tanah
 * @property boolean $ada_genset
 * @property boolean $ada_tembok_batas
 * @property string $created_by
 * @property string $edited_by
 * @property string|\Carbon\Carbon $edited_at
 */
class Bts extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'bts';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_user_pic',
        'id_pemilik',
        'id_wilayah',
        'id_jenis_bts',
        'nama',
        'alamat',
        'latitude',
        'longitude',
        'tinggi_tower',
        'panjang_tanah',
        'lebar_tanah',
        'ada_genset',
        'ada_tembok_batas',
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
        'id_user_pic' => 'integer',
        'id_pemilik' => 'integer',
        'id_wilayah' => 'integer',
        'id_jenis_bts' => 'integer',
        'nama' => 'string',
        'alamat' => 'string',
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
        'tinggi_tower' => 'integer',
        'panjang_tanah' => 'integer',
        'lebar_tanah' => 'integer',
        'ada_genset' => 'boolean',
        'ada_tembok_batas' => 'boolean',
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
        'id_user_pic' => 'required',
        'id_pemilik' => 'required|integer',
        'id_wilayah' => 'required',
        'id_jenis_bts' => 'required|integer',
        'nama' => 'required|string|max:255',
        'alamat' => 'required|string',
        'latitude' => 'required|numeric',
        'longitude' => 'required|numeric',
        'tinggi_tower' => 'required|integer',
        'panjang_tanah' => 'required|integer',
        'lebar_tanah' => 'required|integer',
        'ada_genset' => 'required|boolean',
        'ada_tembok_batas' => 'required|boolean',
        'created_by' => 'nullable|string|max:255',
        'created_at' => 'required',
        'edited_by' => 'nullable|string|max:255',
        'edited_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idJenisBts()
    {
        return $this->belongsTo(\App\Models\Jeni::class, 'id_jenis_bts');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idPemilik()
    {
        return $this->belongsTo(\App\Models\Pemilik::class, 'id_pemilik');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idUserPic()
    {
        return $this->belongsTo(\App\Models\User::class, 'id_user_pic');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idWilayah()
    {
        return $this->belongsTo(\App\Models\Wilayah::class, 'id_wilayah');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function fotos()
    {
        return $this->hasMany(\App\Models\Foto::class, 'id_bts');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function monitorings()
    {
        return $this->hasMany(\App\Models\Monitoring::class, 'id_bts');
    }
}
