@include('BaseApp::form.input',
        ['name'=>'name',
    'value'=> $row->title ?? null,
    'type'=>'text',
    'attributes'=>['class'=>'form-control',
    'label'=>trans('projects.name'),
    'placeholder'=>trans('projects.name'),
    'required'=>1]])
@include('BaseApp::form.input',
            ['name'=>'title',
        'value'=> $row->title ?? null,
        'type'=>'text',
        'attributes'=>['class'=>'form-control',
        'label'=>trans('projects.title'),
        'placeholder'=>trans('projects.title'),
        'required'=>1]])

@include('BaseApp::form.input',
        ['name'=>'description',
    'value'=> $row->description ?? null,
    'type'=>'text',
    'attributes'=>['class'=>'form-control',
    'label'=>trans('projects.description'),
    'placeholder'=>trans('projects.description'),
    'required'=>1]])

@include('BaseApp::form.select',
        ['name'=>'colorSchema',
    'value'=> $row->colorSchema ?? null,
    'type'=>'text',
    'options'=>['dark','light'],
    'attributes'=>['class'=>'form-control',
    'label'=>trans('projects.colorSchema'),
    'placeholder'=>trans('projects.colorSchema'),
    'required'=>1]])

@include('BaseApp::form.select',
        ['name'=>'category_id',
    'value'=> $row->colorSchema ?? null,
    'type'=>'text',
    'options'=>$categories,
    'attributes'=>['class'=>'form-control',
    'label'=>trans('projects.colorSchema'),
    'placeholder'=>trans('projects.colorSchema'),
    'required'=>1]])

