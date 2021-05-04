@include('BaseApp::form.input',
        ['name'=>'name',
    'value'=> $row->title ?? null,
    'type'=>'text',
    'attributes'=>['class'=>'form-control',
    'label'=>trans('projects.name'),
    'placeholder'=>trans('projects.name'),
    'required'=>1]])

@include('BaseApp::form.input',
        ['name'=>'description',
    'value'=> $row->description ?? null,
    'type'=>'text',
    'attributes'=>['class'=>'form-control',
    'label'=>trans('projects.description'),
    'placeholder'=>trans('projects.description'),
    'required'=>1]])

@include('BaseApp::form.file',[
    'name'=>'image',
    'attributes'=>[
            'id'=>'image',
            'class'=>'form-control custom-file-input',
            'image_class'=>'avatar-group pull-up my-0 mb-2 mt-1',
            'image_type'=>'large',
            'height'=>empty($row->getRawOriginal('image')) ? 50 :400,    // create new bannar id row->image empty
            'width'=>empty($row->getRawOriginal('image')) ? 50 :1050,
            'label'=>trans('projects.image'),
            'value'=>$row->getRawOriginal('image')
            ]
            ])

@include('BaseApp::form.select',
        ['name'=>'colorSchema',
    'value'=> $row->colorSchema ?? null,
    'type'=>'text',
    'class'=>'mb-2',
    'options'=>['dark'=>'dark','light'=>'light'],
    'attributes'=>['class'=>'form-control',
    'label'=>trans('projects.colorSchema'),
    'placeholder'=>trans('projects.colorSchema'),
    'required'=>1]])

@include('BaseApp::form.select',
        ['name'=>'category_id',
    'value'=> $row->Category->name ?? null,
    'type'=>'text',
    'options'=>$categories,
    'attributes'=>['class'=>'form-control',
    'label'=>trans('projects.category'),
    'placeholder'=>trans('projects.category'),
    'required'=>1]])
