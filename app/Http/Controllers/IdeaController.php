<?php

namespace App\Http\Controllers;

use App\Events\IdeaCreated;
use App\Events\IdeaUpdated;
use Domain\Idea\Models\Idea;
use Illuminate\Http\Request;
use Domain\Place\Models\City;
use Illuminate\Support\Number;
use Domain\Idea\Models\IdeaCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Idea\IdeaStoreRequest;
use App\Http\Requests\Idea\IdeaUpdateRequest;
use App\Http\Requests\Idea\IdeaStatusImplementationUpdateRequest;

class IdeaController extends Controller
{
    public function index(Request $request)
    {
        $ideas = Idea::activeItems()
            ->orderBy('created_at', 'desc')
            ->filtred()
            ->paginate(8);
        if($request->ajax()){
            return view('page.idea.partials.ideas-list-template', ['ideas' => $ideas])->render();  
        }
  
        $categories = IdeaCategory::active()->get();
        return view('page.idea.index',[
            'ideas' => $ideas,
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        return view('page.idea.create');
    }

    public function store(IdeaStoreRequest $request)
    {

        $data = $request->validated();
        $idea = Idea::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'content' => $data['content'],
            'social_link' => $data['social_link'],
            'user_id' => Auth::user()->id,
            'idea_category_id' => $data['idea_category_id'],
            'status_implementation' => $data['status_implementation']
        ]);

        $idea->cities()->sync($data['cities']);

        event(new IdeaCreated($idea));

        return redirect()->route('idea.edit', ['id' => $idea])->with('success_message', 'Идея успешно добавлена');
    }

    public function show($id)
    {
        $idea = Auth::user()->ideas()->activeItem($id)->firstOrFail();
        return view('page.idea.show', ['idea' => $idea]);
    }

    public function edit($id)
    {
        $idea = Auth::user()
            ->ideas()
            ->whereIn('status',['moderation', 'canceled'])
            ->activeItem($id)
            ->with([
                'cities' => fn ($query) => $query
                    ->select('cities.id')
                ])
            ->firstOrFail();

        return view('page.idea.edit', ['idea' => $idea]);
    }

    public function update(IdeaUpdateRequest $request, $id)
    {
        $data = $request->validated();
        $idea = Idea::where('id', $id)
            ->where('user_id', Auth::user()->id)
            ->whereIn('status',['moderation', 'canceled'])
            ->first();

        if($idea){
            $idea->update([
                'title' => $data['title'],
                'description' => $data['description'],
                'content' => $data['content'],
                'social_link' => $data['social_link'],
                'idea_category_id' => $data['idea_category_id'],
                'status_implementation' => $data['status_implementation'],
                'status' => 'moderation',
            ]);

            $idea->cities()->sync($data['cities']);

            event(new IdeaUpdated($idea));

            return redirect()
                ->route('idea.edit', ['id' => $idea])
                ->with('success_message', 'Идея успешно обновлена');
        }

        return redirect()
            ->back()
            ->with('error_message', 'При сохранении произошла ошибка');
    }

    public function statusImplementationUpdate(IdeaStatusImplementationUpdateRequest $request, $id)
    {   
        $data = $request->validated();
        $idea = Idea::where('id', $id)
            ->where('user_id', Auth::user()->id)
            ->first();
        if($idea){
            $idea->update([
                'status_implementation' => $data['status_implementation'],
            ]);

            return redirect()
                ->route('idea.show', ['id' => $idea])
                ->with('success_message', 'Статус успешно обновлен');
        }

        return redirect()
            ->back()
            ->with('error_message', 'При сохранении произошла ошибка');
    }   
}