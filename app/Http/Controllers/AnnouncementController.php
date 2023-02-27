<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Document;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcements = Announcement::with('document')->get();
        return view('announcements.index', compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('announcements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // create a document

        $document = Document::with('documents.announcements')->create([
            'number' => $request->number,
            'description' => $request->description,
            'released_at' => $request->released_at
        ]);

        // create a announcement related to it

        $document->announcement()->create([
            'begin_date' => $request->begin_date,
            'end_date' => $request->end_date
        ]);

        return redirect()->route('announcements.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Announcement $announcement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcement $announcement)
    {
        $announcement = Announcement::with('document')->find($announcement->id);

        return view('announcements.edit', [
            'announcement' => $announcement
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Announcement $announcement)
    {
        // update announcement
        
        $announcement->update([
            'begin_date' => $request->begin_date,
            'end_date' => $request->end_date
        ]);

        // update related document

        $announcement->document()->update([
            'number' => $request->number,
            'description' => $request->description,
            'released_at' => $request->released_at
        ]);

        return redirect()->route('announcements.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->document()->delete();
        return redirect(route('announcements.index'));
    }
}
