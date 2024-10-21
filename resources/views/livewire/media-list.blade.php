<div>


    <div class="row">

        @foreach ($files as $item)

            <div class="col-6 col-md-4 mb-3 media-list-col">

                <div class="card h-100">

                    <div class="card-body p-1 d-flex flex-column justify-content-between">


                        <div class="mb-2">
                            @switch((int)$item->type)
                                @case(\App\Models\Media::TYPE_AUDIO)

                                    <audio class="media-list-audio" controls>
                                        <source src="{{ $item->url }}">
                                    </audio>
                                    @break

                                @case(\App\Models\Media::TYPE_IMAGE)
                                    <img class="media-list-img" src="{{ $item->url }}" alt="">
                                    @break


                                @case(\App\Models\Media::TYPE_VIDEO)
                                    <video class="media-list-video" controls>
                                        <source src="{{ $item->url }}">
                                    </video>
                                    @break


                                @case(\App\Models\Media::TYPE_TEXT)
                                    <i class="bi bi-file-text"></i>
                                    @break


                                @case(\App\Models\Media::TYPE_FONT)
                                    <i class="bi bi-file-font"></i>
                                    @break


                                @case(\App\Models\Media::TYPE_PDF)
                                    <i class="bi bi-file-pdf"></i>
                                    @break


                                @case(\App\Models\Media::TYPE_EXCEL)
                                    <i class="bi bi-file-excel"></i>
                                    @break


                                @case(\App\Models\Media::TYPE_WORD)
                                    <i class="bi bi-file-word"></i>
                                    @break


                                @case(\App\Models\Media::TYPE_POWERPOINT)
                                    <i class="bi bi-file-ppt"></i>
                                    @break


                                @case(\App\Models\Media::TYPE_ARCHIVE)
                                    <i class="bi bi-file-zip"></i>
                                    @break

                                @default
                                    <i class="bi bi-file-earmark"></i>

                            @endswitch
                        </div>

                        <div class="d-flex flex-column media-list-info">
                            <div class="d-flex">
                                <span class="me-1">@lang('size') :</span>
                                <span>{{ \App\Helpers\File::humanFilesize($item->size) }}</span>
                            </div>
                            <div class="d-flex">
                                <span class="me-1">@lang('extension') :</span>
                                <span>{{ $item->extension }}</span>
                            </div>
                            <div class="d-flex">
                                <span class="me-1">@lang('type') :</span>
                                <span>{{ \App\Models\Media::typesValue()[$item->type] }}</span>
                            </div>

                            @if($this->editNameIndex == $item->id)
                                <div class="input-group mt-2">
                                    <input onfocusout="this.value=null"
                                           wire:change="updateName()"
                                           wire:model="fileName" name="fileName" id="fileName" type="text" class="form-control">
                                    <button wire:click="updateName()" class="btn btn-primary" type="button">
                                        <i class="bi bi-check"></i>
                                    </button>
                                </div>
                                @error('fileName') <span class="text-danger">{{ $message }}</span> @enderror
                            @else
                                <div class="d-flex name mt-2">
                                    <span class="me-1">@lang('name') :</span>
                                    @if(!empty($item->name))
                                        <span class="me-1 name" wire:click="setEditNameIndex({{$item->id}})">{{$item->name}}</span>
                                    @endif
                                    <i class="bi bi-pencil-square" wire:click="setEditNameIndex({{$item->id}})"></i>
                                </div>
                            @endif

                        </div>

                    </div>

                </div>

            </div>

        @endforeach

    </div>

    {{ $files->links() }}

</div>
