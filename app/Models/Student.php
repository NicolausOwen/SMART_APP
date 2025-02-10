<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'email', 
        'class_id', 
        'section_id', 
        'birthplace', 
        'birthdate', 
        'address',
        'phone',
        'parent',
        'parentjob',
        'user_id',
        'quran',
        'pendapatan',
        'tes_iq',
        'tes_masuk',
        'score_quran',
        'score_pendapatan',
        'score_prestasi',
        'status'
     ];

    protected $with = ['class', 'section'];

    public function class() {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function section() {
        return $this->belongsTo(Section::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function prestasi(){
        return $this->belongsTo(Prestasi::class, 'prestasi_id');
    }

    public function prestasis(){
        return $this->hasMany(Prestasi::class, 'student_id');
    }
    


}
