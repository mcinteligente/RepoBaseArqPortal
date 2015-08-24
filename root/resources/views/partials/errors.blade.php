@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Oops!</strong> @lang('auth.error_title')<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif