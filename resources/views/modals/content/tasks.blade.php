<table class="table table-striped" id="table">
  <section class="tasks" data-next-page="">
    <thead>
    <th>Contact Name:</th>
    <th>Action:</th>
    </thead>
    <tbody>

    @foreach($tasks as $key => $value)
      <tr>
        <td>{{ $value->subject }}</td>

        <td>
          <button class="btn btn-block btn-primary btn-sm" type="button" id="{{$value->id}}"
                  value="{{ $value->subject }}">Select
          </button>
        </td>
      </tr>
    @endforeach
    <tr>
      <td>{!! $tasks->render() !!}</td>
    </tr>
  </section>
  </tbody>
</table>