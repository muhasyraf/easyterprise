<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QualityControl extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const STATUS_SELECT = [
        'Rejected'  => 'Rejected',
        'Qualified' => 'Qualified',
    ];

    public $table = 'quality_controls';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id_quality_control',
        'id_production_monitoring_id',
        'qty',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function idQualityControlTransferProduks()
    {
        return $this->hasMany(TransferProduk::class, 'id_quality_control_id', 'id');
    }

    public function id_production_monitoring()
    {
        return $this->belongsTo(ProductionMonitoring::class, 'id_production_monitoring_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
