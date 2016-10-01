<table class="table table-striped" id="table">
  <section class="leads" data-next-page="">
    <thead>
    <th>Lead Name:</th>
    <th>Action:</th>
    </thead>
    <tbody>

    @foreach($leads as $key => $value)
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
      <td>{!! $leads->render() !!}</td>
    </tr>
  </section>
  </tbody>
</table>