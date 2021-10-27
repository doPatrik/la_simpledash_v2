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
 * @property Collection|ProviderAddress address
 */
class Provider extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_provider';

    protected $fillable = [
        'name', 'account_number', 'owner_name', 'label', 'color_code', 'id_address'
    ];

    public function address()
    {
        return $this->hasOne(ProviderAddress::class, 'id_address', 'id_address');
    }
}
