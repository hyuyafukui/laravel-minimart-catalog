<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;



class SectionController extends Controller
{
    private $section;

    public function __construct(Section $section)
    {
        $this->section = $section;
    }

    public function index()
    {
        $all_sections = $this->section->oldest()->get();
        return view('sections.index')
            ->with('all_sections', $all_sections);
    }

    public function store(Request $request)
    {
        #Validate the request
        $request->validate([
            'name' => 'required|min:1|max:50',
        ]);

        #Save the request to the database
        // $this->section->user_id = Auth::user()->id;
        #owner of the section = user who is logged in
        $this->section->name = ucwords(strtolower($request->name));
        $this->section->save();

        return redirect()->route('section.index');

    }

    public function destroy($id)
    {
        $this->section->destroy($id);

        return redirect()->back();

    }
}
