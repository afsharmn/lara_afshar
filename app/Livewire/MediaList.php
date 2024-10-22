<?php

namespace App\Livewire;

use App\Models\Media;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Livewire\WithPagination;
use Livewire\Component;

class MediaList extends Component
{
    use WithPagination;

    public $currentPageItemsIds = [];
    public $selected = [];
    public $fileName;
    public $paginationItemsCount = 12;
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

    public function deselectSelecteds()
    {
        $this->selected = [];
    }
    public function selectAll()
    {
        foreach ($this->currentPageItemsIds as $index){
            $this->addSelected($index);
        }
    }

    public function reomveSelecteds()
    {


        foreach ($this->selected as $index) {

            try {

                DB::beginTransaction();

                $media = Media::find($index);

                $realPath = storage_path('app/public/' . $media->address);

                File::delete($realPath);

                $media->delete();

                DB::commit();

                $this->toggleSelected($index);

            } catch (Exception $exception) {

                DB::rollBack();

                $this->addError('delete-error-' . $index , $exception->getMessage());
            }
        }
    }
    public function toggleSelected($index)
    {
        if(in_array($index, $this->selected)) {
            if (($key = array_search($index, $this->selected)) !== false) {
                unset($this->selected[$key]);
            }
        }else{
            $this->selected[] = $index;
        }
    }
    public function addSelected($index)
    {
        if(!in_array($index, $this->selected))
            $this->selected[] = $index;
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
        $query = Media::query()->latest();

        $query = $query->paginate($this->paginationItemsCount)->onEachSide(1);

        $this->currentPageItemsIds = $query->pluck('id')->toArray();

        return view('livewire.media-list' ,[
            'files' => $query
        ]);

    }
}
