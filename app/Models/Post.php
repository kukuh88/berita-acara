<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory , Sluggable;

    //properti yang boleh diisi dalam array yang lainnya tidak boleh diisi
    // protected $fillable = ['title', 'excerpt', 'body'];

    //kebalikan dari yang atas
    //properti "id" tidak boleh di isi sisanya boleh
    protected $guarded = ['id'];
    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters)
    {

        // versi isset
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where(function($query) use ($search) {
                 $query->where('title', 'like', '%' . $search . '%')
                        ->orWhere('body', 'like', '%' . $search . '%');
             });
         });

        //  ketika di jalanan kan ada sesuai method yaitu category (versi callback)
         $query->when($filters['category'] ?? false, function($query, $category){
            return $query->whereHas('category' , function($query) use ($category){
                $query->where('slug', $category);
            });
         });

        //  versi erofunction
        $query->when($filters['author'] ?? false, fn($query, $author) =>
        $query->whereHas('author', fn($query)=>
         $query->where('username', $author)
            )
        );
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // slug untuk gabungin
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}

