@foreach($rows as $row)
    @if($row->type == 'text')
    @include('BaseApp::form.input',['name'=>$row->id,
        'value'=> $row->value ?? null,
        'type'=>'text','attributes'=>['class'=>'form-control',
        'label'=>trans('configs.'.$row->title),
        'placeholder'=>trans('configs.'.$row->title),
        'required'=>1]])
    @elseif($row->type == 'switch')
        @include('BaseApp::form.switch',['name'=>$row->id,
        'value'=> $row->value ?? null,
             'attributes'=>['id'=>'is_verified','class'=>'form-control',
             'label'=>trans('app.auto_register'),
             'required'=>1]
             ])
    @endif
@endforeach

