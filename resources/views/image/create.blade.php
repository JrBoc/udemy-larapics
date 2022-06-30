<x-layout title="Upload new image">
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">Upload your photo</div>
                    <div class="card-body">
                        <x-form action="{{ route('images.store') }}" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label" for="file">File</label>
                                <input class="form-control @error('file') is-invalid @enderror" name="file" type="file" id="formFile">
                                @if($errors->has('file'))
                                    <div class="invalid-feedback">{{ $errors->first('file') }}</div>
                                @else
                                    <div class="form-text">
                                        You can only upload your photo in following types: jpg & png
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="title">Title</label>
                                <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title') }}">
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            {{--<div class="mb-3">--}}
                            {{--    <label class="form-label" for="title">Photo Tags</label>--}}
                            {{--    <input type="text" class="form-control">--}}
                            {{--    <div class="form-text">--}}
                            {{--        Separate your tags with comma--}}
                            {{--    </div>--}}
                            {{--</div>--}}
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Upload</button>
                                <a href="{{ route('images.index') }}" class="btn btn-outline-secondary">Cancel</a>
                            </div>
                        </x-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
