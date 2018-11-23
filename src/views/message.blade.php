@foreach (session('flash_notification', collect())->toArray() as $message)
    @if ($message['overlay'])
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => $message['title'],
            'body'       => $message['message']
        ])
    @else
        <article class="message is-{{ $message['level'] }} {{ $message['important'] ? 'alert-important' : '' }}"
                 role="alert">
            <div class="message-header">
                @if ($message['important'])
                <button class="delete" aria-label="delete"></button>
                @endif
            </div>
            <div class="message-body">
                {!! $message['message'] !!}
            </div>
        </article>
    @endif
@endforeach

{{ session()->forget('flash_notification') }}
