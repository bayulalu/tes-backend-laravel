<?php


namespace App\FilterMacros\Filters;


use Illuminate\Database\Eloquent\Builder;

class IdNo
{
    public static function apply(Builder $builder, $value)
    {
        return $builder->where('users.id_no',  'like', '%' . $value . '%');
    }
}
