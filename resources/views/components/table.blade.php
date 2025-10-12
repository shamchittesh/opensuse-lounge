@props([
    'headers' => [],
])

<div class="overflow-x-auto">
    <table {{ $attributes->merge(['class' => 'min-w-full divide-y divide-default']) }}>
        @if(count($headers) > 0)
            <thead class="bg-card/80 backdrop-blur-sm">
                <tr>
                    @foreach($headers as $header)
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-muted uppercase tracking-wider">
                            {{ $header }}
                        </th>
                    @endforeach
                </tr>
            </thead>
        @endif
        <tbody class="bg-card/80 backdrop-blur-sm divide-y divide-default">
            {{ $slot }}
        </tbody>
    </table>
</div>

