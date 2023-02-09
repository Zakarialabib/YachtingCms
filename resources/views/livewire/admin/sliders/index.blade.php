<div>

    <div class="container mt-4">
        <div class="row">

            <div class="col-md-12 mb-4">
                <nav class="navbar navbar-light bg-light" style="box-shadow: 0 5px 5px rgb(0 0 0 / 35%)">
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a class="btn btn-primary" href="{{ route('slides.create') }}">{{ __('Add New Slider') }}</a>
                        </li>
                    </ul>
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <select name="sorting" class="form-control-sm" wire:model="sorting">
                                <option value="default" selected="selected">{{ __('default_sorting') }}</option>
                                <option value="date">{{ __('date') }}</option>
                                <option value="parent">{{ __('enable') }}</option>
                                <option value="child">{{ __('disable') }}</option>
                            </select>
                        </li>
                        <li class="nav-item ml-2">
                            <select name="post-per-page" class="form-control-sm" wire:model="page_size">
                                <option value="12" selected="selected">12 {{ __('per_page') }}</option>
                                <option value="16">16 {{ __('per_page') }}</option>
                                <option value="18">18 {{ __('per_page') }}</option>
                                <option value="21">21 {{ __('per_page') }}</option>
                                <option value="24">24 {{ __('per_page') }}</option>
                                <option value="30">30 {{ __('per_page') }}</option>
                                <option value="32">32 {{ __('per_page') }}</option>
                            </select>
                        </li>
                    </ul>
                </nav>
            </div>

            @if (count($sliders) > 0)

                <div class="col-md-12">

                    @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                    @endif

                    @if (Session::has('message_error'))
                        <div class="alert alert-danger">
                            {{ Session::get('message_error') }}
                        </div>
                    @endif
                    <table class="table table-striped ">
                        <thead>
                            <tr>
                                <th >ID</th>
                                <th>{{ __('Title') }}</th>
                                <th>{{ __('Image') }}</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $slider)
                                <tr>
                                    <td>{{ $slider->id }}</td>
                                    <td>{{ $slider->title }}</td>
                                    <td><img class="card-img-top w-50 h-50"
                                        src="{{ url('images/', $slider->photo ) }}" alt="image"></td>
                                    <td scope="row">
                                        <a href="{{ route('slides.edit', $slider->id) }}"
                                            class="btn btn-primary btn-sm">
                                            {{ __('Edit') }}
                                        </a>
                                    <a href="#" class="btn btn-sm btn-danger"
                                            onclick="deleteSlider({{ $slider->id }})">
                                            {{ __('delete') }}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row justify-content-end">
                        <div class="col-md-8">
                            {{ $sliders->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            @else
                <div class="col-md-12">
                    <div class="alert alert-danger mt-4 p-3" role="alert">
                        <p class="text-center">{{ __('No sliders found') }}</p>
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>

@push('scripts')
    <script>
        function deleteSlider(slider_id) {
            @this.set('slider_id', slider_id)
            @this.call('canIdelete')
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger mr-3'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: 'Are you sure ?',
                text: "You won't be able to revert this !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it !',
                cancelButtonText: 'No, cancel !',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.call('delete')
                    var deleteStatus = @this.deleteStatus
                    console.log("deleteStatus : " + deleteStatus)
                    if (deleteStatus) {
                        @this.set('deleteStatus', 0)
                        swalWithBootstrapButtons.fire(
                            'Deleted !',
                            'Your Slider(Option) has been deleted.',
                            'success'
                        )
                    } else {
                        swalWithBootstrapButtons.fire(
                            'You can\'t delete this Item !',
                            'Your imaginary Slider(Option) is safe :).',
                            'error'
                        )
                    }
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your imaginary Slider(Option) is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush
