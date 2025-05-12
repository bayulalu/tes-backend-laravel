<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class ApiClients extends Model
{
    use HasUuids;
    protected $table = 'api_clients';

    protected $fillable = [
        'application_name',
        'access_key'
    ];
}
