@foreach($rows as $row)
    @if($row->type == 'text')
    @include('BaseApp::form.input',['name'=>$row->id,
        'value'=> $row->value ?? null,
        'type'=>$row->type,
        'attributes'=>['class'=>'form-control',
        'label'=>trans('configs.'.$row->title),
        'placeholder'=>trans('configs.'.$row->title),
        'required'=>1]])
    @elseif($row->type == 'url')
        @include('BaseApp::form.input',['name'=>$row->id,
            'value'=> $row->value ?? null,
            'type'=>$row->type,
            'attributes'=>['class'=>'form-control',
            'label'=>trans('configs.'.$row->title),
            'placeholder'=>trans('configs.'.$row->title),
            'required'=>1]])
    @elseif($row->type == 'number')
        @include('BaseApp::form.input',['name'=>$row->id,
            'value'=> $row->value ?? null,
            'type'=>'text',
            'attributes'=>['class'=>'form-control',
            'label'=>trans('configs.'.$row->title),
            'placeholder'=>trans('configs.'.$row->title),
            'required'=>1]])
    @elseif($row->type == 'select')
        @include('BaseApp::form.select',
        ['name'=>$row->id,
    'value'=>  $row->value ?? null,
    'type'=>'text',
    'options'=>\App\Modules\Config\Enums\ConfigsEnum::getColorsSelectors(),
    'attributes'=>['class'=>'form-control',
    'label'=>trans('app.'.$row->title),
    'required'=>1]])
        <br>
    @elseif($row->type == \App\Modules\Config\Enums\ConfigsEnum::BOOL)
    @include('BaseApp::form.switch',['name'=>$row->id,
    'value'=> $row->value ?? null,
         'attributes'=>['id'=>'is_verified','class'=>'form-control',
         'label'=>trans('app.'.$row->title),
         'required'=>1]
         ])
    @endif
@endforeach

