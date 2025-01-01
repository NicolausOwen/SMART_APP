<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClassesResource;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use App\Models\Classes;
use App\Models\guidebook;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    
    public function index(Request $request) {

        $studentQuery = Student::query();

        $this->applySearch($studentQuery, $request->search);
        
        $students = StudentResource::collection(
            $studentQuery->paginate(10));

        return inertia('Admin/Students/Index', [
            'students' => $students,
            'search' => $request->search ?? '',
        ]);
    }

    protected function applySearch($query, $search)
    {
        return $query->when($search, function ($query, $search) {
            $query->where('name', 'like', '%' . $search . '%')->orWhere('email', 'like', '%' . $search . '%' );
        });
    }

    public function create() {
        // $classes = ClassesResource::collection(Classes::all());
        
        return inertia('Admin/Students/Create', [ 
            // 'classes' => $classes
        ]);
    }

    public function store(StoreStudentRequest $request)
    {
        Student::create($request->validated());

        return redirect()->route('students.index');
    }

    public function edit(Student $student)
    {
        // $classes = ClassesResource::collection(Classes::all());

        return inertia('Admin/Students/Edit', [
            'student' => StudentResource::make($student),
            // 'classes' => $classes
        ]);
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        if ($request->has('status')) {
            $student->status = $request->status;
        }
        
        $student->update($request->validated());

        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index');
    }

    public function panduan(Request $request){

        $check = guidebook::exists() ? 'not null' : 'null';

        $request->validate([
            'guidebook' => 'required|file|mimes:pdf,doc,docx',
        ]);
    
        
        $file = $request->file('guidebook');
        $destinationPath = public_path('storage/guidebooks');
        $fileName = $file->getClientOriginalName();
    
        
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }
    
        
        $file->move($destinationPath, $fileName);
    
        if ($check === 'not null') {
            
            $firstGuidebook = guidebook::first();
            $firstGuidebook->update([
                'guidebook' => "guidebooks/{$fileName}",
            ]);
    
            return redirect()->back()->with('success', 'Guidebook updated successfully!');
        } else {
           
            guidebook::create([
                'guidebook' => "guidebooks/{$fileName}",
            ]);
    
            return redirect()->back()->with('success', 'Guidebook uploaded successfully!');
        }

    }
    
}
