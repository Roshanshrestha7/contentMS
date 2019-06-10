@if(count($errors) > 0)
    <div class="validation-errors">
        @foreach($errors->all() as $error)
            <div class="validation-error-item" style="color: red        ">
                {{ $error }}
            </div>
        @endforeach
    </div>

@endif