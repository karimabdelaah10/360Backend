<div class="form-group mb-5">
    <label class="form-label"
           for="{{$attributes['id']}}">
        {{ @$attributes['label'] }}
        <span class="text-danger">
            {{ (@$attributes['required'])?'*':'' }}
            {{ (@$attributes['stared'])?'*':'' }}
        </span>
    </label>
    <div class="custom-file">
        {!! Form::file($name,$attributes)!!}
        <label class="custom-file-label"
               for="{{$attributes['id']}}">{{trans('app.choose file')}}</label>
        @if(!$errors->isEmpty())
            @foreach($errors->get($name) as $message)
                <span class='help-inline text-danger'>{{ $message }}</span>
            @endforeach

            @if (str_contains($name,'[]') )

                @foreach($errors->get(str_replace("[]",'',$name)."*") as $index => $message)
                    <span class='help-inline text-danger'>{{ $message[0] }}</span>
                @endforeach
            @endif

            <br>
        @endif

        @php
            $value=(@$attributes['value'])?:$row->$name;
        @endphp
        @if(@$attributes['file_type'] == 'attachment' )
            {!! viewFile($value) !!}
        @elseif(@$attributes['file_type'] == 'image' )
            {!! viewImage($value,$attributes['image_type'] ?? 'small' ,$attributes['imageFolder'] ,@$attributes) !!}
        @elseif(@$attributes['file_type'] == 'images' )
            @foreach($value as $val)
                {!! viewImage($val->value,$attributes['image_type'] ?? 'small' ,$attributes['imageFolder'] ,@$attributes) !!}
            @endforeach
        @else
            {!! viewImage($value,$attributes['image_type'] ?? 'small' ,'uploads' ,@$attributes) !!}
        @endif

    </div>
</div>
