<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mapel extends Model
{
    use HasFactory;
    protected $guarded = [''];

    public function jenismapel()
    {
    	return $this->belongsTo(jenismapel::class);
    }
}
