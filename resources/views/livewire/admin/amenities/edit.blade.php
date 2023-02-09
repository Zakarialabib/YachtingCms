<div>



    <div class="container mt-3">
        <div class="row">

            <div class="col-md-12 mb-4">
                <nav class="navbar navbar-light bg-light" style="box-shadow: 0 5px 5px rgb(0 0 0 / 35%)">
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a class=" btn btn-sm btn-outline-primary"
                                href="{{ route('admin.amenities') }}">{{ __('amenity.all_amenities') }}</a>
                        </li>
                    </ul>
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <form class="form-inline my-2 my-lg-0" action="{{ route('admin.search.amenity') }}">
                                <input class="form-control mr-sm-2" type="text" name="search"
                                    value="{{ $search }}" placeholder="{{ __('amenity.search_amenity') }}"
                                    aria-label="Search" />
                                <button class="btn btn-primary my-2 my-sm-0" type="submit">{{ __('search') }}</button>
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>

            @if (Session::has('message'))
                <div class="col-md-12">
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                </div>
            @endif

            @if (Session::has('message_error'))
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        {{ Session::get('message_error') }}
                    </div>
                </div>
            @endif

            <div class="col-md-3">

                @if ($checkAP === 1)
                    <form class="form-horizontal" wire:submit.prevent="updateAmenityChild"
                        style="box-shadow: 0 2px 8px rgb(0 0 0 / 35%)">
                        <div class="form-group pt-3">
                            <label class="col-md-12 control-label">{{ __('amenity.amenity_name') }}</label>
                            <div class="col-md-12">
                                <select class="form-control" wire:model="amenity_id">
                                    @foreach ($amenityInfo as $info)
                                        <option value="{{ $info->id }}">{{ $info->option }}</option>
                                    @endforeach
                                </select>
                                @error('amenity_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label">{{ __('amenity.option_name') }}</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="{{ __('amenity.option_name') }}"
                                    class="form-control input-md" wire:model="option" />
                                @error('option')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group pb-3">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">{{ __('edit') }}</button>
                            </div>
                        </div>
                    </form>
                @else
                    <form class="form-horizontal" wire:submit.prevent="updateAmenityParent"
                        style="box-shadow: 0 2px 8px rgb(0 0 0 / 35%)">
                        <div class="form-group pt-3">
                            <label class="col-md-12 control-label">{{ __('amenity.amenity_name') }}</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="{{ __('amenity.amenity_name') }}"
                                    class="form-control input-md" wire:model="amenity" />
                                @error('amenity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group pb-3">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">{{ __('edit') }}</button>
                            </div>
                        </div>
                    </form>
                @endif
            </div>

            <div class="col-md-9">

                <nav class="navbar navbar-light bg-light mb-3" style="box-shadow: 0 5px 5px rgb(0 0 0 / 35%)">
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <select name="sorting" class="form-control-sm" wire:model="sorting">
                                <option value="default" selected="selected">{{ __('default_sorting') }}</option>
                                <option value="date">{{ __('amenity.date') }}</option>
                                <option value="parent">{{ __('amenity.enable') }}</option>
                                <option value="child">{{ __('amenity.disable') }}</option>
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

                @if (count($allAmenityInfo) > 0)
                    <table class="table table-striped" style="box-shadow: 0 5px 5px rgb(0 0 0 / 35%)">
                        <thead>
                            <tr>
                                <th scope="col"><span class="material-icons text-primary position-relative"
                                        style="top:5px;">tune</span> {{ __('amenity.option') }}</th>
                                <th scope="col"><span class="material-icons text-primary position-relative"
                                        style="top:5px;">label</span> {{ __('amenity.parent_child') }}</th>
                                <th scope="col"><span class="material-icons text-primary position-relative"
                                        style="top:5px;">access_time_filled</span> {{ __('created_at') }}</th>
                                <th scope="col"><span class="material-icons text-success position-relative"
                                        style="top:5px;">mode_edit</span> {{ __('edit') }}</th>
                                <th scope="col"><span class="material-icons text-danger  position-relative"
                                        style="top:5px;">delete</span> {{ __('delete') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allAmenityInfo as $amenity)
                                <tr>
                                    <td scope="row"><span
                                            class="material-icons text-primary position-relative mr-2"
                                            style="top:5px;">tune</span>{{ $amenity->option }}</td>
                                    <td scope="row">
                                        @if (count($amenity->amenities) > 0)
                                            <span class="material-icons position-relative text-success mr-2"
                                                style="top:8px;">label</span><a href="#{{ $amenity->option }}"
                                                class="btn btn-sm btn-outline-success"> Parent</a>
                                        @else
                                            <span class="material-icons position-relative text-primary mr-2"
                                                style="top:8px;">label</span><a
                                                href="#{{ $amenity->amenity->option }}"
                                                class="btn btn-sm btn-outline-primary">
                                                {{ $amenity->amenity->option }}</a>
                                        @endif
                                    </td>
                                    <td scope="row">{{ date('d/M/y', strtotime($amenity->created_at)) }}</td>
                                    <td scope="row"><a
                                            href="{{ route('admin.edit.amenity', ['amenity' => $amenity->id]) }}"
                                            class="btn btn-sm btn-primary text-success">{{ __('Edit') }}</a></td>
                                    <td scope="row"><a href="#" class="btn btn-sm btn-danger"
                                            onclick="deleteAmenity({{ $amenity->id }})">{{ __('delete') }}</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-danger mt-4 p-3" role="alert">
                        <p class="text-center">{{ __('amenity.no_amenity_found') }}</p>
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
