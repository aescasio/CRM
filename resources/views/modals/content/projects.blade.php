<table class="table table-striped" id="table">
  <section class="projects" data-next-page="">
    <thead>
    <th>Project Name:</th>
    <th>Status:</th>
    <th>Action:</th>
    </thead>
    <tbody>

    @foreach($projects as $key => $value)
      <tr>
        <td>{{ $value->name }}</td>
        <td>{{ $value->status }}</td>
        <td>
          <button class="btn btn-block btn-primary btn-sm" type="button" id="{{$value->id}}"
                  value="{{ $value->name }}">Select
          </button>
        </td>
      </tr>
    @endforeach
    <tr>
      <td>{!! $projects->render() !!}</td>
    </tr>
  </section>
  </tbody>
</table>