@extends('layouts.backend')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>{{__('Add Amenity')}}</h3>
        </div>
    </div>
    <div class="clearfix"></div>

    @livewire('admin.amenities.add')

@endsection