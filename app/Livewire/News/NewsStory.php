<?php

namespace App\Livewire\News;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use App\Models\News\NewsStory as Story;


class NewsStory extends Component
{
    public $story;
    public $other_stories;

    public function mount($news_id)
    {
        $this->story = Story::find($news_id);
        $this->other_stories = Story::latest()->take(4)->where('id', '!=', $news_id)->get(['id', 'title']);
    }

    public function downloadFile()
    {

        $filename = $this->story->attachment_path;
        $attachmentPath = "public/attachments/{$filename}";

        // Ensure the file exists before attempting to download
        if (Storage::exists($attachmentPath)) {
            return response()->download(storage_path("app/{$attachmentPath}"));
        } else {
            // Handle the case where the file does not exist
            abort(404, 'File not found');
        }
    }


    public function render()
    {
        return view('livewire.news.news-story');
    }
}
