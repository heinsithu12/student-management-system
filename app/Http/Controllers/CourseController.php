<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Course;
use Egulias\EmailValidator\Result\Reason\Reason;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse as HttpFoundationRedirectResponse;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $courses = Course::all();
        return view ('courses.index')->with('courses',$courses);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request->all());
        $data = $request->validate([
            'name' => ['required'],
            'syllabus' => 'required',
            'duration' => ['required']
        ],
        [
            'name.required' => 'နာမည်ဖြည့်ရန်လိုအပ်သည်။',
            'syllabus.required' => 'လိပ်စာဖြည့်ရန်လိုအပ်သည်။',
            'duration.required' => 'ဖုန်းနံပတ်ဖြည့်ရန်လိုအပ်သည်။',
        ]
    );

        Course::create($data);
        return redirect(route('courses.index'))->with('flash_message', 'Student Addedd!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $courses = Course::find($id);
        return view('courses.show')->with('courses', $courses);    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $courses = Course::find($id);
        return view('courses.edit')->with('courses', $courses);    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $Course = Course::find($id);
        $input = $request->all();
        $Course->update($input);
        return redirect(route('courses.index'))->with('flash_message', 'courses Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Course::where('id',$id)->firstOrFail()->delete();

        return redirect()->route('courses.index')->with('success', 'Data delete successful');
    }
}


