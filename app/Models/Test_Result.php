<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test_Result extends Model
{
    use HasFactory;
    
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }



    protected $fillable = ['name','test_carriedout','test_result','comment','preview','result_date'];
}
