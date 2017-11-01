@foreach (session('flash_notification', collect())->toArray() as $message)
    @if ($message['overlay'])
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => $message['title'],
            'body'       => $message['message']
        ])
    @else
        @push('flash-materialize')
            <script type="text/javascript">
                $(document).ready(function () {
                    let $toastContent = $('<span>{{$message['message']}}</span>')
                        .add($('<button class="btn-flat toast-action toast-close ' +
                            '{{config('flash-materialize.colors.'.$message['level'].'.button.background')}} ' +
                            '{{config('flash-materialize.colors.'.$message['level'].'.button.text')}}"' +
                            ' onclick="$(this).parent().remove()">Fechar</button>'));
                    Materialize.toast($toastContent, {{intval($message['time'])}});

                    $('div.toast').addClass('{{config('flash-materialize.colors.'.$message['level'].'.message.background')}}');
                });
            </script>
        @endpush
    @endif
@endforeach

{{ session()->forget('flash_notification') }}