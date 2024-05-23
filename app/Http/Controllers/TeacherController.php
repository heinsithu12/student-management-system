<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Teacher;
use Egulias\EmailValidator\Result\Reason\Reason;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse as HttpFoundationRedirectResponse;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $teachers =Teacher::all();
        return view ('teachers.index')->with('teachers',$teachers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('teachers.create');
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

        Teacher::create($data);
        return redirect(route('teachers.index'))->with('flash_message', 'Student Addedd!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $teachers = Teacher::find($id);
        return view('teachers.show')->with('teachers', $teachers);    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $teachers = Teacher::find($id);
        return view('teachers.edit')->with('teachers', $teachers);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {

        $Teacher = Teacher::find($id);
        $input = $request->all();
        $Teacher->update($input);
        return redirect(route('teachers.index'))->with('flash_message', 'Teachers Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Teacher::where('id',$id)->firstOrFail()->delete();

        return redirect()->route('teachers.index')->with('success', 'Data delete successful');
    }
}
