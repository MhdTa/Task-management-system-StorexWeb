<?php

namespace App\Models;
use App\Models\CheckList;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    public function checkList()
    {
    return $this->belongsTo(CheckList::class);

    }
}
