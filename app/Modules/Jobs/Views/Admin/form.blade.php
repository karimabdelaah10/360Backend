@include('BaseApp::form.input',['name'=>'title',
     'value'=> $row->title ?? null,
     'type'=>'text','attributes'=>[
         'id'=>'title',
         'class'=>'form-control',
         'label'=>trans('jobs.title'),
         'placeholder'=>trans('jobs.title'),
         'required'=>1
         ]
     ])
@include('BaseApp::form.input',['name'=>'description',
     'value'=> $row->description ?? null,
     'type'=>'textarea','attributes'=>[
         'id'=>'description',
         'class'=>'form-control',
         'label'=>trans('jobs.description'),
         'placeholder'=>trans('jobs.description'),
         'required'=>1
         ]
     ])
