<!-- Subject Field -->
<div class="form-group">
    {!! Form::label('subject', 'Subject:') !!}
    <p>{!! $task->subject !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $task->status !!}</p>
</div>

<!-- Start Date Field -->
<div class="form-group">
    {!! Form::label('start_date', 'Start Date:') !!}
    <p>{!! $task->start_date !!}</p>
</div>

<!-- Due Date Field -->
<div class="form-group">
    {!! Form::label('due_date', 'Due Date:') !!}
    <p>{!! $task->due_date !!}</p>
</div>

<div class="form-group">
    {!! Form::label('related_result', 'Related Result:') !!}
    <p>{!! $task->related_result !!}</p>
</div>
{{--

    @if($task->related_to == 'accounts')
        <!-- Related To Field -->
        <div class="form-group">
            {!! Form::label('related_to', 'Related To:') !!}
            <p>Account</p>
        </div>

        <!-- Related Result Field -->
        <div class="form-group">
            {!! Form::label('related_result', 'Related Result:') !!}
            <p>{!! $task->Account['name'] !!}</p>
        </div>
    @elseif($task->related_to == 'contacts')
        <!-- Related To Field -->
        <div class="form-group">
            {!! Form::label('related_to', 'Related To:') !!}
            <p>Contact</p>
        </div>

        <!-- Related Result Field -->
        <div class="form-group">
            {!! Form::label('related_result', 'Related Result:') !!}
            <p>{!! $task->Contact['full_name'] !!}</p>
        </div>
    @elseif($task->related_to == 'leads')
        <!-- Related To Field -->
        <div class="form-group">
            {!! Form::label('related_to', 'Related To:') !!}
            <p>Lead</p>
        </div>

        <!-- Related Result Field -->
        <div class="form-group">
            {!! Form::label('related_result', 'Related Result:') !!}
            <p>{!! $task->Lead['salutation'].'. '.$task->Lead['first_name'].' '.$task->Lead['last_name'] !!}</p>
        </div>
    @elseif($task->related_to == 'opportunities')
        <!-- Related To Field -->
        <div class="form-group">
            {!! Form::label('related_to', 'Related To:') !!}
            <p>Opportunity</p>
        </div>

        <!-- Related Result Field -->
        <div class="form-group">
            {!! Form::label('related_result', 'Related Result:') !!}
            <p>{!! $task->Opportunities['name'] !!}</p>
        </div>
    @elseif($task->related_to == 'projects')
        <td>{!! 'Project' !!}</td>
    @elseif($task->related_to == 'targets')
        <!-- Related To Field -->
        <div class="form-group">
            {!! Form::label('related_to', 'Related To:') !!}
            <p>Target</p>
        </div>

        <!-- Related Result Field -->
        <div class="form-group">
            {!! Form::label('related_result', 'Related Result:') !!}
            <p>{!! $task->Target['salutation'].'. '.$task->Target['first_name'].' '.$task->Target['last_name'] !!}</p>
        </div>
    @elseif($task->related_to == 'tasks')
        <!-- Related To Field -->
        <div class="form-group">
            {!! Form::label('related_to', 'Related To:') !!}
            <p>Task</p>
        </div>

        <!-- Related Result Field -->
        <div class="form-group">
            {!! Form::label('related_result', 'Related Result:') !!}
            <p>{!! $task->subject !!}</p>
        </div>
    @endif
--}}

<!-- Contact Name Field -->
<div class="form-group">
    {!! Form::label('contact_name', 'Contact Name:') !!}
    @if($task->contact_id)
        <p>{!! $task->Contact['salutation'].'. '.$task->Contact['first_name'].' '.$task->Contact['last_name'] !!}</p>
    @endif
</div>

<!-- Priority Field -->
<div class="form-group">
    {!! Form::label('priority', 'Priority:') !!}
    <p>{!! $task->priority !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $task->description !!}</p>
</div>

<!-- Assigned To Field -->
<div class="form-group">
    {!! Form::label('assigned_to', 'Assigned To:') !!}
    <p>{!! $task->User->full_name !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $task->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $task->updated_at !!}</p>
</div>

