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
        <div id="oldImagePreview">
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
        <div id="imagePreview" style="display:none;width: 100%;margin-top: 20px">
            <img id="imagePreviewImage" src="">
            <br>
            <br>
        </div>
    </div>
</div>
@push('js')
    <script>
        $(function () {
            $("#{{$attributes['id']}}").on("change", function () {
                var files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

                if (/^image/.test(files[0].type)) { // only image file
                    var reader = new FileReader(); // instance of the FileReader
                    reader.readAsDataURL(files[0]); // read the local file

                    reader.onloadend = function () { // set image data as background of div
                        $("#oldImagePreview").css("display", "none");
                        $("#imagePreview").css("display", "inline-block");
                        $("#imagePreviewImage").css("max-height", "300px");
                        $("#imagePreviewImage").css("max-width", "80%");
                        $("#imagePreviewImage").css("margin", "auto");
                        $("#imagePreviewImage").attr('src', this.result);
                    }
                }
            });
        });
    </script>
@endpush