<div>

    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-12 mb-4">
                <nav class="navbar navbar-light bg-light" style="box-shadow: 0 5px 5px rgb(0 0 0 / 35%)">
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a class=" btn btn-sm btn-outline-primary" href="{{ route('admin.add.boat') }}">{{ __('Add new Boats') }}</a>
                        </li>
                    </ul>
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <form class="form-inline my-2 my-lg-0" action="{{ route('admin.search.boat') }}">
                                <input class="form-control mr-sm-2" type="text" name="search" value="{{ $search }}"  placeholder="{{ __('Boats search boat') }}" aria-label="Search" />
                                <button class="btn btn-primary my-2 my-sm-0" type="submit">{{ __('Search') }}</button>
                            </form>
                        </li>
                    </ul>
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <select name="sorting" class="form-control-sm" wire:model="sorting">
                                <option value="default" selected="selected">{{ __('default_sorting') }}</option>
                                <option value="date">{{ __('Boats date') }}</option>
                                <option value="low">{{ __('Boats low') }}</option>
                                <option value="hight">{{ __('Boats hight') }}</option>
                                <option value="enable">{{ __('Boats enable') }}</option>
                                <option value="disable">{{ __('Boats disable') }}</option>
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
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }} {{__('Complet you boat information')}} <a href="{{  route('admin.edit.boat',['boat' => $boat->id]) }}" class="btn btn-sm btn-light"><span class="material-icons ml-2">{{__('Edit')}}</span></a>
                    </div>
                @endif

                @if(Session::has('message_error'))
                    <div class="alert alert-danger">
                        {{ Session::get('message_error') }}
                    </div>
                @endif

                @if(count($boats)>0)
                    <table class="table table-striped" style="box-shadow: 0 5px 5px rgb(0 0 0 / 35%)">
                        <thead>
                        <tr>
                            <th>{{ __('Boats picture') }}</th>
                            <th>{{ __('Boats name') }}</th>
                            <th>{{ __('Boats owner') }}</th>
                            <th>{{ __('Boats size') }}</th>
                            <th>{{ __('Boats comments') }}</th>
                            <th>{{ __('Boats booking') }}</th>
                            <th>{{ __('status') }}</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($boats as $boat)
                            <tr>
                                <td width="100"><img class="card-img-top w-50 h-50 rounded-circle lightboxed" rel="group1" src="{{ asset('assets/images/boat') }}/{{ $boat->photo_path }}" data-link="{{ asset('assets/images/boat') }}/{{ $boat->photo_path }}" data-caption="{{ $boat->name }}"></td>
                                <td >{{ $boat->name  }}</td>
                                <td>{{ $boat->user->name }}</td>
                                <td>{{ $boat->boat_size  }}</td>
                                <td>{{ $boat->nbr_comment  }}</td>
                                <td>{{ count($boat->booking)  }}</td>
                                <td>
                                    @if($boat->status === 1)
                                         {{ __('enable') }}
                                    @else
                                         {{ __('disable') }}
                                    @endif
                                </td>

                                <td>
                                    <div>
                                    <a href="#" onclick="deleteBoat({{$boat->id}})"><span class="btn btn-danger position-relative mr-2" style="top:5px;">{{__('Delete')}}</span></a>

                                    <a href="{{ route('admin.edit.boat',['boat' => $boat->id]) }}" class="text-success"><span class="btn btn-primary position-relative mr-2" style="top:5px;">{{__('Edit')}}</span></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $boats->links("pagination::bootstrap-4") }}
                @else
                    <div class="col-md-12">
                        <div class="alert alert-danger mt-4 p-3" role="alert">
                            <p class="text-center">{{ __('Boats no boat found') }}.</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>

@push('scripts')
    <script>
        function deleteBoat(boat_id){
            @this.set('boat_id', boat_id)
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
                    if(deleteStatus)
                    {
                    @this.set('deleteStatus', 0)
                        swalWithBootstrapButtons.fire(
                            'Deleted !',
                            'Your boat has been deleted.',
                            'success'
                        )
                    } else {
                        swalWithBootstrapButtons.fire(
                            'You can\'t delete this Item !',
                            'Your imaginary boat is safe :).',
                            'error'
                        )
                    }
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your imaginary book is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush
