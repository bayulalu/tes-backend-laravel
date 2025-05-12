<?php


namespace App\FilterMacros\Filters;


use Illuminate\Database\Eloquent\Builder;

class IdType
{
    public static function apply(Builder $builder, $value)
    {
        return $builder->where('users.id_type',  'like', '%' . $value . '%');
    }
}
