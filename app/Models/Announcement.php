<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'begin_date',
        'end_date'
    ];

    public function document() {
        return $this->belongsTo(Document::class);
    }

    public function attachments() {
        return $this->hasMany(Attachment::class);
    }

}
