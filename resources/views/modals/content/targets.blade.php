<table class="table table-striped" id="table">
  <section class="targets" data-next-page="">
    <thead>
    <th>Contact Name:</th>
    <th>Action:</th>
    </thead>
    <tbody>

    @foreach($targets as $key => $value)
      <tr>
        <td>{{ $value->salutation.'. '.$value->first_name.' '.$value->last_name }}</td>

        <td>
          <button class="btn btn-block btn-primary btn-sm" type="button" id="{{$value->id}}"
                  value="{{ $value->salutation.'. '.$value->first_name.' '.$value->last_name }}">Select
          </button>
        </td>
      </tr>
    @endforeach
    <tr>
      <td>{!! $targets->render() !!}</td>
    </tr>
  </section>
  </tbody>
</table>