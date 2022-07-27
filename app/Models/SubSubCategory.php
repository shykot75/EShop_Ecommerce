<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'subsubcategory_name_en',
        'subcategory_name_ban',
        'subsubcategory_slug_en',
        'subsubcategory_slug_ban',
    ];

    public function categoryByName(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function subCategoryByName(){
        return $this->belongsTo(SubCategory::class, 'subcategory_id', 'id');
    }






}
