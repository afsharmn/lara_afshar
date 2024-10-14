<div>

    <div class="row">

        @foreach ($files as $item)

            @if($item->type == \App\Models\Media::TYPE_AUDIO)



            @endif

            <div class="col-6 col-md-4 col-lg-3 mb-3 media-list-col">

                <div class="card">

                    <div class="card-body p-1 d-flex flex-column align-items-center justify-content-center">

                        <div>
                            @switch((int)$item->type)
                                @case(\App\Models\Media::TYPE_AUDIO)

                                    <audio class="media-list-audio" controls><source src="{{ $item->url }}"></audio>
                                    @break

                                @case(\App\Models\Media::TYPE_IMAGE)
                                    <img class="media-list-img" src="{{ $item->url }}" alt="">
                                    @break


                                @case(\App\Models\Media::TYPE_VIDEO)
                                    <video class="media-list-video" controls><source src="{{ $item->url }}"></video>
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

                        <div class="media-list-name">نام فایل</div>

                    </div>

                </div>

            </div>

        @endforeach

    </div>

    {{ $files->links() }}
</div>
