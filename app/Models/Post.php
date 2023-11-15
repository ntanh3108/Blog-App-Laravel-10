<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=[
        'title',
        'slug',
        'body',
        'image',
        'published_at',
        'featured',
        'user_id'
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function author(){
        return $this->belongsTo(User::class, "user_id");
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function scopePublished($query){
        $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeFeatured($query){
        $query->where('featured', true);
    }

    public function scopeWithCategory($query, string $category){
        $query->whereHas('categories', function ($query) use ($category) {
            $query->where('slug', $category);
        });
    }

    public function getExcerpt(){
        return \Illuminate\Support\Str::limit(strip_tags($this->body), 150);
    }

    public function getMinutes(){
        $min = round(str_word_count($this->body) / 250);

        return $min<1 ? 1 : $min;
    }

    public function getThumbnail(){
        $isUrl = str_contains($this->image, 'http');
        if ($isUrl) {
            return $this->image;
        } else {
            return asset('storage/'.$this->image);
        }
    }
}

