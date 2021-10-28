<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Provider
 * @package App\Models
 * @property string name
 * @property string account_number
 * @property string owner_name
 * @property string label
 * @property string color_code
 * @property integer id_address
 * @property integer id_user
 * @property Collection|ProviderAddress address
 * @property Collection|Bill[] bills
 * @property Collection|User user
 */
class Provider extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_provider';

    protected $fillable = [
        'name', 'account_number', 'owner_name', 'label', 'color_code', 'id_address', 'id_user'
    ];

    public function address()
    {
        return $this->hasOne(ProviderAddress::class, 'id_address', 'id_address');
    }

    public function bills()
    {
        return $this->hasMany(Bill::class, 'id_provider', 'id_provider');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
