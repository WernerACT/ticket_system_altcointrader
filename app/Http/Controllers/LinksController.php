<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLinksRequest;
use App\Http\Resources\LinksResource;
use App\Models\Links;

class LinksController extends Controller
{
    public function index()
    {
        return LinksResource::collection(Links::all());
    }

    public function store(StoreLinksRequest $request)
    {
        return new LinksResource(Links::create($request->validated()));
    }

    public function show(Links $links)
    {
        return new LinksResource($links);
    }

    public function update(StoreLinksRequest $request, Links $links)
    {
        $links->update($request->validated());

        return new LinksResource($links);
    }

    public function destroy(Links $links)
    {
        $links->delete();

        return response()->json();
    }
}
