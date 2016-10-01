<div class="box-body">
    <!--  Form fields -->
    <div class="form-group">

        <!-- Name Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Display Name Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('display_name', 'Display Name:') !!}
            {!! Form::text('display_name', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Display Name Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('Description', 'Description:') !!}
            {!! Form::text('description', null, ['class' => 'form-control']) !!}
        </div>

    </div>
</div>
<div class="box-body">
    <div class="form-group">
        <!-- Permissions -->
        <div class="form-group col-sm-6">
            {!! Form::label('permits', 'Assign Permissions:') !!}
            {!! Form::select('permits[]', $permits, $selected_permits , ['class' => 'form-control', 'id'=>'dlistbox' ,'multiple'=>'multiple', 'size'=>'10']) !!}
        </div>
    </div>
</div>
<!-- /.box-body -->
<div class="box-footer clearfix">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('manageRoles.index') !!}" class="btn btn-default">Cancel</a>
</div>

<script>
@section('per_page_script')

        var demo2 = $('#dlistbox').bootstrapDualListbox({
        nonSelectedListLabel: 'Available Permissions',
        selectedListLabel: 'Assigned Permissions',
        preserveSelectionOnMove: 'moved',
        });

@endsection
</script>