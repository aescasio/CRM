<!-- START ACCORDION -->
<div class="box-group" id="accordion">
    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
    <div class="panel box">
        <div class="box-header with-border">
            <h4 class="box-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#overview">Overview</a>
            </h4>
        </div>
        <div id="overview" class="panel-collapse collapse in">
            <!-- Body Content starts here -->

            <div class="box-body">
                <!--  Form fields -->
                <div class="form-group">
                    <!-- Salutation Field -->
                    <div class="form-group">
                        {!! Form::label('salutation', 'Salutation:') !!}
                        <p>{!! $contact->salutation !!}</p>
                    </div>

                    <!-- First Name Field -->
                    <div class="form-group">
                        {!! Form::label('firstname', 'First Name:') !!}
                        <p>{!! $contact->first_name !!}</p>
                    </div>

                    <!-- MI Field -->
                    <div class="form-group">
                        {!! Form::label('mi', 'M.I.:') !!}
                        <p>{!! $contact->mi !!}</p>
                    </div>

                    <!-- Last Name Field -->
                    <div class="form-group">
                        {!! Form::label('lastname', 'Last Name:') !!}
                        <p>{!! $contact->last_name !!}</p>
                    </div>

                    <!-- Designation Field -->
                    <div class="form-group">
                        {!! Form::label('Position', 'Designation #:') !!}
                        <p>{!! $contact->designation !!}</p>
                    </div>

                    <!-- Department Field -->
                    <div class="form-group">
                        {!! Form::label('department', 'Department:') !!}
                        <p>{!! $contact->department !!}</p>
                    </div>

                    <!-- Office Phone Field -->
                    <div class="form-group">
                        {!! Form::label('Office', 'Office #:') !!}
                        <p>{!! $contact->last_name !!}</p>
                    </div>

                    <!-- Mobile Phone Field -->
                    <div class="form-group">
                        {!! Form::label('mobileno', 'Mobile #:') !!}
                        <p>{!! $contact->mobile !!}</p>
                    </div>

                    <!-- Fax Field -->
                    <div class="form-group">
                        {!! Form::label('fax', 'Fax #:') !!}
                        <p>{!! $contact->fax !!}</p>
                    </div>

                    <!-- Account ID Field -->
                    <div class="form-group">
                        {!! Form::label('account', 'Account:') !!}
                        <p>{!! $contact->Accounts['name'] !!}</p>
                    </div>

                    <!-- Department Field -->
                    <div class="form-group">
                        {!! Form::label('department', 'Department:') !!}
                        <p>{!! $contact->department !!}</p>
                    </div>

                    <!-- Website Field -->
                    <div class="form-group">
                        {!! Form::label('website', 'Website:') !!}
                        <p>{!! $contact->website !!}</p>
                    </div>

                    <!-- Description Field -->
                    <div class="form-group">
                        {!! Form::label('description', 'Description:') !!}
                        <p>{!! $contact->description !!}</p>
                    </div>

                    <!-- Primary Street Field -->
                    <div class="form-group">
                        {!! Form::label('pri street', 'Street:') !!}
                        <p>{!! $contact->primary_street !!}</p>
                    </div>

                    <!-- Primary City Field -->
                    <div class="form-group">
                        {!! Form::label('pri city', 'City:') !!}
                        <p>{!! $contact->primary_city !!}</p>
                    </div>

                    <!-- Primary State Field -->
                    <div class="form-group">
                        {!! Form::label('pri state', 'State:') !!}
                        <p>{!! $contact->primary_state !!}</p>
                    </div>

                    <!-- Primary Postal Field -->
                    <div class="form-group">
                        {!! Form::label('pri postal', 'Postal:') !!}
                        <p>{!! $contact->primary_postal !!}</p>
                    </div>

                    <!-- Primary Country Field -->
                    <div class="form-group">
                        {!! Form::label('pri country', 'Country:') !!}
                        <p>{!! $contact->primary_country !!}</p>
                    </div>

                    <!-- Assigned to Field -->
                    <div class="form-group">
                        {!! Form::label('assigned to', 'Assigned to:') !!}
                        <p>{!! $contact->Users->full_name !!}</p>
                    </div>

                    <!-- Lead Source to Field -->
                    <div class="form-group">
                        {!! Form::label('leadsource', 'Lead Source:') !!}
                        <p>{!! $leadsource->string !!}</p>
                    </div>

                    <!-- Campaign to Field -->
                    <div class="form-group">
                        {!! Form::label('campaign', 'Campaign:') !!}
                        <p>{!! $contact->Campaignsp['name'] !!}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel box">
            <div class="box-header with-border">
                <h4 class="box-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#secondary">Secondary Address</a>
                </h4>
            </div>
            <div id="secondary" class="panel-collapse collapse">
                <!-- Body Content starts here -->
                <div class="box-body">
                    <!-- Primary Street Field -->
                    <div class="form-group">
                        {!! Form::label('pri street', 'Street:') !!}
                        <p>{!! $contact->secondary_street !!}</p>
                    </div>

                    <!-- Primary City Field -->
                    <div class="form-group">
                        {!! Form::label('pri city', 'City:') !!}
                        <p>{!! $contact->secondary_city !!}</p>
                    </div>

                    <!-- Primary State Field -->
                    <div class="form-group">
                        {!! Form::label('pri state', 'State:') !!}
                        <p>{!! $contact->secondary_state !!}</p>
                    </div>

                    <!-- Primary Postal Field -->
                    <div class="form-group">
                        {!! Form::label('pri postal', 'Postal:') !!}
                        <p>{!! $contact->secondary_postal !!}</p>
                    </div>

                    <!-- Primary Country Field -->
                    <div class="form-group">
                        {!! Form::label('pri country', 'Country:') !!}
                        <p>{!! $contact->secondary_country !!}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>