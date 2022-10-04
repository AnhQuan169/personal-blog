<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $fillable = [
        'title',
        'parent_id',
        'description',
        'status',
        'order_by'
    ];

    protected $table = 'categories';

    public function parent()
    {
        return $this->belongsTo(Category::class);
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function post()
    {
        return $this->hasMany(Post::class);
    }
    
}
