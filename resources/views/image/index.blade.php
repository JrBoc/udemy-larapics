<x-layout title="Discover Free Images">
    <div class="container-fluid mt-4">
        @if($message = session('message'))
            <x-alert type="success" dismissible="true">
                {{ $component->icon() }}
                {{ $message }}
            </x-alert>
        @endif
        <div class="row" data-masonry='{"percentPosition": true }'>
            @foreach($images as $image)
                <div class="col-sm-6 col-lg-4 mb-4">
                    <div class="card">
                        <a href="{{ $image->permalink()}}">
                            <img src="{{ $image->fileUrl() }}" height="100%" alt="{{ $image->title }}" class="card-img-top">
                        </a>
                        <div class="photo-buttons">
                            <a href="{{ $image->route('edit')}}" class="btn btn-sm btn-info me-2">Edit</a>
                            <x-form action="{{ $image->route('destroy') }}" method="delete" method="delete">
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </x-form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $images->links() }}
    </div>
</x-layout>

