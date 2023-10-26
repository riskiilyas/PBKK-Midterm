<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Condition;
use App\Models\ItemType;

class Item extends Model
{
    use HasFactory;

    protected $table = 'item';

    protected $fillable = [
        'name',
        'desc',
        'amount',
        'img',
        'condition_id',
        'type_id'
    ];

    public function condition()
    {
        return $this->belongsTo(Condition::class, 'condition_id');
    }

    public function type()
    {
        return $this->belongsTo(ItemType::class, 'type_id');
    }
}
