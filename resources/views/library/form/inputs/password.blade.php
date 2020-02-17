<?php $error = false; ?>

@error($slug)
<?php $error = true; ?>
@enderror

<div class="{{isset($class) ? $class : "form-group"}}">
    <label for="{{ $slug }}_input">@isset($icon)<i class="fas fa-{{$icon}} fa-fw"></i>@else{{$name}}@endif</label>

    <input id="{{ $slug }}_input" class="form-control{{($error) ? ' is-invalid' : '' }}" type="password" name="{{ $slug }}" value="{{ isset($value) ? $value : old($slug) }}"
           @isset($placeholder) placeholder="{{ $placeholder }}" @endif
           @isset($required) required @endif
           @isset($autofocus) autofocus @endif
           @isset($autocomplete) autocomplete="current-password" @endif
    >
    @isset($small)
        <small id="{{ $slug }}_help" class="form-text text-muted">{{ $small }}</small>
    @endif


    @error($slug)
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

</div>
