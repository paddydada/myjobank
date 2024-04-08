<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\job;


class applied extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function job()
    {
        return $this->belongsTo(job::class, 'job_id', 'id');
    }

}
