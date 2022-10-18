<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;//test

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class accounts extends Model
{
    use HasFactory;
    protected $table="account";

}
