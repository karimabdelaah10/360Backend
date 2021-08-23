<div class="form-group">
    <div class="custom-control custom-control-primary custom-switch">
        <label class="form-label"
               for="basic-icon-default-post">
            {{ @$attributes['label'] }}
        </label>
        <input type="checkbox"
               name="{{$name}}"
               @if($value)
               checked=""
               @endif
               class="custom-control-input"
               id="{{$name}}">

        <label class="custom-control-label" for="{{$name}}"></label>
    </div>
    @if(@$errors)
        @php
            $error_name =(isset($error_name))?$error_name:$name;
        @endphp

        @foreach($errors->get($error_name) as $message)
            <span class='help-inline text-danger'>{{ $message }}</span>
        @endforeach

    @endif
</div>
