@if(!empty($errors))
    @if($errors->any())
        <div class="alert alert-danger" style="list-style-type: none">
            <button type="button"
                    class="close"
                    data-dismiss="alert"
                    aria-hidden="true">&times;
            </button>
            <ul>
                @foreach($errors->all() as $error)

                    <li>{!! $error !!}</li>

                @endforeach
            </ul>
        </div>
    @endif
@endif

