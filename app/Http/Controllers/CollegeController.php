<?php
namespace App\Http\Controllers;
use App\Models\College;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colleges = College::with('departments')->get(); // Eager load relationships
        return view('colleges.index', compact('colleges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('colleges.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'HOD_name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            College::create($request->all());
            return redirect()->route('colleges.index')->with('success', 'College created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create college: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\College  $college
     * @return \Illuminate\Http\Response
     */
    public function show(College $college)
    {
        $college->load('departments'); // Load relationships
        return view('colleges.show', compact('college'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\College  $college
     * @return \Illuminate\Http\Response
     */
    public function edit(College $college)
    {
        return view('colleges.edit', compact('college'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\College  $college
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, College $college)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'HOD_name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $college->update($request->all());
            return redirect()->route('colleges.index')->with('success', 'College updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update college: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\College  $college
     * @return \Illuminate\Http\Response
     */
    public function destroy(College $college)
    {
        try {
            $college->delete();
            return redirect()->route('colleges.index')->with('success', 'College deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete college: ' . $e->getMessage());
        }
    }
}
