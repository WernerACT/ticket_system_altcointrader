<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinkRequest;
use App\Http\Resources\LinkResource;
use App\Models\Link;

class LinkController extends Controller
{
    public function index()
    {
        return LinkResource::collection(Link::all());
    }

    public function store(LinkRequest $request)
    {
        return new LinkResource(Link::create($request->validated()));
    }

    public function show(Link $link)
    {
        return new LinkResource($link);
    }

    public function update(LinkRequest $request, Link $link)
    {
        $link->update($request->validated());

        return new LinkResource($link);
    }

    public function destroy(Link $link)
    {
        $link->delete();

        return response()->json();
    }
}
