<div class="p-0 m-0">
            @if(Session::has('message'))
                <div class="col-md-12">
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                </div>
            @endif

            <div class="col-md-12">

                <form class="form-horizontal p-2" wire:submit.prevent="update" style="box-shadow: 0 2px 8px rgb(0 0 0 / 35%)">
                    <div class="form-row p-3">
                        <div class="form-group col-md-6">
                            <label class="col-md-4 control-label">{{ __('Boat name') }}</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="{{ __('Boat name') }}" class="form-control input-md" wire:model="name"/>
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-md-4 control-label">{{ __('No of guests') }} : {{ $guests }}</label>
                            <div class="col-md-12">
                                <input type="range" placeholder="No of guests" class="form-control input-md" min="0" max="{{ $SettingGuests }}" wire:model="guests"/>
                                @error('guests') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-md-4 control-label">{{ __('Year factory boat') }}</label>
                            <div class="col-md-12">
                                <input type="date" class="form-control input-md" wire:model="year_factory_boat"/>
                                @error('year_factory_boat') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-md-4 control-label">{{ __('Boat size') }} : {{ $boat_size }}</label>
                            <div class="col-md-12">
                                <input type="range" class="form-control input-md" min="0" max="{{ $SettingBoatSize }}" wire:model="boat_size"/>
                                @error('boat_size') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-md-4 control-label">{{ __('Price') }} : {{ $price }}$</label>
                            <div class="col-md-12">
                                <input type="range" class="form-control input-md" min="500" max="10000" wire:model="price"/>
                                @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-md-4 control-label">{{ __('Captained') }}</label>
                            <div class="col-md-12">
                                <select class="form-control" wire:model="captained">
                                    <option value="0">{{ __('disable') }}</option>
                                    <option value="1">{{ __('enable') }}</option>
                                </select>
                                @error('captained') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-md-4 control-label">{{ __('status') }}</label>
                            <div class="col-md-12">
                                <select class="form-control" wire:model="status">
                                    <option value="0">{{ __('disable') }}</option>
                                    <option value="1">{{ __('enable') }}</option>
                                </select>
                                @error('active') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-md-4 control-label">{{ __('boats.category') }}</label>
                            <div class="col-md-12">
                                <select class="form-control" wire:model="category">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-md-4 control-label">{{ __('boats.country') }}</label>
                            <div class="col-md-12">
                                <select class="form-control" wire:model="country">
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                @error('country') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-md-4 control-label">{{ __('boats.description') }}</label>
                            <div class="col-md-12">
                                <textarea placeholder="{{ __('boats.description') }}" class="form-control input-md" wire:model="description"></textarea>
                                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-md-4 control-label">{{ __('boats.address') }}</label>
                            <div class="col-md-12">
                                <textarea placeholder="Address" class="form-control input-md" wire:model="address"></textarea>
                                @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-md-4 control-label">{{ __('boats.boat_image') }}</label>
                            <div class="col-md-12">
                                <input type="file" class="mt-4 custom-file-input" wire:model="newImg"/>
                                <div wire:loading wire:target="newImg" class="text-primary fw-bolder">{{ __('uploading') }}</div>
                                @if($newImg)
                                    <img class="card-img-top w-25 rounded lightboxed h-100 w-100" rel="group1" src="{{ $newImg->temporaryUrl() }}" data-link="{{ $newImg->temporaryUrl() }}" data-caption="{{ $newImg->temporaryUrl() }}" />
                                @else
                                    <img class="card-img-top w-25 rounded lightboxed h-100 w-100" rel="group1" src="{{ asset('assets/images/boat') }}/{{ $image }}" data-link="{{ asset('assets/images/boat') }}/{{ $image }}" data-caption="{{ $photo_path }}" />
                                @endif
                                @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary float-right">{{ __('save') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
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
