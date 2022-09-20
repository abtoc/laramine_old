<?php

namespace App\Models;

use App\Enums\ProjectStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use Kyslik\ColumnSortable\Sortable;

class Project extends Model
{
    use HasFactory, NodeTrait, Sortable;

    protected $fillable = [
        'name',
        'description',
        'identifer',
        'status',
        'inherit_members',
        'parent_id',
    ];

    protected $hidden = [
        '__lft',
        '__rgt',
    ];

    protected $casts = [
        'status' => ProjectStatus::class,
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public $sortable = [
        'name',
        'identifer',
        'created_at',
    ];

    public function members() { return $this->hasMany(Member::class); }
}
