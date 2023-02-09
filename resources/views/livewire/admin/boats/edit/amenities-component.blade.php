<div class="p-0 m-0">
    @if (Session::has('message'))
        <div class="col-md-12 mt-3">
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        </div>
    @endif

    <div class="col-md-12 mt-4">
        <div class="card-group mt-2" style="box-shadow: 0 2px 8px rgb(0 0 0 / 35%)">
            <div class="card">
                <div class="card-header">
                    {{ __('Activity') }}
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <form class="form-horizontal">
                            <div wire:ignore>
                                <select id="activity-dropdown" class="form-control" multiple
                                    wire:model="select_activity">
                                    @if ($selectActivity)
                                        @foreach ($selectActivity as $amt)
                                            <option value="{{ $amt->id }}">{{ $amt->option }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            @error('select_activity')
                                <span class="text-danger error">{{ $message }}</span>
                            @enderror
                        </form>
                    </blockquote>
                </div>
                <div class="card-footer">
                    <button class="btn text-white btn-primary float-right"
                        wire:click.prevent="updateActivity">{{ __('save') }}</button>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    {{ __('Navigation safety') }}
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <form class="form-horizontal">
                            <div wire:ignore>
                                <select id="nav-safety-dropdown" class="form-control" multiple
                                    wire:model="select_nav_safety">
                                    @if ($selectNavSafety)
                                        @foreach ($selectNavSafety as $amt)
                                            <option value="{{ $amt->id }}">{{ $amt->option }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            @error('select_nav_safety')
                                <span class="text-danger error">{{ $message }}</span>
                            @enderror
                        </form>
                    </blockquote>
                </div>
                <div class="card-footer">
                    <button class="btn text-white btn-primary float-right"
                        wire:click.prevent="updateNavSafety">{{ __('save') }}</button>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    {{ __('Entertainment') }}
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <form class="form-horizontal">
                            <div wire:ignore>
                                <select id="entertainment-dropdown" class="form-control" multiple
                                    wire:model="select_entertainment">
                                    @if ($selectEntertainment)
                                        @foreach ($selectEntertainment as $amt)
                                            <option value="{{ $amt->id }}">{{ $amt->option }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            @error('select_entertainment')
                                <span class="text-danger error">{{ $message }}</span>
                            @enderror
                        </form>
                    </blockquote>
                </div>
                <div class="card-footer">
                    <button class="btn text-white btn-primary float-right"
                        wire:click.prevent="updateEntertainment">{{ __('save') }}</button>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    {{ __('Comfort') }}
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <form class="form-horizontal">
                            <div wire:ignore>
                                <select id="comfort-dropdown" class="form-control" multiple wire:model="select_comfort">
                                    @if ($selectComfort)
                                        @foreach ($selectComfort as $amt)
                                            <option value="{{ $amt->id }}">{{ $amt->option }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            @error('select_comfort')
                                <span class="text-danger error">{{ $message }}</span>
                            @enderror
                        </form>
                    </blockquote>
                </div>
                <div class="card-footer">
                    <button class="btn text-white btn-primary float-right"
                        wire:click.prevent="updateComfort">{{ __('save') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#activity-dropdown').select2();
            $('#activity-dropdown').on('change', function(e) {
                let data = $(this).val();
                @this.set('select_activity', data);
            });

            $('#nav-safety-dropdown').select2();
            $('#nav-safety-dropdown').on('change', function(e) {
                let data = $(this).val();
                @this.set('select_nav_safety', data);
            });

            $('#entertainment-dropdown').select2();
            $('#entertainment-dropdown').on('change', function(e) {
                let data = $(this).val();
                @this.set('select_entertainment', data);
            });

            $('#comfort-dropdown').select2();
            $('#comfort-dropdown').on('change', function(e) {
                let data = $(this).val();
                @this.set('select_comfort', data);
            });
        });
    </script>
@endpush
