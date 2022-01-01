@extends('admin.layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('Grades.Grades') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('Grades.Grades') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">


@if ($errors->any())
    <div class="error">{{ $errors->first('Name') }}</div>
@endif


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


            <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                {{ trans('Grades.Grades_List') }}
            </button>
            <br><br>

            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('Grades.name_stuff') }}</th>
                            <th>{{ trans('Grades.notes_grade') }}</th>
                            <th>{{ trans('Grades.process') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($Grades as $Grade)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td>{{ $Grade->name_grades }}</td>
                                <td>{{ $Grade->note_grades }}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $Grade -> id }}"
                                        title=""><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $Grade -> id }}"
                                        title=""><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            <!-- start edit_modal_Grade -->

<div class="modal fade" id="edit{{ $Grade->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                    id="exampleModalLabel">
                    {{ trans('Grades_trans.edit_Grade') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('grades.update', 'test') }}" method="post">
                    {{ method_field('patch') }}
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="Name"
                                class="mr-sm-2">{{ trans('Grades.name_stuff') }}
                                :</label>
                            <input id="Name" type="text" name="Name"
                                class="form-control"
                                value="{{ $Grade->getTranslation('name_grades', 'ar') }}"
                                required>
                            <input id="id" type="hidden" name="id" class="form-control"
                                value="{{ $Grade->id }}">
                        </div>
                        <div class="col">
                            <label for="Name_en"
                                class="mr-sm-2">{{ trans('Grades.name_stuff') }}
                                :</label>
                            <input type="text" class="form-control"
                                value="{{ $Grade->getTranslation('name_grades', 'en') }}"
                                name="Name_en" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label
                            for="exampleFormControlTextarea1">{{ trans('Grades.notes_grade') }}
                            :</label>
                        <textarea class="form-control" name="Notes"
                            id="exampleFormControlTextarea1"

                            rows="3">{{ $Grade->note_grades }}</textarea>
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

                            <!-- end edit_modal_Grade -->

                            <!-- start delete_modal_Grade -->
        <div class="modal fade" id="delete{{ $Grade->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                            id="exampleModalLabel">
                            {{ trans('Grades.messege_delete') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('grades.destroy', 'test') }}" method="post">
                            {{ method_field('Delete') }}
                            @csrf
                            {{ trans('Grades.messege_delete_body') }}

                            {{  $Grade -> name_grades }}
                            <input id="id" type="hidden" name="id" class="form-control"
                                value="{{ $Grade->id }}">
                            <div class="modal-footer">
                                <button type="submit"
                                class="btn btn-danger">{{ trans('Grades.Yes') }}</button>

                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ trans('Grades.No') }}</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

                            <!-- end delete_modal_Grade -->


                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>


<!-- start add_modal_Grade -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('Grades.add_model_ar') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('grades.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">{{ trans('Grades.add_model_en') }}
                                :</label>
                            <input id="Name" type="text" name="Name" class="form-control">
                        </div>
                        <div class="col">
                            <label for="Name_en" class="mr-sm-2">{{ trans('Grades.add_model_en') }}
                                :</label>
                            <input type="text" class="form-control" name="Name_en">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">{{ trans('Grades.add_model_notes') }}
                            :</label>
                        <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1"
                            rows="3"></textarea>
                    </div>
                    <br><br>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">{{ trans('Grades.Yes') }}</button>

                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">{{ trans('Grades.No') }}</button>
            </div>
            </form>

        </div>
    </div>
</div>
<!-- end add_modal_Grade -->

</div>

<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
