<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProviderAddress
 * @package App\Models
 * @property string zip_code
 * @property string city
 * @property string address
 * @property Collection|Provider provider
 */
class ProviderAddress extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_address';

    protected $fillable = [
        'zip_code', 'city', 'address',
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class, 'id_address', 'id_address');
    }
}
