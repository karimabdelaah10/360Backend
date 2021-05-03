@include('BaseApp::form.select',
        ['name'=>'wrapperType',
    'value'=> null,
    'options'=>$wrappers_type,
    'attributes'=>['class'=>'form-control',
    'label'=>trans('Sections.wrapper Type'),
    'placeholder'=>trans('Sections.warpper Type'),
    'required'=>1]])

@foreach($component->templateFields as $row)
    @if($row->type == 'text')
        @include('BaseApp::form.input',
        ['name'=>$row->type.'[]',
    'value'=> $row->title ?? null,
    'type'=>$row->type,
    'attributes'=>['class'=>'form-control',
    'label'=>trans('projects.name'),
    'placeholder'=>trans('projects.name'),
    'required'=>1]])
    @elseif($row->type == 'textarea')
        @include('BaseApp::form.textarea',
        ['name'=>$row->type.'[]',
    'value'=> $row->title ?? null,
    'type'=>$row->type,
    'attributes'=>['class'=>'form-control',
    'label'=>trans('projects.name'),
    'placeholder'=>trans('projects.name'),
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
    @endif
@endforeach
