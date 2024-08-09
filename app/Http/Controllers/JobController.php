<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('tags')->simplePaginate(5); // Correct usage
        return view('jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'salary' => 'required|numeric|min:0', // Ensure this is correct
            'description' => 'required|string',
            'company_name' => 'nullable|string|max:255',
        ]);

        // Create a new job record in the database
        Job::create($request->all());

        // Redirect back to the jobs index with a success message
        return redirect()->route('jobs.index')->with('success', 'Job created successfully.');
    }

    public function show(Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, Job $job)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'salary' => 'required|numeric|min:0',
            'description' => 'required|string',
            'company_name' => 'nullable|string|max:255',
        ]);

        $job->update($request->all());

        return redirect()->route('jobs.index')->with('success', 'Job updated successfully.');
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully.');
    }

}
