<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelplineType extends Model
{
    use HasFactory;

    // Define the table name (optional if it follows naming conventions)
    protected $table = 'helpline_types';

    // Define the primary key (optional if it's 'id')
    protected $primaryKey = 'id';

    // If the primary key is not auto-incrementing
    public $incrementing = true;

    // If you're using timestamps for created_at and updated_at columns
    public $timestamps = true;

    // Define the fillable fields (the ones that can be mass assigned)
    protected $fillable = [
        'alias',
        'created_by_id',
        'document_id',
        'icon_id',
        'locale',
        'published_at',
        'review_comment',
        'title',
        'updated_by_id',
        'workflow_status',
    ];

    // Define the hidden attributes (optional if you want to exclude from serialization)
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // Define the casting for certain attributes (e.g. dates, integers, etc.)
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'published_at' => 'datetime',
    ];

    // Define any relationships here (if applicable)

    // Example of a relationship (e.g. many-to-many with HelplineContact)
    public function helplineContacts()
    {
        return $this->belongsToMany(
            HelplineContact::class,                         // The related model
            'helpline_contacts_helpline_type_lnk',          // The pivot table
            'helpline_type_id',                             // Foreign key on the pivot table for the HelplineType model
            'helpline_contact_id'                           // Foreign key on the pivot table for the HelplineContact model
        );
    }
}