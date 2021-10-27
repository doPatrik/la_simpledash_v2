<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProviderAddress
 * @package App\Models
 * @property string zip_code
 * @property string city
 * @property string address
 */
class ProviderAddress extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_address';

    protected $fillable = [
        'zip_code', 'city', 'address',
    ];
}
