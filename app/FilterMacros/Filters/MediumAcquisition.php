<?php


namespace App\FilterMacros\Filters;


use Illuminate\Database\Eloquent\Builder;

class MediumAcquisition
{
    public static function apply(Builder $builder, $value)
    {
        return $builder->where('patients.medium_acquisition', 'like', '%' . $value . '%');
    }
}
