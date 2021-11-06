<?php

namespace App\Http\Controllers;

use App\Models\Event;

use Illuminate\Http\Request;

use App\Models\User;


class EventController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        if ($search) {
            $events = Event::where([
                ['title', 'like', '%' . $search . '%']
            ])->get();
        } else {
            $events = Event::all();
        }
        return view('welcome', ['events' => $events, 'search' => $search]);
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {

        $event = new Event();

        $event->title = $request->title;
        $event->cidade = $request->cidade;
        $event->private = $request->private;
        $event->description = $request->description;
        $event->items = $request->items; // precisa indicar no model que é um arrau, na view o nome é items[]
        $event->date = $request->date;


        // Image Upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/events'), $imageName);

            $event->image = $imageName;
        }

        $user = auth()->user();
        $event->user_id = $user->id;


        $event->save();

        return redirect()->route('event.index')->with('msg', 'Evento criado com sucesso!');
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        $eventDono = User::where('id', '=', $event->user_id)->first()->toArray();
        return view('events.show', ['event' => $event, 'eventDono' => $eventDono]);
    }

    public function dashboard()
    {
        $user = auth()->user();
        $events = $user->events;

        return view('events.dashboard', ['events' => $events]);
    }

    public function destroy($id){
        $eventDelete = Event::find($id);
        $eventDelete->delete();

        return redirect()->route('event.dashboard')->with('msg', 'Evento Excluido com sucesso!');

    }
}
