<div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 mb-4">
                <nav class="navbar navbar-light bg-light" style="box-shadow: 0 5px 5px rgb(0 0 0 / 35%)">
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a class=" btn btn-sm btn-outline-primary"
                                href="{{ route('slides.index') }}">{{ __('All Sliders') }}</a>
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
                            <label class="col-md-4 control-label">{{ __('Slider main title') }}</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="{{ __('Slider main title') }}"
                                    class="form-control input-md" wire:model="title" />
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-md-4 control-label">{{ __('Slogan') }}</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="{{ __('Slogan') }}" class="form-control input-md"
                                    wire:model="slogan" />
                                @error('slogan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-md-4 control-label">{{ __('Button Label') }}</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control input-md" wire:model="label" />
                                @error('label')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-md-4 control-label">{{ __('Button Link') }} </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control input-md" 
                                 wire:model="link" />
                                @error('link')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="col-md-4 control-label">{{ __('Slider image') }}</label>
                            <div class="col-md-12">
                                <input type="file" class="mt-4 custom-file-input" wire:model="photo" />
                                <div wire:loading wire:target="photo" class="text-primary fw-bolder">
                                    {{ __('uploading') }}</div>
                                @if ($image)
                                    <img src="{{ $image->temporaryUrl() }}" width="120" />
                                @endif
                                @error('photo')
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
