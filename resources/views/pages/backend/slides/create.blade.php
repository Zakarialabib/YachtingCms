@extends('layouts.backend')

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>{{ __('Slider List') }}</h3>
        </div>
        <div class="title_right">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('slides.index') }}">{{ __('Add New Slider') }}</a>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    @livewire('admin.sliders.add')

@endsection

@push('scripts')
    <script>
        $('#lfm').filemanager('image');
    </script>
@endpush
