<div>

    <div class="container mt-5">
        <div class="row">

            <div class="col-md-12 mb-4">
                <nav class="navbar navbar-light bg-light" style="box-shadow: 0 5px 5px rgb(0 0 0 / 35%)">
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a class=" btn btn-sm btn-outline-primary"
                                href="{{ route('admin.add.amenity') }}">{{ __('add_new') }}</a>
                        </li>
                    </ul>
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <form class="form-inline my-2 my-lg-0" action="{{ route('admin.search.amenity') }}">
                                <input class="form-control mr-sm-2" type="search" name="search"
                                    value="{{ $search }}" placeholder="{{ __('search_amenity') }}"
                                    aria-label="Search">
                                <button class="btn btn-primary my-2 my-sm-0"
                                    type="submit">{{ __('search') }}</button>
                            </form>
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

                @if (count($amenities) > 0)

                    <table class="table table-striped" style="box-shadow: 0 5px 5px rgb(0 0 0 / 35%)">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('option') }}</th>
                                <th scope="col">{{ __('parent_child') }}</th>
                                <th scope="col">{{ __('user') }}</th>
                                <th scope="col">{{ __('edit') }}</th>
                                <th scope="col">{{ __('delete') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($amenities as $amenity)
                                <tr>
                                    <td scope="row">{{ $amenity->option }}</td>
                                    <td scope="row">
                                        @if (count($amenity->amenities) > 0)
                                            <a href="#{{ $amenity->option }}" class="btn btn-sm btn-outline-success">
                                                {{ __('Parent') }}</a>
                                        @else
                                            <a href="#{{ $amenity->amenity->option }}"
                                                class="btn btn-sm btn-outline-primary">
                                                {{ $amenity->amenity->option }}</a>
                                        @endif
                                    </td>
                                    <td scope="row">{{ $amenity->user->name }}</td>
                                    </td>
                                    <td scope="row"><a
                                            href="{{ route('admin.edit.amenity', ['amenity_id' => $amenity->id]) }}"
                                            class="text-success"></a></td>
                                    <td scope="row"><a href="#" class="btn btn-sm btn-danger"
                                            onclick="deleteAmenity({{ $amenity->id }})">{{ __('delete') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $amenities->links('pagination::bootstrap-4') }}
                @else
                    <div class="alert alert-danger mt-4" role="alert">
                        {{ __('no_results_found') }} <a href="{{ route('admin.amenities') }}"
                            class="alert-link">{{ __('back_to_amenity_page') }}</a>.
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function deleteAmenity(amenity_id) {
            @this.set('amenity_id', amenity_id)
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
                            'Your Amenity(Option) has been deleted.',
                            'success'
                        )
                    } else {
                        swalWithBootstrapButtons.fire(
                            'You can\'t delete this Item !',
                            'Your imaginary Amenity(Option) is safe :).',
                            'error'
                        )
                    }
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your imaginary Amenity(Option) is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush
