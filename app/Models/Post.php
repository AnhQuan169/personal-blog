<?php

namespace App\Models;

use Egulias\EmailValidator\Warning\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'description',
        'content',
        'viewed',
        'status',
        'image',
        'published_at'
    ];

    protected $table = 'posts';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    public function getViewedAttribute()
    {
        return number_format($this->attributes['viewed'], 0, ',', '.');
    }

    public function getDateFormatAttribute($date)
    {
        return date('d-m-Y', strtotime($this->attributes[$date]));
    }
}
