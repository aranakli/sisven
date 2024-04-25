<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected function casts(): array
    {
        return[
            'email'=>'string', 'first_name'=>'string',
            'last_name'=>'string', 'address'=>'string',
    ];
    }
}
