<table class="table table-striped" id="table">
    <section class="account" data-next-page="">
        <thead>
        <th>Account Name:</th>
        <th>Action:</th>
        </thead>
        <tbody>

        @foreach($accounts as $key => $value)
            <tr>
                <td>{{ $value->name }}</td>

                <td>
                    <button class="btn btn-block btn-primary btn-sm" type="button" id="{{$value->id}}"
                            value="{{ $value->name }}">Select
                    </button>
                </td>
            </tr>
        @endforeach
        <tr>
            <td>{!! $accounts->render() !!}</td>
        </tr>
    </section>
    </tbody>
</table>
