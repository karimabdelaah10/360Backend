@foreach(config("translatable.locales") as $lang)
    @include('BaseApp::form.input',['name'=>'title:'.$lang,
        'value'=> $row->translateOrDefault($lang)->title ?? null,
        'type'=>'text','attributes'=>['class'=>'form-control',
        'label'=>trans('slider.Title').' '.$lang,
        'placeholder'=>trans('slider.Title'),
        'required'=>1]])
@endforeach


@include('BaseApp::form.file',['name'=>'image',
        'attributes'=>['class'=>'form-control custom-file-input',
        'label'=>trans('slider.Image'),'value'=>$row->image]])

@foreach(config("translatable.locales") as $lang)
    @include('BaseApp::form.input',['name'=>'description:'.$lang,
        'value'=> $row->translateOrDefault($lang)->description ?? null,
        'type'=>'textarea','attributes'=>['class'=>'form-control',
        'label'=>trans('slider.Description').' '.$lang,
        'placeholder'=>trans('slider.Description').' '.$lang,
        'required'=>1]])
@endforeach

@foreach(config("translatable.locales") as $lang)
    @include('BaseApp::form.input',['name'=>'link:'.$lang,
        'value'=> $row->translateOrDefault($lang)->link ?? null,
        'type'=>'text','attributes'=>['class'=>'form-control',
        'label'=>trans('slider.Link').' '.$lang,
        'placeholder'=>trans('slider.Link'),
        'required'=>1]])
@endforeach
@include('BaseApp::form.input',['name'=>'index',
       'value'=> $row->index ?? null,
       'type'=>'number','attributes'=>['class'=>'form-control',
       'label'=>trans('slider.Index'),
       'placeholder'=>trans('slider.Index'),
       'required'=>1]])

@include('BaseApp::form.boolean',['name'=>'is_active','attributes'=>['label'=>trans('slider.Is active')]])
