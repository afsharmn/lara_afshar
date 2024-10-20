<?php

namespace App\Livewire;

use App\Models\Media;
use Livewire\WithPagination;
use Livewire\Component;

class MediaList extends Component
{
    use WithPagination;

    public $fileName;
    public $editNameIndex = null;
    protected $paginationTheme = 'custom-bootstrap';

    protected $listeners = [
        'refreshFiles'
    ];

    public function setEditNameIndex($index)
    {
        $item = Media::find($index);
        if ($item) {
            $this->fileName = $item->name;
            $this->editNameIndex = $index;
        }
    }

    public function updateName()
    {
        $this->validate([
            'fileName' => 'nullable|string|max:255',
        ]);

        $item = Media::find($this->editNameIndex);

        if($item){
            $item->name = empty($this->fileName) ? null : $this->fileName;
            $item->update();
        }

        $this->editNameIndex = null;
    }
    public function refreshFiles()
    {
        $this->render();
    }
    public function render()
    {
        return view('livewire.media-list' ,[
            'files' => Media::latest()->paginate(12)->onEachSide(1)
        ]);

    }

}
