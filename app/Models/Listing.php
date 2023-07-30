<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','title','logo','tags','company','location','email','website','description'];

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

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
