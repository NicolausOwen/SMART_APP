<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClassesResource;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use App\Models\Classes;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentController extends Controller
{

    public function index()
    {

        if (Auth::check()) {

            $user = Auth::user();
            
            $userData = User::where('id', $user->id)->firstOrFail();

            // Ambil data siswa berdasarkan `user_id`
            $student = Student::where('user_id', $user->id)->first();

            if ($student) {

                if ($student  && $student -> has_submitted ) {
                    return redirect('/dashboard')->with('failed', 'Anda sudah mengisi form ini');  
                }
    
                return Inertia::render("Pendaftaran", [
                    'user_id' => $user->id,
                    'id' => $student->id ?? null,
                    'name' => $student->name,
                    'birthplace' => $student->birthplace,
                    'birthdate' => $student->birthdate,
                    'address' => $student->address,
                    'phone' => $student->phone,
                    'email' => $student->email,
                    'parent' => $student->parent,
                    'parentjob' => $student->parentjob
                ]);
            }

            return Inertia::render("Pendaftaran", [
                'user_id' => $user->id,
                'id' => $student->id ?? null,
                'name' => '',
                'birthplace' => '',
                'birthdate' => '',
                'address' => '',
                'phone' => '',
                'email' => '',
                'parent' => '',
                'parentjob' => ''
            ]);
        }

        // $user = Auth::user();

        // return Inertia::render("Pendaftaran", [
        //     'user_id' => $user->id,
        // ]);
        return redirect("/");
    }
    public function editBio()
    {

        if (Auth::check()) {

            $user = Auth::user();
            
            $userData = User::where('id', $user->id)->firstOrFail();

            // Ambil data siswa berdasarkan `user_id`
            $student = Student::where('user_id', $user->id)->first();

            if ($student) {

                // if ($student  && $student -> has_submitted ) {
                //     return redirect('/dashboard')->with('failed', 'Anda sudah mengisi form ini');  
                // }
    
                return Inertia::render("EditBiodata", [
                    'user_id' => $user->id,
                    'id' => $student->id,
                    'name' => $student->name,
                    'birthplace' => $student->birthplace,
                    'birthdate' => $student->birthdate,
                    'address' => $student->address,
                    'phone' => $student->phone,
                    'email' => $student->email,
                    'parent' => $student->parent,
                    'parentjob' => $student->parentjob
                ]);
            }

            return Inertia::render("EditBiodata", [
                'user_id' => $user->id,
                'id' => $student->id,
                'name' => '',
                'birthplace' => '',
                'birthdate' => '',
                'address' => '',
                'phone' => '',
                'email' => '',
                'parent' => '',
                'parentjob' => ''
            ]);
        }

        // $user = Auth::user();

        // return Inertia::render("Pendaftaran", [
        //     'user_id' => $user->id,
        // ]);
        return redirect("/");
    }
    public function indexquran()
    {

        if (Auth::check()) {

            $userid = Auth::user()->id;

            $student = Student::where('user_id', $userid)->first();

            if ($student  && $student -> has_submitted ) {
                return redirect('/dashboard')->with('failed', 'Anda sudah mengisi form ini');  
            }

            return Inertia::render("Pendaftaran2", [
                'user_id' => $userid,
                'score' => $student->score
            ]);
        }

        return redirect("/");
    }
    public function indexpendapatan()
    {

        if (Auth::check()) {

            $userid = Auth::user()->id;

            $student = Student::where('user_id', $userid)->first();

            if ($student  && $student -> has_submitted ) {
                return redirect('/dashboard')->with('failed', 'Anda sudah mengisi form ini');  
            }

            return Inertia::render("Pendaftaran4", [
                'user_id' => $userid,
                'score' => $student->score
            ]);
        }

        return redirect("/");
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|string|max:255",
            "birthplace" => "required|string|max:255",
            "birthdate" => "required|string|max:255",
            "address" => "required|string|max:255",
            "phone" => "required|string|max:255",
            "email" => "required|string|max:255",
            "parent" => "required|string|max:255",
            "parentjob" => "required|string|max:255",
            "user_id" => "required",
        ]);

        Student::create($validated);
        return redirect()->back()->with('success', 'Student updated successfully');
    }

    public function update(Request $request)
    {
        $userId = Auth::user()->id;

        $validated = $request->validate([
            "name" => "required|string|max:255",
            "birthplace" => "required|string|max:255",
            "birthdate" => "required|string|max:255",
            "address" => "required|string|max:255",
            "phone" => "required|string|max:255",
            "email" => "required|string|email|max:255|unique:students,email," . $userId . ",user_id",
            "parent" => "required|string|max:255",
            "parentjob" => "required|string|max:255",
            "user_id" => "required|integer",
        ]);


        $record = Student::where('user_id', $userId)->firstOrFail();

        $record->update($validated);

        return redirect('/dashboard')->with('success', 'Profile updated successfully.');
    }

    public function updatequran(Request $request)
    {
        $validated = $request->validate([
            'quran' => 'required',
        ]);

        $userid = Auth::user()->id;

        $record = Student::where('user_id', $userid)->firstOrFail();

        // Tetapkan nilai score berdasarkan input Quran
        $quranScore = match ($validated['quran']) {
            'Sangat Fasih' => 100,
            'Fasih' => 80,
            'Cukup Fasih' => 60,
            'Kurang Fasih' => 40,
            'Tidak Bisa Baca' => 20,
            default => 0,
        };

        $record->update([
            'quran' => $validated['quran'],
            'score_quran' => $quranScore,
        ]);

        return redirect('/dashboard')->with('success', 'Data Quran berhasil diperbarui.');
    }

    public function updatependapatan(Request $request)
    {
        $validated = $request->validate([
            'pendapatan' => 'required',
        ]);

        $userid = Auth::user()->id;

        $record = Student::where('user_id', $userid)->firstOrFail();

        $pendapatanScore = match ($validated['pendapatan']) {
            '>= Rp4.000.000' => 100,
            'Rp3.000.000-Rp3.900.000' => 80,
            'Rp2.000.000-Rp2.900.000' => 60,
            'Rp1.900.000-Rp1.000.000' => 40,
            '< Rp1.000.000' => 20,
            default => 0,
        };

        $record->update([
            'pendapatan' => $validated['pendapatan'],
            'score_pendapatan' => $pendapatanScore,
        ]);

        return redirect('/dashboard')->with('success', 'Data pendapatan berhasil diperbarui.');
    }

}
