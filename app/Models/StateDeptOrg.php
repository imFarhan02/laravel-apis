<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StateDeptOrg extends Model
{
    use HasFactory;

    // Define the table name (optional if it follows naming conventions)
    protected $table = 'state_dept_orgs';

    // Define the primary key (optional if it's 'id')
    protected $primaryKey = 'id';

    // If the primary key is not auto-incrementing
    public $incrementing = true;

    // If you're using timestamps for created_at and updated_at columns
    public $timestamps = true;

    // Define the fillable fields (the ones that can be mass assigned)
    protected $fillable = [
        'alias',
        'app_logo_id',
        'capital',
        'code',
        'created_by_id',
        'description',
        'dist_url',
        'document_id',
        'holiday_redirection',
        'holidays_url',
        'icon_id',
        'igod_id',
        'img_id',
        'lgd_code',
        'locale',
        'published_at',
        'review_comment',
        's_3_waas_title',
        'state_or_ut',
        'title',
        'updated_by_id',
        'url',
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

    public function helplineContacts()    // Relation with `HelplineContact`
    {
        return $this->belongsToMany(
            HelplineContact::class,            // The related model
            'helpline_contacts_state_ut_lnk',  // The pivot table
            'state_dept_org_id',               // Foreign key on the pivot table for the StateDeptOrg model
            'helpline_contact_id'              // Foreign key on the pivot table for the HelplineContact model
        );
    }
}