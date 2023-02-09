@extends('layouts.backend')
@section('page-title')  {{__('Sliders List')}}  @endsection

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>{{ __('Slider List') }}</h3>
        </div>
        <div class="title_right">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('slides.create')}}">{{ __('Add New Slider') }}</a>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    @livewire('admin.sliders.index')

@endsection
