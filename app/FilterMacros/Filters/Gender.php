<?php


namespace App\FilterMacros\Filters;


use Illuminate\Database\Eloquent\Builder;

class Gender
{
    public static function apply(Builder $builder, $value)
    {
        return $builder->where('users.gender', $value);
    }
}
