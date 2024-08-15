<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTodoListItemRequest;
use App\Http\Requests\UpdateTodoListItemRequest;
use App\Http\Resources\TodoListItemResource;
use App\Models\TodoListItem;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('completed')) {
            $todoListItems = TodoListItem::where('completed', $request->input('completed'))
                ->get();
        } else {
            $todoListItems = TodoListItem::all();
        }

        return TodoListItemResource::collection($todoListItems);
    }

    public function show(TodoListItem $todo)
    {
        return new TodoListItemResource($todo);
    }

    public function create(CreateTodoListItemRequest $request)
    {
        $todoListItem = new TodoListItem;
        $todoListItem->item = $request->input('item');
        
        $todoListItem->save();

        return new TodoListItemResource($todoListItem);
    }

    public function update(TodoListItem $todo, UpdateTodoListItemRequest $request)
    {
        $todo->item = $request->item;
        if ($request->has('completed')) {
            $todo->completed = $request->boolean('completed');
        }

        $todo->save();

        return new TodoListItemResource($todo);
    }

    public function delete(TodoListItem $todo)
    {
        $todo->delete();

        return response()->json([
            'message' => "{$todo->id} deleted successfully.",
            'success' => true,
        ]);
    }
}
