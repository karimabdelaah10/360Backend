@include('BaseApp::form.input',['name'=>'title',
    'value'=> $row->title ?? null,
    'type'=>'text',
    'attributes'=>['class'=>'form-control',
    'label'=>trans('services.title'),
    'placeholder'=>trans('services.title'),
    'required'=>1]])

@include('BaseApp::form.textarea',['name'=>'description',
    'value'=> $row->description ?? null,
    'type'=>'textarea',
    'attributes'=>['class'=>'form-control',
    'label'=>trans('services.description'),
    'placeholder'=>trans('services.description'),
    'required'=>1]])


