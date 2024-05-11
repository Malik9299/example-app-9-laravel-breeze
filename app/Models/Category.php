<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'is_active'];

    public function categoryNumber()
    {
        return $this->hasOne(CategoryNumber::class);
    }
    public function subCategory()
    {
        return $this->hasMany(SubCategory::class);

        // return $this->hasMany(SubCategory::class, 'category_column_id', 'id');
    }
}
