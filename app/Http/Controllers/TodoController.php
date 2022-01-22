<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'title' => 'max:255|required|regex:/[a-zA-Z0-9\s]+/',
            'content' => 'max:255|required|regex:/[a-zA-Z0-9\s]+/',
        ]);

        // create todos with user in auth request & relationship
        $request->user()->todos()->create($request->all());

        return back()->with('success', 'You have create a new todo!');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {
        /** @var $todo Todo */
        $todo = $request->user()->todos()->find($request->id);

        return $todo->update($request->all()) ?
            back()->with('success', 'You have updated a todo!') :
            back()->withErrors('error', '!error updating a todo');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function toggle(Request $request): \Illuminate\Http\RedirectResponse
    {
        /** @var $todo Todo */
        $todo = $request->user()->todos()->find($request->id);

        return $todo->update(['complete' => !$todo->complete]) ?
            back()->with('success', 'You have toggled a todo!') :
            back()->withErrors('error', '!error toggling a todo');
    }

    public function delete(Request $request)
    {
        /** @var $todo Todo */
        $todo = $request->user()->todos()->find($request->id);

        return $todo->delete() ?
            back()->with('success', 'You have deleted a todo!') :
            back()->withErrors('error', '!error deleting a todo');
    }
}
