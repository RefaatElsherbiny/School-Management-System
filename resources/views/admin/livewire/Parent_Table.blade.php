
<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
</div>


<div class="row">


<div class="col-md-3">
    <label for="">
        <input placeholder="Search" type="text" class="form-control" wire:model.debounce.350ms="search">


    </label>
</div>


<div class="col-md-2">
    <label for="">
<select class="form-control" wire:model="prePage">


    <option value="4">4</option>
    <option value="15">15</option>
    <option value="25">25</option>
    <option value="50">50</option>



</select>

    </label>
</div>

</div>
<button  style="margin-right: 10px; margin-top:10px; margin-bottom:15px" class="btn btn-success pull-left" type="button"
wire:click.prevent="export('xlsx')" >Excel</button>

<button  style="margin-right: 10px ; margin-top:10px"  class="btn btn-default pull-warring" type="button"
wire:click.prevent="pdf('pdf')" >Pdf</button>

<button  style="margin-right: 10px ;margin-top:10px" class="btn btn-primary pull-pramairy" type="button"
wire:click.prevent="xlsx('xlsx')" >xlsx</button>

<button  style="margin-right: 10px; margin-top:10px" class="btn btn-info pull-left" type="button"
wire:click.prevent="html('html')" >html</button>

<button  style="margin-right: 10px;margin-top:10px;" class="btn btn-secondary pull-secondary" type="button"
wire:click.prevent="csv('csv')" >csv</button>




@if ($check_parent)

<button style="margin-right: 20px" class="btn btn-danger" wire:click="deleteCountries()">
    Selected Parents ({{ count($check_parent) }})</button>

@endif

<button class="btn btn-success pull-right"
 wire:click="showformadd" type="button">

 {{ trans('Parent_trans.add_parent') }}

</button><br><br>


<div class="table-responsive">
    <table  class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
           style="text-align: center">
        <thead>
        <tr class="table-success">
            <th>#</th>
            <th></th>
            <th>{{ trans('Parent_trans.Email') }}</th>
            <th>{{ trans('Parent_trans.Name_Father') }}</th>
            <th>{{ trans('Parent_trans.National_ID_Father') }}</th>
            <th>{{ trans('Parent_trans.Passport_ID_Father') }}</th>
            <th>{{ trans('Parent_trans.Phone_Father') }}</th>
            <th>{{ trans('Parent_trans.Job_Father') }}</th>
            <th>{{ trans('Parent_trans.Processes') }}</th>
        </tr>
        </thead>

        <tbody>
        <?php $i = 0; ?>
        @foreach ($my_parents as $my_parent)
            <tr>
                <?php $i++; ?>
                <td>{{ $i }}</td>
                <td><input type="checkbox" value="{{ $my_parent->id }}" wire:model="check_parent"></td>
                <td>{{ $my_parent->Email }}</td>
                <td>{{ $my_parent->Name_Father }}</td>
                <td>{{ $my_parent->National_ID_Father }}</td>
                <td>{{ $my_parent->Passport_ID_Father }}</td>
                <td>{{ $my_parent->Phone_Father }}</td>
                <td>{{ $my_parent->Job_Father }}</td>
                <td>
                    <button wire:click="edit({{ $my_parent->id }})"
                        title="{{ trans('Grades_trans.Edit') }}"
                            class="btn btn-primary ">
                            <i class="fa fa-edit"></i></button>

                    <button  type="button" class="btn btn-danger "
                    wire:click="deleteConfirm({{$my_parent->id}})"
                      title="{{ trans('Grades_trans.Delete') }}">
                      <i class="fa fa-trash"></i></button>



                </td>
            </tr>
        @endforeach


    </table>

</div>
@if (count($my_parents))
{{ $my_parents->links('admin.livewire.livewire-pagination-links') }}
@endif
