@if (isset($datas['errors']) && isset($datas['field']))
    @if ($datas['errors']->has($datas['field']))
        @if (count($datas['errors']->get($datas['field'])) > 1)
            @foreach ($datas['errors']->get($datas['field']) as $error)
                @if (is_array($error))
                    @foreach ($error as $er)
                        <span class="text-text-danger block">{{ $er }}</span>
                    @endforeach
                @else
                    <span class="text-text-danger block">{{ $error }}</span>
                @endif
            @endforeach
        @else
            <span class="text-text-danger block">{{ $datas['errors']->first($datas['field']) }}</span>
        @endif
    @endif
@endif
