@include('BaseApp::form.input',
        ['name'=>'name',
    'value'=> $row->name ?? null,
    'type'=>'text',
    'attributes'=>['class'=>'form-control',
    'label'=>trans('categories.name'),
    'placeholder'=>trans('categories.name'),
    'required'=>1]])

@include('BaseApp::form.input',
        ['name'=>'description',
    'value'=> $row->description ?? null,
    'type'=>'text',
    'attributes'=>['class'=>'form-control',
    'label'=>trans('categories.description'),
    'placeholder'=>trans('categories.description'),
    'required'=>1]])

@include('BaseApp::form.file',
    ['name'=>'image',
'value'=> $row->image ?? null,
'type'=>'file',
'attributes'=>['class'=>'form-control',
'label'=>trans('categories.image'),
'id'=>'category-image',
'placeholder'=>trans('categories.image'),
]])
