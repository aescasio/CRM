<div class="box-body">
    <!-- Email Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
    </div>



    <div class="form-group checkbox-inline col-sm-2">
        {!! Form::checkbox('change_password', 1, false) !!}
        {!! Form::label('change_password', 'Change Password') !!}
    </div>

    <div class="form-group col-sm-6">

        {!! Form::password('password', ['class' => 'form-control', 'disabled'=>true]) !!}
    </div>

    <div class="form-group col-sm-6">
        <div class="pull-left navbar-text">
            @if(isset($profile->photo))
                <img src="{{asset('/img/profile_picture/'.Auth::user()->id.'/'.$profile->photo)}}" class="img-circle" alt="User Image" width="160px" height="160px"/>
            @else
                <img src="{{ asset('/img/png/user_default.png') }}" class="img-circle" alt="User Image" width="160px" height="160px"/>
            @endif
        </div>
        {!! Form::label('photo', 'Profile Picture:') !!}
        {!! Form::file('photo', ['class' => 'form-control inline']) !!}
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('first_name', 'First Name:') !!}
        {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Middle Initial Field -->
    <div class="form-group col-sm-1">
        {!! Form::label('middle_initial', 'M.I.:') !!}
        {!! Form::text('middle_initial', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Last Name Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('last_name', 'Last Name:') !!}
        {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
    </div>

</div>

<div class="box-body">
    <div class="box-footer clearfix">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{!! route('profiles.index') !!}" class="btn btn-default">Cancel</a>
    </div>
</div>

<script>
@section('per_page_script')
$('input[name=change_password]').on("change", function () {
    if (this.checked) {
        $('input[name=password]').prop('disabled', false);
        $('input[name=password_confirmation]').prop('disabled', false);
    }else{
        $('input[name=password]').prop('disabled', true);
        $('input[name=password_confirmation]').prop('disabled', true);
    }
});
@endsection
</script>