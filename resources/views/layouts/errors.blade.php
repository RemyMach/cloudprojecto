@if($errors->any())
    <div class="alert alert-danger col-8 offset-md-2" role="alert">
        <ul>
            @foreach($errors->all() as $errors)
                <p class="error">{{ $errors  }}</p>
            @endforeach
        </ul>
    </div>
@endif
