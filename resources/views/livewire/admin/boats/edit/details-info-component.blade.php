<div class="p-0 m-0">
    @if (Session::has('message'))
        <div class="col-md-12 mt-3">
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        </div>
    @endif

    <div class="col-md-12 mt-4">

        <form class="form-horizontal p-2" wire:submit.prevent="updateDetails"
            style="box-shadow: 0 2px 8px rgb(0 0 0 / 35%)">
            <div class="form-row p-3">
                <div class="form-group col-md-3">
                    <label class="col-md-12 control-label">{{ __('Cabines') }} : {{ $cabins }}</label>
                    <div class="col-md-12">
                        <input type="range" placeholder="{{ __('Cabines') }}" class="form-control" min="0"
                            max="{{ $SettingCabins }}" wire:model="cabins" />
                        @error('cabins')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label class="col-md-12 control-label">{{ __('Single beds') }} :
                        {{ $single_beds }}</label>
                    <div class="col-md-12">
                        <input type="range" placeholder="{{ __('Single beds') }}" class="form-control input-md"
                            min="0" max="{{ $SettingSingleBeds }}" wire:model="single_beds" />
                        @error('single_beds')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label class="col-md-12 control-label">{{ __('Double beds') }} :
                        {{ $double_beds }}</label>
                    <div class="col-md-12">
                        <input type="range" placeholder="{{ __('Double beds') }}" class="form-control input-md"
                            min="0" max="{{ $SettingDoubleBeds }}" wire:model="double_beds" />
                        @error('double_beds')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label class="col-md-12 control-label">{{ __('bathrooms') }} :
                        {{ $bathrooms }}</label>
                    <div class="col-md-12">
                        <input type="range" placeholder="{{ __('Bathrooms') }}" class="form-control input-md"
                            min="0" max="{{ $SettingBathRooms }}" wire:model="bathrooms" />
                        @error('bathrooms')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label class="col-md-12 control-label">{{ __('Number of engines') }} :
                        {{ $number_of_engines }}</label>
                    <div class="col-md-12">
                        <input type="range" placeholder="{{ __('Number of engines') }}" class="form-control input-md"
                            min="0" max="{{ $SettingNumberOfEngines }}" wire:model="number_of_engines" />
                        @error('number_of_engines')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label class="col-md-12 control-label">{{ __('Power per motor') }} :
                        {{ $power_per_motor }}</label>
                    <div class="col-md-12">
                        <input type="range" placeholder="{{ __('Power per motor') }}" class="form-control input-md"
                            min="0" max="{{ $SettingPowerPerMotor }}" wire:model="power_per_motor" />
                        @error('power_per_motor')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label class="col-md-12 control-label">{{ __('Gallons per hour') }} :
                        {{ $gallons_per_hour }}</label>
                    <div class="col-md-12">
                        <input type="range" placeholder="{{ __('Gallons per hour') }}" class="form-control input-md"
                            min="0" max="{{ $SettingGallonsPerHour }}" wire:model="gallons_per_hour" />
                        @error('gallons_per_hour')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label class="col-md-12 control-label">{{ __('Booking type : Day or Week') }}</label>
                    <div class="col-md-12">
                        <select class="form-control" wire:model="booking_type">
                            <option value="0">{{ __('day') }}</option>
                            <option value="1">{{ __('week') }}</option>
                        </select>
                        @error('booking_type')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-md-12 mt-2">
                        <button type="submit" id="fire"
                            class="btn btn-primary float-right">{{ __('save') }}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>
