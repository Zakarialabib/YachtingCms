<div class="p-0 m-0">
    @if (Session::has('message'))
        <div class="col-md-12 mt-3">
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        </div>
    @endif

    @if (Session::has('message_img_error'))
        <div class="col-md-12 mt-3">
            <div class="alert alert-danger">
                {{ Session::get('message_img_error') }}
            </div>
        </div>
    @endif

    @if (count($images) < $SettingImages)
        <div class="col-md-12">
            <form class="p-5" style="box-shadow: 0 2px 8px rgb(0 0 0 / 35%)">
                <div class="add-input mt-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="file" class="form-control" wire:model="upload_images" multiple>
                                <div wire:loading wire:target="upload_images" class="text-primary fw-bolder">
                                    {{ __('uploading') }}</div>
                                @if (!empty($upload_images))
                                    <div class="col-md-12 mt-2">
                                        <div class="card-columns">
                                            @foreach ($upload_images as $image)
                                                <div class="card border-0">
                                                    <img src="{{ $image->temporaryUrl() }}" class="w-100" />
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                                @error('image')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button class="btn text-white btn-primary"
                                wire:click.prevent="storeImage">{{ __('Add more images') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @else
        <div class="col-md-12">
            <div class="alert alert-warning" role="alert">
                {{ __('error message up') }} {{ $SettingImages }} 
            </div>
        </div>
    @endif

    @if (Session::has('image_message'))
        <div class="col-md-12 mt-3">
            <div class="alert alert-success">
                {{ Session::get('image_message') }}
            </div>
        </div>
    @endif

    <div class="col-md-12 mt-3">
        <div class="card-columns">
            @foreach ($images as $image)
                <div class="card border-0">
                    <img class="card-img-top w-50 h-50 rounded lightboxed h-100 w-100" rel="group1"
                        src="{{ asset('assets/images/boat') }}/{{ $image->image }}"
                        data-link="{{ asset('assets/images/boat') }}/{{ $image->image }}"
                        data-caption="{{ $image->name }}">
                    <a class="btn btn-sm btn-danger text-white position-relative" style="bottom: 40px;left: 8px;"
                        onclick="deleteImage({{ $image->id }})"
                        >{{ __('delete') }}</a>
                </div>
            @endforeach
        </div>
    </div>

</div>

@push('scripts')
    <script>
        function deleteImage(image_id) {
            Swal.fire({
                title: 'Do you want to delete this image ?',
                //showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#007bff',
                //denyButtonText: `Don't save`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    @this.set('image_id', image_id)
                    @this.call('delete')
                    Swal.fire('Image is deleted successfully !', '', 'success')
                }
                /*else if (result.isDenied) {
                                   Swal.fire('Changes are not saved', '', 'info')
                               }*/
            })
        }
    </script>
@endpush
