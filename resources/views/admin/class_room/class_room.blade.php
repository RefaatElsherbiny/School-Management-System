@extends('admin.layouts.master')

@section('css')

   @toastr_css

@section('title')
    {{ trans('class_room.title_page') }}

@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('class_room.title_page') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')


@if ($errors->any())
    <div class="error">{{ $errors->first('Name') }}</div>
@endif


<div class="row">

<div class="col-xl-12 mb-30">
<div class="card card-statistics h-100">
<div class="card-body">

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<button type="button"  class="button x-small" data-toggle="modal" data-target="#exampleModal">
    {{ trans('class_room.add_class') }}
</button>

<button type="button" class="button x-small" id="btn_delete_all">
    {{ trans('My_Classes_trans.delete_checkbox') }}
</button>

<br><br>



<form style="margin-right: 170px" action="{{ route('Filter_Classes') }}" method="POST">
    {{ csrf_field() }}
    <select  class="selectpicker  btn btn-info btn-lg " data-style="btn-info" name="Grade_id" required
            onchange="this.form.submit()">
        <option value="" selected disabled>{{ trans('My_Classes_trans.Search_By_Grade') }}</option>
        @foreach ($Grades as $Grade)
            <option value="{{ $Grade->id }}">{{ $Grade-> name_grades }}</option>
        @endforeach
    </select>
</form>



<div class="table-responsive">
    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
        style="text-align: center">
        <thead>
            <tr>



