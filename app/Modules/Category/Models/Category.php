<?php

namespace App\Modules\Category\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    const CREATED_AT = 'createdDate';

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'active',
        'description',
        'type'
    ];
}
