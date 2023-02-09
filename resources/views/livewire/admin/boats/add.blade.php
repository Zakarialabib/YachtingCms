<div>


    <div class="container mt-4">
        <div class="row">

            <div class="col-md-12 mb-4">
                <nav class="navbar navbar-light bg-light" style="box-shadow: 0 5px 5px rgb(0 0 0 / 35%)">
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a class=" btn btn-sm btn-outline-primary"
                                href="{{ route('admin.boats') }}">{{ __('All boats') }}</a>
                        </li>
                    </ul>
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <form class="form-inline my-2 my-lg-0" action="{{ route('admin.search.boat') }}">
                                <input class="form-control mr-sm-2" type="text" name="search"
                                    value="{{ $search }}" placeholder="{{ __('Search boat') }}"
                                    aria-label="Search" />
                                <button class="btn btn-primary my-2 my-sm-0" type="submit">{{ __('Search') }}</button>
                            </form>
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

                <form class="form-horizontal p-2" wire:submit.prevent="store"
                    style="box-shadow: 0 2px 8px rgb(0 0 0 / 35%)">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="col-md-4 control-label">{{ __('Boat name') }}</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="{{ __('Boat name') }}" class="form-control input-md"
                                    wire:model="name" />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-md-4 control-label">{{ __('No of guests') }} :
                                {{ $guests }}</label>
                            <div class="col-md-12">
                                <input type="range" placeholder="{{ __('Boats no_of_guests') }}"
                                    class="form-control input-md" min="2" max="{{ $SettingGuests }}"
                                    wire:model="guests" />
                                @error('guests')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-md-4 control-label">{{ __('Year factory boat') }}</label>
                            <div class="col-md-12">
                                <input type="date" class="form-control input-md" wire:model="year_factory_boat" />
                                @error('year_factory_boat')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-md-4 control-label">{{ __('Boat size') }} : {{ $boat_size }}</label>
                            <div class="col-md-12">
                                <input type="range" class="form-control input-md" min="2"
                                    max="{{ $SettingBoatSize }}" wire:model="boat_size" />
                                @error('boat_size')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-md-4 control-label">{{ __('Boats price') }} :
                                {{ $price }}$</label>
                            <div class="col-md-12">
                                <input type="range" class="form-control input-md" min="500" max="10000"
                                    wire:model="price" />
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-md-4 control-label">{{ __('Boats captained') }}</label>
                            <div class="col-md-12">
                                <select class="form-control" wire:model="captained">
                                    <option value="0">{{ __('disable') }}</option>
                                    <option value="1">{{ __('enable') }}</option>
                                </select>
                                @error('captained')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-md-4 control-label">{{ __('Status') }}</label>
                            <div class="col-md-12">
                                <select class="form-control" wire:model="status">
                                    <option value="1">{{ __('enable') }}</option>
                                    <option value="0">{{ __('disable') }}</option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-md-4 control-label">{{ __('Boat category') }}</label>
                            <div class="col-md-12">
                                <select class="form-control" wire:model="category">
                                    <option value="0">{{ __('Boats category') }}</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-md-4 control-label">{{ __('Country') }}</label>
                            <div class="col-md-12">
                                <select class="form-control" wire:model="country">
                                    <option value="0">{{ __('Boats country') }}</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                @error('country')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-md-4 control-label">{{ __('Boats description') }}</label>
                            <div class="col-md-12">
                                <textarea placeholder="{{ __('Boats description') }}" class="form-control input-md" wire:model="description"></textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-md-4 control-label">{{ __('Boats address') }}</label>
                            <div class="col-md-12">
                                <textarea placeholder="{{ __('Boats address') }}" class="form-control input-md" wire:model="address"></textarea>
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-md-4 control-label">{{ __('Boat image') }}</label>
                            <div class="col-md-12">
                                <input type="file" class="mt-4 custom-file-input" wire:model="image" />
                                <div wire:loading wire:target="image" class="text-primary fw-bolder">
                                    {{ __('uploading') }}</div>
                                @if ($image)
                                    <img src="{{ $image->temporaryUrl() }}" width="120" />
                                @endif
                                @error('image')
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
            </div>
        </div>
    </div>

</div>

<style>
    .custom-file-input::-webkit-file-upload-button {
        visibility: hidden;
    }

    .custom-file-input {
        opacity: 1;
    }

    .custom-file-input::before {
        content: 'Select image';
        display: inline-block;
        background: linear-gradient(top, #f9f9f9, #e3e3e3);
        border: 1px solid #999;
        border-radius: 3px;
        padding: 5px 8px;
        outline: none;
        white-space: nowrap;
        -webkit-user-select: none;
        cursor: pointer;
        text-shadow: 1px 1px #fff;
        font-weight: 700;
        font-size: 10pt;
    }

    .custom-file-input:hover::before {
        border-color: black;
    }

    .custom-file-input:active::before {
        background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
    }
</style>
