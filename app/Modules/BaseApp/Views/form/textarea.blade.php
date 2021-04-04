<div class="form-group">
    <label class="form-label"
           for="{{@$attributes['id']}}">
        {{ @$attributes['label'] }}
    </label>
    <span class="text-danger">{{ (@$attributes['required'])?'*':'' }} {{ (@$attributes['stared'])?'*':'' }}</span>

    {!! Form::$type($name,(@$row->$name)?:(@$value),$attributes)!!}
    @if(@$errors)
        @php
            $name=(isset($error_name))?$error_name:$name;
        @endphp
        @foreach($errors->get($name) as $message)
            <span class='help-inline text-danger'>{{ $message }}</span>
        @endforeach
    @endif
</div>