<th>
                <input id="check-all" type="checkbox" name="select_all" id="checkboxes" id="example-select-all">
                <label for="check-all"></label>
            </th>


                <th>#</th>
                <th>{{ trans('class_room.Name_class') }}</th>
                <th>{{ trans('class_room.Name_Grade') }}</th>
                <th>{{ trans('class_room.Processes') }}</th>
            </tr>
        </thead>
        <tbody>


                @if (isset($details))

                        <?php $List_Classes = $details; ?>
                    @else

                        <?php $List_Classes = $My_Classes; ?>
                    @endif




            <?php $i = 0; ?>
            @foreach ($List_Classes as $My_Class)
                <tr>
                    <?php $i++; ?>


                        <td>
                            <input value="{{ $My_Class->id }}"  type="checkbox"
                            id="whatever_1" class="checkboxes" name="whatever_1">
                            <label for="whatever_1"></label>
                        </td>


                    <td>{{ $i }}</td>
                    <td>{{ $My_Class->name_class }}</td>

                    <td>{{ $My_Class->grades->name_grades }}</td>
                    <td>
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                            data-target="#edit{{ $My_Class->id }}"
                            title="{{ trans('Grades_trans.Edit') }}"><i class="fa fa-edit"></i></button>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#delete{{ $My_Class->id }}"
                            title="{{ trans('Grades_trans.Delete') }}"><i
                                class="fa fa-trash"></i></button>
                    </td>
                </tr>

                <!-- edit_modal_Grade -->
                <div class="modal fade" id="edit{{ $My_Class -> id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                    id="exampleModalLabel">
                                    {{ trans('Grades.edit_Grade') }}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- add_form -->
                                <form action="{{ route('class_room.update' , 'test') }}" method="post">
                                    {{ method_field('patch') }}
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <label for="Name"
                                                class="mr-sm-2">{{ trans('Grades.stage_name_ar') }}
                                                :</label>
                                            <input id="Name" type="text" name="name_class"
                                                class="form-control"
                                                value="{{ $My_Class -> getTranslation('name_class' , 'ar') }}"
                                                required>
                                            <input id="id" type="hidden" name="id" class="form-control"
                                                value="{{ $My_Class -> id }}">
                                        </div>
                                        <div class="col">
                                            <label for="Name_en"
                                                class="mr-sm-2">{{ trans('Grades.stage_name_en') }}
                                                :</label>
                                            <input type="text" class="form-control"
                                                value="{{ $My_Class -> getTranslation('name_class' , 'en') }}"
                                                name="name_class_en" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label
                                            for="exampleFormControlTextarea1">{{ trans('My_Classes_trans.Name_Grade') }}
                                            :</label>
                                        <select class="form-control form-control-lg"
                                                id="exampleFormControlSelect1" name="Grade_id">
                                            <option value="{{ $My_Class->grades->id }}">
                                                {{ $My_Class -> grades -> name_grades  }}
                                            </option>
                                            @foreach ($Grades as $Grade)
                                                <option value="{{ $Grade->id }}">
                                                    {{ $Grade -> name_grades  }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <br><br>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">{{ trans('Grades.No') }}</button>
                                        <button type="submit"
                                            class="btn btn-success">{{ trans('Grades.Yes') }}</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- delete_modal_Grade -->
                <div class="modal fade" id="delete{{ $My_Class->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                    id="exampleModalLabel">
                                    {{ trans('Grades.delete_Grade') }}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('class_room.destroy' , 'test') }}" method="post">
                                    {{ method_field('Delete') }}
                                    @csrf
                                    {{ trans('Grades.Warning_Grade') }}
                                    <input id="id" type="hidden" name="id" class="form-control"
                                        value="{{ $My_Class -> id }}">
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">{{ trans('Grades.No') }}</button>
                                        <button type="submit"
                                            class="btn btn-danger">{{ trans('Grades.Yes') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
    </table>
</div>
</div>
</div>
</div>


<!-- add_modal_class -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
        {{ trans('class_room.add_class') }}
    </h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">

    <form class=" row mb-30" action"{{ route('class_room.store') }}" method="POST">
        @csrf

        <div class="card-body">
            <div class="repeater">
                <div data-repeater-list="List_Classes">
                    <div data-repeater-item>

                        <div class="row">

                            <div class="col">
                                <label for="Name"
                                    class="mr-sm-2">{{ trans('class_room.Name_class') }}
                                    :</label>
                                <input class="form-control" type="text" name="name_class" required />
                            </div>


                            <div class="col">
                                <label for="Name"
                                    class="mr-sm-2">{{ trans('class_room.Name_class_en') }}
                                    :</label>
                                <input class="form-control" type="text" name="name_class_en" required />
                            </div>


                            <div class="col">
                                <label for="Name_en"
                                    class="mr-sm-2">{{ trans('class_room.Name_Grade') }}
                                    :</label>

                                <div class="box">
                                    <select class="fancyselect" name="Grade_id">
@foreach ($Grades as $Grades)

  <option value="{{ $Grades -> id }}">{{ $Grades -> name_grades }}</option>
@endforeach
                                    </select>
                                </div>

                            </div>

                            <div class="col">
                                <label for="Name_en"
                                    class="mr-sm-2">{{ trans('class_room.Processes') }}
                                    :</label>
                                <input class="btn btn-danger btn-block" data-repeater-delete
                                    type="button" value="{{ trans('class_room.delete_row') }}" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-20">
                    <div class="col-12">
                        <input class="button" data-repeater-create type="button"
                        value="{{ trans('class_room.add_row') }}"/>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ trans('Grades.No') }}</button>
                    <button type="submit"
                        class="btn btn-success">{{ trans('Grades.Yes') }}</button>
                </div>


            </div>
        </div>
    </form>
</div>


</div>

</div>

</div>
</div>
</div>

</div>



<div class="modal fade" id="delete_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('My_Classes_trans.delete_class') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('delete_all') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    {{ trans('My_Classes_trans.Warning_Grade') }}
                    <input class="text" type="hidden" id="delete_all_id" name="delete_all_id" value=''>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('My_Classes_trans.Close') }}</button>
                    <button type="submit" class="btn btn-danger">{{ trans('My_Classes_trans.submit') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>



</div>

</div>

<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render






<script type="text/javascript">

    $(function() {
        $("#btn_delete_all").click(function() {
            var selected = new Array();
          var $refat =   $("#datatable input[type=checkbox]:checked").each(function() {
                selected.push(this.value);
                console.log($refat);
            });

            if (selected.length > 0) {
                $('#delete_all').modal('show')
                $('input[id="delete_all_id"]').val(selected);
            }

        });
    });

</script>
@endsection
