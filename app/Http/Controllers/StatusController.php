<?php

namespace App\Http\Controllers;

use App\Http\Requests\Status\StoreStatusRequest;
use App\Models\Status;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class StatusController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Status::class);

        $statuses = Status::paginate(10);

        return view('statuses.index')->with('statuses', $statuses);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('statuses.create');
    }

    public function store(StoreStatusRequest $request)
    {
        $this->authorize('create', Status::class);

        Status::create($request->only('name'));

        return redirect()->route('statuses.index')->withSuccess('Status Created Successfully!');
    }

    public function show(Status $status)
    {
//        $this->authorize('view', $status);

        return view('statuses.show')->with('status', $status);
    }

    public function edit(Status $status)
    {
        return view('statuses.edit')->with('status' , $status);
    }

    public function update(StoreStatusRequest $request, Status $status)
    {
        $this->authorize('update', $status);

        $status->update($request->validated());

        return redirect()->route('statuses.show', $status)->withSuccess('Status Edited Successfully!');
    }

    public function destroy(Status $status)
    {
        $this->authorize('delete', $status);

        $status->delete();

        return redirect()->route('statuses.index')->withSuccess('Status deleted successfully!');
    }
}
