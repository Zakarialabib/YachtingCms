@extends('layouts.backend')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>{{__('Edit Boats')}}</h3>
        </div>
    </div>
    <div class="clearfix"></div>

    @livewire('admin.boats.edit', [$boat])

@endsection