<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConstitutionOfIndia extends Model
{
    use HasFactory;

    // Define the table name explicitly if it's not the pluralized form of the model name
    protected $table = 'constitution_of_indias';

    // Define the primary key for the table
    protected $primaryKey = 'id';

    // Specify if the primary key is auto-incrementing
    public $incrementing = true;

    // Specify the data type of the primary key
    protected $keyType = 'int';

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'alias',
        'banner_id',
        'created_by_id',
        'description',
        'document_id',
        'locale',
        'published_at',
        'review_comment',
        'title',
        'updated_by_id',
        'url',
        'url_text',
        'workflow_status',
    ];

    // Define any attributes that should be cast to specific data types
    protected $casts = [
        'banner_id' => 'integer',
        'created_by_id' => 'integer',
        'updated_by_id' => 'integer',
        'published_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Define default attributes if necessary
    protected $attributes = [
        'workflow_status' => 'draft', // Example default value for workflow_status
    ];
}
