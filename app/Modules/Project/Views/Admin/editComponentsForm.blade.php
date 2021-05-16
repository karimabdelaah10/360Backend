@include('BaseApp::form.select',
        ['name'=>'wrapperType',
    'value'=> null,
    'options'=>$wrappers_type,
    'attributes'=>['class'=>'form-control',
    'label'=>trans('Sections.wrapper Type'),
    'placeholder'=>trans('Sections.warpper Type'),
    'required'=>1]])

@include('BaseApp::form.textarea',
    ['name'=>'order',
'value'=> $component->Section->order ?? null,
'type'=>'text',
'attributes'=>['class'=>'form-control',
'label'=>trans('projects.paragraph'),
'placeholder'=>trans('projects.paragraph'),
]])
@foreach($component->Fields as $row)
    @if($row->type == 'text')
        @include('BaseApp::form.input',
     ['name'=>$row->type.'['.$row->id.']',
    'value'=> $row->value ?? null,
    'type'=>$row->type,
    'attributes'=>['class'=>'form-control',
    'label'=>trans('projects.title'),
    'placeholder'=>trans('projects.title'),
    ]])
    @elseif($row->type == 'textarea')
        @include('BaseApp::form.textarea',
        ['name'=>$row->type.'['.$row->id.']',
    'value'=> $row->value ?? null,
    'type'=>$row->type,
    'attributes'=>['class'=>'form-control',
    'label'=>trans('projects.paragraph'),
    'placeholder'=>trans('projects.paragraph'),
   ]])
    @elseif($row->type == 'file')
        @include('BaseApp::form.file',
          ['name'=>'image['.$row->id.']',
          'type'=>'file',
          'attributes'=>[
              'class'=>'form-control',
              'label'=>trans('categories.image'),
              'id'=>'image['.$row->id.']',
              'imageFolder'=>'projects',
              'file_type'=>'image',
              'image_type'=>'',
              'value'=> $row->value ?? null,
              'height'=>'100',
              'width'=>'100',
              'placeholder'=>trans('categories.image'),
       ]])
    @elseif($row->type == 'select')
        @include('BaseApp::form.select',
         ['name'=>'nextProject',
     'value'=>$row->value ?? null,
     'options'=>$all_projects,
     'attributes'=>['class'=>'form-control',
     'label'=>trans('Sections.all project'),
     'placeholder'=>trans('Sections.all project'),
     ]])

    @endif
@endforeach
