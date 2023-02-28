<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateAttachmentRequest;
use App\Models\Announcement;
use App\Models\Attachment;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Announcement $announcement)
    {
        $attachments = $announcement->attachments()->get();

        return view('announcements.attachments.index', compact('announcement','attachments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateAttachmentRequest $request, Announcement $announcement)
    {
        $data = $request->all();

        $data['file'] = $request->file->store('attachments');

        $announcement->attachments()->create($data);

        return redirect()->route('announcements.attachments.index', compact('announcement'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Attachment $attachment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attachment $attachment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attachment $attachment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement, Attachment $attachment)
    {
        $attachment->delete();
        
        return redirect()->route('announcements.attachments.index', compact('announcement'));
    }
}
