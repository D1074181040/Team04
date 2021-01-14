<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cards extends Model
{
    use HasFactory;
    protected $fillable=[
        'n_ID',
        'p_time',
        'status',
        'created_at',
        'updated_at'
    ];
    public function residents()
    {
        return $this->belongsTo('App\Models\residents','id');
    }
    public function scopeEnter($query)
    {
        $query->where('status','=','進入')
            ->select
            (
                'cards.id',
                'cards.n_ID',
                'cards.p_time',
                'cards.status',
            )
        ;
    }
    public function scopeAllNid($query)
    {
        $query->select('n_ID');
    }

}
