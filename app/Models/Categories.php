<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = "category_groups"; //table name
    protected $fillable = [
        'alias',
        'bg_1_id',
        'bg_1_url',
        'bg_2_id',
        'bg_2_url',
        'bg_3_id',
        'bg_3_url',
        'bg_4_id',
        'bg_4_url',
        'bg_color_1',
        'bg_color_2',
        'bg_color_3',
        'color_grad_1',
        'color_grad_2',
        'created_by_id',
        'description',
        'document_id',
        'icon_id',
        'icon_url',
        'is_show_homepage',
        'locale',
        'parent_cat_id',
        'published_at',
        'review_comment',
        'tags',
        'title',
        'updated_by_id',
        'workflow_status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'published_at' => 'datetime',
        'is_show_homepage' => 'boolean',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array<int, string>
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'published_at',
    ];

    /**
     * Get the background colors for the category group.
     */
    public function getBackgroundColorsAttribute()
    {
        return [
            'bg_color_1' => $this->bg_color_1,
            'bg_color_2' => $this->bg_color_2,
            'bg_color_3' => $this->bg_color_3,
        ];
    }

    /**
     * Get the background images for the category group.
     */
    public function getBackgroundUrlsAttribute()
    {
        return [
            'bg_1_url' => $this->bg_1_url,
            'bg_2_url' => $this->bg_2_url,
            'bg_3_url' => $this->bg_3_url,
            'bg_4_url' => $this->bg_4_url,
        ];
    }
}
