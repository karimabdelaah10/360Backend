@include('BaseApp::form.input',['name'=>'name',
     'value'=> $row->name ?? null,
     'type'=>'text','attributes'=>['id'=>'name','class'=>'form-control',
     'label'=>trans('user.name'),
     'placeholder'=>trans('user.name'),
     'required'=>1]
     ])

@include('BaseApp::form.input',['name'=>'mobile_number',
     'value'=> $row->mobile_number ?? null,
     'type'=>'text','attributes'=>['id'=>'mobile_number','class'=>'form-control',
     'label'=>trans('user.mobile_number'),
     'placeholder'=>trans('user.mobile_number'),
     'required'=>1]
     ])

@include('BaseApp::form.input',['name'=>'email',
     'value'=> $row->email ?? null,
     'type'=>'email','attributes'=>['id'=>'email','class'=>'form-control',
     'label'=>trans('user.email'),
     'placeholder'=>trans('user.email'),
     'required'=>1]
     ])

@include('BaseApp::form.input',['name'=>'address',
     'value'=> $row->address ?? null,
     'type'=>'text','attributes'=>['id'=>'address','class'=>'form-control',
     'label'=>trans('user.address'),
     'placeholder'=>trans('user.address'),
     'required'=>1]
     ])


@include('BaseApp::form.switch',['name'=>'is_active','value'=> $row->is_active ?? null,
     'attributes'=>['id'=>'is_active','class'=>'form-control',
     'label'=>trans('app.status')]
     ])

@include('BaseApp::form.file',['name'=>'profile_picture',
        'attributes'=>[
            'id'=>'profile_picture',
            'class'=>'form-control custom-file-input',
            'image_class'=>'avatar pull-up my-0 mb-2 mt-1',
            'height'=>100,
            'width'=>100,
            'label'=>trans('user.profile_picture'),
            'value'=>$row->getRawOriginal('profile_picture')]
            ])


@include('BaseApp::form.select',
    [
        'name'=>'admin_type',
        'options'=>\App\Modules\Users\Enums\AdminEnum::usersTypesForSelector(),
        'attributes'=>
        [
            'id'=>'admin_type',
            'class'=>'form-control',
            'label'=>trans('admin.admin_type'),
            'placeholder'=>trans('admin.admin_type')
        ]
    ])

