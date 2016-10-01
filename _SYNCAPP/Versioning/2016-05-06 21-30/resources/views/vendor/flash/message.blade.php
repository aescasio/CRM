@if (session()->has('flash_notification.message'))
    {{ 'pumasok sya dito' }}}
    @if (session()->has('flash_notification.overlay'))
        @include('vendor.flash.modal', [
            'modalClass' => 'flash-modal',
            'title'      => session('flash_notification.title'),
            'body'       => session('flash_notification.message')
        ])

    @else
        <div class="alert alert-{{ session('flash_notification.level') }}">
            <button type="button"
                    class="close"
                    data-dismiss="alert"
                    aria-hidden="true">&times;</button>

            {!! session('flash_notification.message') !!}
        </div>

    @endif
@endif