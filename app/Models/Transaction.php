<?php

namespace App\Models;

use App\Models\Type;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    // protected $fillable = ['title','amount','type','payment','used','invoice'];
    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        // if(isset($filters['search']) ? $filters['search'] : false) {
        //     return $query->where('title','like','%' . $filters['search'] .'%');
        // }

        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('title','like','%' . $search .'%');
        });
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
