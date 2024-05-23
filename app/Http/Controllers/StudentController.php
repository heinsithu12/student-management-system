<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Student;
use Egulias\EmailValidator\Result\Reason\Reason;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse as HttpFoundationRedirectResponse;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $students = Student::all();
        return view ('students.index')->with('students',$students);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'name' => ['required'],
            'address' => 'required',
            'mobile' => ['required']
        ],
        [
            'name.required' => 'နာမည်ဖြည့်ရန်လိုအပ်သည်။',
            'address.required' => 'လိပ်စာဖြည့်ရန်လိုအပ်သည်။',
            'mobile.required' => 'ဖုန်းနံပတ်ဖြည့်ရန်လိုအပ်သည်။',
        ]
    );

        Student::create($data);
        return redirect(route('students.index'))->with('flash_message', 'Student Addedd!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $students = Student::find($id);
        return view('students.show')->with('students', $students);
     }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $students = Student::find($id);
        return view('students.edit')->with('students', $students);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {

        $student = Student::find($id);
        $input = $request->all();
        $student->update($input);
        return redirect(route('students.index'))->with('flash_message', 'students Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Student::where('id',$id)->firstOrFail()->delete();

        return redirect()->route('students.index')->with('success', 'Data delete successful');
    }
}
