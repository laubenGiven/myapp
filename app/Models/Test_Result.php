<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test_Result extends Model
{
    use HasFactory;
    
    // public function patient()
    // {
    //     return $this->belongsTo(Patient::class);
    // }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'id');
    }

    protected $fillable = ['user_id','sname','lname','age','agecount','test_carriedout','image_upload','test_result','flag','range','comment','units','preview','result_date'];
}
