<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelplineContact extends Model
{
    use HasFactory;

    // Define the table name (optional if it follows naming conventions)
    protected $table = 'helpline_contacts';

    // Define the primary key (optional if it's 'id')
    protected $primaryKey = 'id';

    // If the primary key is not auto-incrementing
    public $incrementing = true;

    // If you're using timestamps for created_at and updated_at columns
    public $timestamps = true;

    // Define the fillable fields (the ones that can be mass assigned)
    protected $fillable = [
        'alias',
        'contact',
        'created_by_id',
        'document_id',
        'icon_id',
        'locale',
        'owner',
        'published_at',
        'review_comment',
        'subtitle',
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

    // Many-to-many relationship with `HelplineType`
    public function helplineTypes()
    {
        return $this->belongsToMany(HelplineType::class, 'helpline_contacts_helpline_type_lnk', 'helpline_contact_id', 'helpline_type_id');
    }

    // Many-to-many relationship with `StateDeptOrg`
    public function stateDeptOrgs()
    {
        return $this->belongsToMany(StateDeptOrg::class, 'helpline_contacts_state_ut_lnk', 'helpline_contact_id', 'state_dept_org_id');
    }
}