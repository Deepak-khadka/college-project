<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Kathford\Lib\Status;

class Category extends Model
{

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'parent_id', 'level', 'banner', 'icon', 'order',
        'status', 'seo_title', 'seo_description', 'created_by', 'is_shown', 'slug'
    ];

    /**
     * @return BelongsTo
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function subCategory(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id')->where('status', '=', Status::ACTIVE);
    }

    public function  parentCategory(): BelongsTo
    {
        return $this->belongsTo(Category::class,  'parent_id')->where('status', '=', Status::ACTIVE);
    }

}
