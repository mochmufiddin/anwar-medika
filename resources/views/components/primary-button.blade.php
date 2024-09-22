<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-block btn-primary btn-lg fw-medium auth-form-btn']) }}>
    {{ $slot }}
</button>
