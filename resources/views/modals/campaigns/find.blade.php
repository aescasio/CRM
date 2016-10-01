<!-- Large Modal-->
<div class="modal fade" id="findCampaign" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Find Campaign</h4>
            </div>
            <div class="modal-body">

                <!-- Assigned To Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('assigned_to', 'Assigned To:', ['class'=>'required']) !!}
                    {{ Form::select('assigned_to', $users_options, null, ['class' => 'form-control']  ) }}
                </div>

            <!-- End of modal-body -->
            </div>
            <div class="modal-footer">

                {!! Form::button('Save changes', ['class' => 'btn btn-primary']) !!}

                {!! Form::button('Close', ['class' => 'btn btn-default', 'data-dismiss'=>'modal']) !!}
            </div>
        </div>
    </div>
</div>