<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserAddress
 * @package App\Models
 * @property string zip_code
 * @property string city
 * @property string address
 * @property integer id_user
 * @property User|Collection user
 */
class UserAddress extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_address';

    protected $fillable = [
        'zip_code', 'city', 'address', 'id_user',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
