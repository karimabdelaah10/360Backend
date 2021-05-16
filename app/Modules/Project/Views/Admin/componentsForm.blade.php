@include('BaseApp::form.select',
        ['name'=>'wrapperType',
    'value'=> null,
    'options'=>$wrappers_type,
    'attributes'=>['class'=>'form-control',
    'label'=>trans('Sections.wrapper Type'),
    'placeholder'=>trans('Sections.warpper Type'),
    'required'=>1]])

    @foreach($componentTemplate->templateFields as $row)
    @if($row->type == 'text')
        @include('BaseApp::form.input',
        ['name'=>$row->type.'[]',
    'value'=> $row->title ?? null,
    'type'=>$row->type,
    'attributes'=>['class'=>'form-control',
    'label'=>trans('projects.title'),
    'placeholder'=>trans('projects.title'),
    'required'=>1]])
    @elseif($row->type == 'textarea')
        @include('BaseApp::form.textarea',
        ['name'=>$row->type.'[]',
    'value'=> $row->title ?? null,
    'type'=>$row->type,
    'attributes'=>['class'=>'form-control',
    'label'=>trans('projects.paragraph'),
    'placeholder'=>trans('projects.paragraph'),
    'required'=>1]])
    @elseif($row->type == 'file')
        @include('BaseApp::form.file',
          ['name'=>'image'.$row->id,
      'value'=> $row->image ?? null,
      'type'=>'file',
      'attributes'=>['class'=>'form-control',
      'label'=>trans('categories.image'),
      'id'=>'image'.$row->id,
      'placeholder'=>trans('categories.image'),
      'required'=>1 ]])
    @elseif($row->type == 'file[]')
        @include('BaseApp::form.file',
          ['name'=>'slider_images[]',
      'value'=>  null,
      'type'=>'file',
      'attributes'=>['class'=>'form-control',
      'label'=>'slider_images',
      'id'=>'slider_images',
      'placeholder'=>trans('categories.images'),
      'required'=>1, 'multiple'=>'multiple' ]])

    @elseif($row->type == 'select')
        @include('BaseApp::form.select',
         ['name'=>'nextProject',
     'value'=> null,
     'options'=>$all_projects,
     'attributes'=>['class'=>'form-control',
     'label'=>trans('Sections.all project'),
     'placeholder'=>trans('Sections.all project'),
     'required'=>1]])
    @endif
@endforeach
