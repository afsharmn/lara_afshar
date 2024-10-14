<?php

namespace App\Livewire;

use App\Models\Media;
use Livewire\WithPagination;
use Livewire\Component;

class MediaList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'refreshFiles'
    ];

    public function refreshFiles()
    {
        $this->render();
    }
    public function render()
    {
        return view('livewire.media-list' ,[
            'files' => Media::latest()->paginate(12)
        ]);

    }

}
