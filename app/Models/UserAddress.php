<?php

namespace App\Models;

use App\Models\Interfaces\ValidationInterface;
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
class UserAddress extends Model implements ValidationInterface
{
    use HasFactory;

    protected $primaryKey = 'id_address';

    protected $fillable = [
        'zip_code', 'city', 'address', 'id_user', 'street_number',
    ];

    public function getValidationRules() : array
    {
        return [
            'zip_code' => ['required', 'string', 'max:20'],
            'city' => ['required', 'string', 'max:60'],
            'address' => ['required', 'string', 'max:300'],
            'id_user' => ['required', 'string', 'exists:users,id'],
            'street_number' => ['required', 'string', 'max:10'],
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
