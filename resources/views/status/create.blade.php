 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
 
    <link href="{{asset('vendor/StatusModule/css/bootstrap.rtl.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/StatusModule/css/dataTables.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/StatusModule/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/StatusModule/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/StatusModule/css/screenMediaCss.css')}}" rel="stylesheet">
   <link href="{{asset('vendor/StatusModule/css/adminlte.min.css')}}" rel="stylesheet">

 </head>

 <body>
    @include('StatusModule::status.layouts._alert-session')

    @include('StatusModule::status.layouts._error-form')
    <section class="container my-2">

        <a  data-toggle="collapse" href="#collapse-system" aria-expanded="true" aria-controls="collapse-system"
            id="heading-system" class="d-block ">
            <i class="fa fa-chevron-down pull-right "></i>
            تكوين نظام
        </a>

        <div id="collapse-system" class="collapse show" aria-labelledby="heading-system">
            <p class="card-header"> </p>


            <div>
               

                <form action="{{ route('system.store') }}" method="post">
                    <div class="d-flex border h-0 align-items-center p-2 ">

                        @csrf
                        <div class=" form-group px-2">
                            <label for="system_name_id">{{__('statuCustomeTrans.system_name')}}</label>
                            <input name="system_name" type="text"  value="{{old('system_name')}}" @class(['form-control', 'is-invalid' => $errors->has('system_name')]) id="system_name_id"
                                title="اسماء الانظمة الرئيسة المشغولة بهذا البرنامج">
                            @include('StatusModule::status.layouts._show-error', ['field_name' => 'system_name'])
                        </div>
                        <div class="  form-group px-2">
                            <label for="description_id">{{(__('statuCustomeTrans.description'))}}</label>
                            <input name="description" type="text"  value="{{old('description')}}"  @class(['form-control', 'is-invalid' => $errors->has('description')]) id="description_id" title="شرح بسيط عن النظام">
                            @include('StatusModule::status.layouts._show-error', ['field_name' => 'description'])
                        </div>
                    </div>
                    <div>
                        @include('StatusModule::status.layouts.2button')
                    </div>

            </div>

            </form>



            <div class="container">
                <table class="table  my-5">
                    <thead>
                        <th>#</th>
                        <th>{{__('statuCustomeTrans.system_name')}}</th>
                        <th>حالة النظام</th>
                        <th>{{__('statuCustomeTrans.description')}}</th>
                    </thead>
                    <tbody>

                        @foreach ($systems_data as $system_data)
                            <tr>
                                <td>{{ $system_data->id }}</td>
                                <td>{{ $system_data->system_name }}</td>
                                <td @class ([
                                    'text-success' => ($system_data->active = 1),
                                    'text-danger' => ($system_data->active = 0),
                                ])>{{ $system_data->active = 1 ? 'فعال' : 'غير فعال' }}</td>
                                <td>{{ $system_data->description }}</td>
                            </tr>
                        @endforeach



                    </tbody>
                </table>
            </div>
        </div>

        <form action="{{ route('status.store') }}" method="post">
            @csrf

            {{-- <h5 class="my-4 text-primary" >ادخال ثابت جديد</h5> --}}
            <div  class="mt-4"  ></div>
            <a data-toggle="collapse" href="#collapse-status" aria-expanded="true" aria-controls="collapse-status"
            id="heading-status" class="d-block ">
            <i class="fa fa-chevron-down pull-right "></i>
            ادخال ثابت جديد
        </a>
        <div id="collapse-status" class="collapse show" aria-labelledby="heading-status">
            <p class="card-header"> </p>

            <div class="container d-lg-flex justify-content-evenly align-items-center  p-3 "
                style="border : 1px solid #dee2e6 ; border-bottom-style : none ; ">

                <div class="form-group px-2 ">
                    <label for="status_name_id" style="text-align:right !important;">اسم الثابت</label>
                    <input name="status_name" type="text" @class(['form-control', 'is-invalid' => $errors->has('status_name')]) id="status_name_id">
                    @include('StatusModule::status.layouts._show-error', ['field_name' => 'status_name'])
                </div>



                <div class="form-group px-2">
                    <label for="parent_id_id">ثابت رئيسي</label>
                    <select class="custom-select form-control" name="p_id">
                        <option value="" hidden>اختار</option>
                        @foreach ($all_data->whereNull('p_id') as $parent)
                            <option value="{{ $parent->id }}">{{ $parent->status_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group px-2">
                    <label for="parent_sub_id">ثابت فرع</label>
                    <select class="custom-select form-control" name="p_id_sub">
                        <option value="" hidden>اختار</option>
                        @foreach ($all_data->wherein('p_id', [1])->whereNull('p_id_sub') as $sub_parent)
                            <option value="{{ $sub_parent->id }}">{{ $sub_parent->status_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group px-2">
                    <label for="used_in_system_id"> الثابت تابع لنظام</label>
                    <select class="custom-select form-control" name="used_in_system_id" id="used_in_system_id">
                        <option value="" hidden>اختار </option>
                        @foreach ($systems_data as $system_data)
                            <option value="{{ $system_data->id }}">{{ $system_data->system_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group px-2">
                    <label for="note_id">ملاحظات</label>
                    <input name="description" type="text" class="form-control" id="note_id" value="">
                </div>


            </div>


            <div class="container d-flex  p-2" style="border : 1px solid #dee2e6 ; border-top-style : none ; ">

                <div class="form-group px-2">
                    <label for="page_name_id">اسم الصفحة</label>
                    <input name="page_name" type="text" class="form-control" id="page_name_id" value="">
                </div>

                <div class="form-group px-2">
                    <label for="route_system_name_id">اسم الرابط الرئيسي</label>
                    <input name="route_system_name" type="text" id="route_system_name_id" value=""
                        class="form-control">
                </div>


                <div class="form-group px-2">
                    <label for="route_name_id">رابط الصفحة</label>
                    <input name="route_name" type="text" class="form-control" id="route_name_id" value="">
                </div>

            </div>
            <div class="container px-0">
                @include('StatusModule::status.layouts.2button')
            </div>

        </form>
    </div>
    </section>

    <section class=" mb-5 mt-3 container ">
        <table class="table border   hover " id="mytable"  >
            <thead>
                <th>#</th>
                <th>اسم الثابت</th>
                <th>التابع الرئيسي</th>
                <th>التابع الفرعي</th>
                <th>اسم النظام</th>
            </thead>
            <tbody >

                @foreach ($all_data as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->status_name }}</td>
                        <td>{{ $data->status_p_id->status_name ?? '//' }}</td>
                        <td>{{ $data->status_p_id_sub->status_name ?? '//' }}</td>
                        <td>{{ $data->systemname->system_name ?? '' }}</td>

                    </tr>
                @endforeach


            </tbody>
        </table>
    </section>
 

    <script src="{{asset('vendor/StatusModule/js/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/StatusModule/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('vendor/StatusModule/js/dataTables.js')}}"></script>



    <script>
 
        let table = new DataTable('#mytable', {
            order: [ 'desc'],
            "bProcessing": true,
            "sAutoWidth": false,
        "bDestroy":true,
               
            
    });
    </script>
 </body>
 </html>



