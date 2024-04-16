<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Resources\DepartmentResource;
use App\Models\Department;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DepartmentController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Department::class);

        $departments = Department::paginate(10);

        return view('departments.index')->with('departments', $departments);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departments.create');
    }

    public function store(StoreDepartmentRequest $request)
    {
        $this->authorize('create', Department::class);

        Department::create($request->only('name'));

        return redirect()->route('departments.index')->withSuccess('Department Created Successfully!');
    }

    public function show(Department $department)
    {
        return view('departments.show')->with('department', $department);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return view('departments.edit')->with('department' , $department);
    }

    public function update(StoreDepartmentRequest $request, Department $department)
    {
        $this->authorize('update', $department);

        $department->update($request->validated());

        return redirect()->route('departments.show', $department)->withSuccess('Department Edited Successfully!');
    }

    public function destroy(Department $department)
    {
        $department->delete();

        return redirect()->route('departments.index')->withSuccess('Department deleted successfully!');
    }
}
