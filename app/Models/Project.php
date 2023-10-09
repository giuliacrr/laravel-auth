<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = "projects";

    protected $casts = [
        "publication_time"=>"date"
    ];

    protected $fillable = [ 
        "slug",
        "name",
        "image",
        "url",
        "description",
        "publication_time",
    ];
}
