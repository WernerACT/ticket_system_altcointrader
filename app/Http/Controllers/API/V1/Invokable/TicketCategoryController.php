<?php

namespace App\Http\Controllers\API\V1\Invokable;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\StatusResource;
use App\Models\Category;
use App\Models\Status;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketCategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Ticket $ticket)
    {
        $categories = Category::where('department_id', $ticket->department_id)
            ->orderBy('name', 'asc')
            ->get();

        return response()->json([
            'success' => true,
            'categories' => CategoryResource::collection($categories)
        ]);
    }
}
