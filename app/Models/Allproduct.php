<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allproduct extends Model
{
    use HasFactory;
    
    protected $fillable = ['category', 'name', 'description', 'price', 'size', 'color', 'quantity', 'image'];

    public function scopeFilter($query, array $filters) {

        if($filters['search'] ?? false){
            $query->where('name', 'like', '%' . request('search') . '%')
            ->orWhere('description', 'like', '%' . request('search') . '%')
            ->orWhere('category', 'like', '%' . request('search') . '%')
            ->orWhere('color', 'like', '%' . request('search') . '%')
            ->orWhere('price', 'like', '%' . request('search') . '%')
            ->orWhere('size', 'like', '%' . request('search') . '%');

        }
    }
}
