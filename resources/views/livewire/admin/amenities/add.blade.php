<div>
    
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 mb-4">
                <nav class="navbar navbar-light bg-light" style="box-shadow: 0 5px 5px rgb(0 0 0 / 35%)">
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a class=" btn btn-sm btn-outline-primary"
                                href="{{ route('admin.amenities') }}">{{ __('all_amenities') }}</a>
                        </li>
                    </ul>
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <form class="form-inline my-2 my-lg-0" action="{{ route('admin.search.amenity') }}">
                                <input class="form-control mr-sm-2" type="text" name="search"
                                    value="{{ $search }}" placeholder="{{ __('amenity.search_amenity') }}"
                                    aria-label="Search" />
                                <button class="btn btn-primary my-2 my-sm-0"
                                    type="submit">{{ __('search') }}</button>
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

            <div class="col-md-6">

                <form class="form-horizontal p-2" wire:submit.prevent="storeAmenityParent"
                    style="box-shadow: 0 2px 8px rgb(0 0 0 / 35%)">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="col-md-6 control-label">{{ __('amenity_name') }}</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Option" class="form-control input-md"
                                    wire:model="amenity" />
                                @error('amenity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary float-right">{{ __('add') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-6">
                @if (count($amenityInfo) > 0)

                    <form class="form-horizontal p-2" wire:submit.prevent="storeAmenityChild"
                        style="box-shadow: 0 2px 8px rgb(0 0 0 / 35%)">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="col-md-12 control-label">{{ __('amenity_name') }}</label>
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
                            <div class="form-group col-md-6">
                                <label class="col-md-12 control-label">{{ __('option_name') }}</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="{{ __('option_name') }}"
                                        class="form-control input-md" wire:model="option" />
                                    @error('option')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="col-md-12">
                                    <button type="submit"
                                        class="btn btn-primary float-right">{{ __('add') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                @else
                    <div class="col-md-12">
                        <div class="alert alert-danger mt-4 p-3" role="alert">
                            <p class="text-center">{{ __('Add some Options') }} !!!</p>
                        </div>
                    </div>
                @endif
            </div>

            <div class="col-md-6 mt-4">

                <nav class="navbar navbar-light bg-light" style="box-shadow: 0 5px 5px rgb(0 0 0 / 35%)">
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link disabled" href="">{{ __('view_amenity') }}</a>
                        </li>
                    </ul>
                    <ul class="nav justify-content-end">
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

                <table class="table table-striped" style="box-shadow: 0 2px 8px rgb(0 0 0 / 35%)">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('option') }}</th>
                            <th scope="col">{{ __('user') }}</th>
                            <th scope="col">{{ __('created_at') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($amenityInfo as $amenity)
                            <tr>
                                <td scope="row">{{ $amenity->option }}</td>
                                <td scope="row">{{ $amenity->user->name }}</td>
                                <td scope="row">{{ date('d/M/y', strtotime($amenity->created_at)) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-md-6 mt-4">

                <nav class="navbar navbar-light bg-light" style="box-shadow: 0 5px 5px rgb(0 0 0 / 35%)">
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link disabled" href="">{{ __('view_option') }}</a>
                        </li>
                    </ul>
                    <ul class="nav justify-content-end">
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

                <table class="table table-striped" style="box-shadow: 0 2px 8px rgb(0 0 0 / 35%)">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('option') }}</th>
                            <th scope="col">{{ __('user') }}</th>
                            <th scope="col">{{ __('created_at') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allAmenityInfo as $amenity)
                            <tr>
                                <td scope="row">{{ $amenity->option }}</td>
                                <td scope="row">{{ $amenity->user->name }}</td>
                                <td scope="row">{{ date('d/M/y', strtotime($amenity->created_at)) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
