<?php

namespace App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table= 'projects';

    protected $fillable = [
        'project_name',
        'latitude',
        'longitude',
        'description',
        'summary',
        'impacts',
        'advocacies_undertaken',
        'rights',
        'location',
        'budget',
        'affected_communities',
        'conflict_start',
        'government_actors',
        'advocacy_org',
        'relevant_link',
    ];
    


public function companies()
{
    return $this->belongsToMany(Companies::class, 'projects_company', 'project_id', 'company_id');
}

public function international_finances()
{
    return $this->belongsToMany(InternationalFinances::class, 'projects_finances', 'project_id', 'finance_id');
}


}
