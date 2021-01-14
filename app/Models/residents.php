<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class residents extends Model
{
    use HasFactory;
    protected $fillable=[
        'n_ID',
        'p_name',
        'phone',
        'gender',
        'region',
        'floor',
        'created_at',
        'updated_at'
    ];
    public function card()
    {
        return $this->hasMany('App\Models\cards','n_ID','n_ID');
    }
    public function scopeMale($query)
    {
        $query->where('gender','=','男')
            ->orderby('residents.id')
            ->select
        (
                'residents.id',
                'residents.n_ID',
                'residents.p_name',
                'residents.phone',
                'residents.gender',
                'residents.region',
                'residents.floor'
            )
        ;
    }
    public function scopeFemale($query)
    {
        $query->where('gender','=','女')
            ->orderby('residents.id')
            ->select
            (
                'residents.id',
                'residents.n_ID',
                'residents.p_name',
                'residents.phone',
                'residents.gender',
                'residents.region',
                'residents.floor'
            )
        ;
    }

    public function scopeRegion($query,$reg)
    {
        $query->where('region','=',$reg)
            ->orderby('residents.id')
            ->select
            (
                'residents.id',
                'residents.n_ID',
                'residents.p_name',
                'residents.phone',
                'residents.gender',
                'residents.region',
                'residents.floor'
            );
    }
    public function scopeAllRegions($query)
    {
        $query->select('region')->groupBy('region');
    }
}
