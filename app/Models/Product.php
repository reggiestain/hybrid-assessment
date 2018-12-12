<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\ProductCategory;

class Product extends Model {

    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'product_category_id', 'description', 'price', 'discount',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product_category() {
        return $this->belongsTo(ProductCategory::class);
    }

}
