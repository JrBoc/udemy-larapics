<div {{
    $attributes
        ->merge([
            'class' => $getClasses,
            'role' => $attributes->prepends('alert'),
        ])
    }}>
    {{ $slot }}

    @if($dismissible)
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    @endif
</div>

