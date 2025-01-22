
<button {{ $attributes->merge(['type' => 'button',
                                'class' => 'btn btn-primary',
                                'data-bs-toggle'=>'modal']) }}>
                                 {{$slot }}
</button>
