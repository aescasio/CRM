<table class="table table-striped" id="table">
    <section class="campaign" data-next-page="">
        <thead>
        <th>Campaign Name:</th>
        <th>Action:</th>
        </thead>
        <tbody>

        @foreach($campaigns as $key => $campaign)
            <tr>
                <td>{{ $campaign->name }}</td>
                <td><button class="btn btn-block btn-primary btn-sm" type="button" id="{{$campaign->id}}" value="{{ $campaign->name }}">Select</button></td>
            </tr>
        @endforeach
        <tr>
            <td>{!! $campaigns->render() !!}</td>
        </tr>
    </section>
    </tbody>
</table>
