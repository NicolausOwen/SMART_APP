<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
   use HasFactory;

   protected $fillable = [
       'jenisPrestasi',
       'namaPrestasi',
       'tingkatPrestasi',
       'penyelenggara',
       'sertifikat',
       'student_id',
   ];

   public function users()
   {
       return $this->belongsTo(User::class, 'user_id');
   }
   public function student()
   {
       return $this->belongsTo(Student::class, 'student_id');
   }

   public function students(){
    return $this->hasMany(Student::class, 'prestasi_id');
}
}
