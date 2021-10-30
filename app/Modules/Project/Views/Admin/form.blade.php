@include('BaseApp::form.input',
        ['name'=>'name',
    'value'=> $row->name ?? null,
    'type'=>'text',
    'attributes'=>['class'=>'form-control',
    'label'=>trans('projects.name'),
    'placeholder'=>trans('projects.name'),
    'required'=>1]])
@include('BaseApp::form.input',
['name'=>'sub_title',
'value'=> $row->sub_title ?? null,
'type'=>'text',
'attributes'=>['class'=>'form-control',
'label'=>trans('projects.sub_title'),
'placeholder'=>trans('projects.sub_title'),
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

<br>
@include('BaseApp::form.select',
        ['name'=>'category_id',
    'value'=> $row->Category->name ?? null,
    'type'=>'text',
    'options'=>$categories,
    'attributes'=>['class'=>'form-control',
    'label'=>trans('projects.category'),
    'placeholder'=>trans('projects.category'),
    'required'=>1]])

@include('BaseApp::form.switch',['name'=>'homepage',
        'value'=> $row->homepage ?? null,
             'attributes'=>['id'=>'homepage',
             'class'=>'form-control',
             'label'=>trans('projects.show in home page'),
             'required'=>1,
             ]
             ])
<div id="homepage_order" @if(!$row || !$row->homepage) style="display: none" @endif>
    @include('BaseApp::form.input',
        ['name'=>'homepage_order',
    'value'=> $row->homepage_order ?? null,
    'type'=>'text',
    'attributes'=>['class'=>'form-control',
    'id'=>'homepage_order',
    'label'=>trans('projects.homepage_order'),
    'placeholder'=>trans('projects.homepage_order'),
    'required'=>1,
        ]])
</div>
@push('js')
    <script>
        $('#homepage').click((e)=>{
            if ($('#homepage_order').css('display') === 'none'){
                $('#homepage_order').css('display' , 'inline');
            }else{
                $('#homepage_order').css('display' , 'none');
            }
        });
    </script>
@endpush