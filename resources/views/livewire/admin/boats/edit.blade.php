<div>

    <div class="container mt-4">
        <div class="row">

            <div class="col-md-12 mb-4">
                <nav class="navbar navbar-light bg-light" style="box-shadow: 0 5px 5px rgb(0 0 0 / 35%)">
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a class=" btn btn-sm btn-outline-primary" href="{{  route('admin.add.boat') }}">{{ __('Add new boat') }}</a>
                        </li>
                    </ul>
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <form class="form-inline my-2 my-lg-0" action="{{  route('admin.search.boat') }}">
                                <input class="form-control mr-sm-2" type="text" name="search" value="{{ $search }}"  placeholder="{{ __('Search boat') }}" aria-label="Search" />
                                <button class="btn btn-primary my-2 my-sm-0" type="submit">{{ __('search') }}</button>
                            </form>
                        </li>
                    </ul>
                    @if( Auth::user()->role == 'admin' )
                        <form wire:submit.prevent="updateRatio">
                            <ul class="nav ml-auto">
                                <li class="nav-item">
                                    <div class="mt-1 pt-1">
                                        <strong>{{ __('Boat ratio') }} : {{ $ratio }}%</strong>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <input type="range" class="form-control input-md ml-3 mt-1" min="1" max="100" wire:model="ratio" />
                                </li>
                                <li class="nav-item">
                                     <div class="form-group col-md-12">
                                         <div class="col-md-12">
                                             <button type="submit" class="btn btn-sm btn-primary float-right">{{ __('save') }}</button>
                                         </div>
                                     </div>
                                </li>
                            </ul>
                        </form>
                    @endif
                </nav>
            </div>

            @livewire('admin.boats.edit.basic-info-component',['boat' => $boat])

            @livewire('admin.boats.edit.details-info-component',['boat' => $boat])

            @livewire('admin.boats.edit.amenities-component',['boat' => $boat])

            @livewire('admin.boats.edit.images-component',['boat' => $boat])

    </div>

    </div>
</div>
