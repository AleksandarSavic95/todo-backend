<?php

namespace App\Http\Controllers;

use App\TodoItem;
use App\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class TodoItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::id();
        info($userId);
        info(User::find($userId)->todoItems);
        return User::find($userId)->todoItems;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId = Auth::id();
        
        return TodoItem::create(array_merge($request->all(), ['user_id' => $userId]));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\TodoItem  $todoItem
     * @return \Illuminate\Http\Response
     */
    public function show(TodoItem $todoItem)
    {
        info('$todoItem = ' . $todoItem);
        info(Auth::id());
        
        if ($todoItem->user_id == Auth::id()) {
            return $todoItem;
        }
        
        return response()->json(null, 404);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TodoItem  $todoItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TodoItem $todoItem)
    {
        // remove 'user_id' from request array to prevent change of ownership
        unset($request['user_id']);
        $todoItem->update($request->all());
        return response()->json($todoItem, 200);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TodoItem  $todoItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(TodoItem $todoItem)
    {
        $todoItem->delete();
        return response()->json(null, 204);
    }
}