<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = ['title','tags','company','location','email','website','description'];

    public function scopeFilter($query,$filters){
        if(isset($filters['tag'])){
            return $query->where('tags','like','%'.$filters['tag'].'%');
        }
        if(isset($filters['search'])){
            return $query->where('title','like','%'.$filters['search'].'%')
            ->orwhere('description','like','%'.$filters['search'].'%')
            ->orwhere('tags','like','%'.$filters['search'].'%')
            ->orwhere('location','like','%'.$filters['search'].'%')
            ->orwhere('company','like','%'.$filters['search'].'%');
        }
    }
}
