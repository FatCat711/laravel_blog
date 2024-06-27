<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class IdeaController extends Controller
{
    public function store()
    {

        $validated = request()->validate([
            "content" => "required|min:3|max:240",
        ]);

        $validated['user_id'] = auth()->user()->id;

        Idea::create($validated);
        return redirect()->route('dashboard')->with('success', 'Idea created successfuly');
    }

    public function destroy(Idea $idea)
    {

        // if (auth()->user()->id !== $idea->user_id) {
        //     abort(404);
        // }
        Gate::authorize('idea.delete', $idea);

        $idea->delete();
        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully');
    }

    public function show(Idea $idea)
    {
        return view('ideas.show', compact('idea'));
    }

    public function edit(Idea $idea)
    {
        // if (auth()->user()->id !== $idea->user_id) {
        //     abort(404);
        // }
        Gate::authorize('idea.edit', $idea);
        $editing = true;
        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Idea $idea)
    {
        if (auth()->user()->id !== $idea->user_id) {
            abort(404);
        }
        $validated = request()->validate([
            "content" => "required|min:3|max:240",
        ]);
        $idea->update($validated);
        return redirect()->route('ideas.show', $idea->id)->with('success', 'Idea updated');
    }
}
