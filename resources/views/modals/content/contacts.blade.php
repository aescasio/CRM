<table class="table table-striped" id="table">
  <section class="contacts" data-next-page="">
    <thead>
    <th>Contact Name:</th>
    <th>Action:</th>
    </thead>
    <tbody>

    @foreach($contacts as $key => $value)
      <tr>
        <td>{{ $value->salutation.'. '.$value->full_name }}</td>

        <td>
          <button class="btn btn-block btn-primary btn-sm" type="button" id="{{$value->id}}"
                  value="{{ $value->salutation.'. '.$value->full_name }}">Select
          </button>
        </td>
      </tr>
    @endforeach
    <tr>
      <td>{!! $contacts->render() !!}</td>
    </tr>
  </section>
  </tbody>
</table>