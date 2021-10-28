<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bill
 * @package App\Models
 * @property string start_date
 * @property string end_date
 * @property float price
 * @property string dead_line
 * @property boolean is_paid
 * @property integer id_provider
 */
class Bill extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_bill';

    protected $fillable = [
        'start_date', 'end_date', 'price',
        'dead_line', 'is_paid', 'id_provider'
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class, 'id_provider', 'id_provider');
    }
}
