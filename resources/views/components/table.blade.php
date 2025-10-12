@props([
    'headers' => [],
])

<div class="overflow-x-auto">
    <table {{ $attributes->merge(['class' => 'min-w-full divide-y divide-default']) }}>
        @if(count($headers) > 0)
            <thead class="bg-card/80 backdrop-blur-sm">
                <tr>
                    @foreach($headers as $header)
                        @php
                            // Support both string headers and array headers with alignment
                            if (is_array($header)) {
                                $headerText = $header['text'] ?? $header[0] ?? '';
                                $headerAlign = $header['align'] ?? 'left';
                            } else {
                                $headerText = $header;
                                $headerAlign = 'left';
                            }
                            $alignClass = match($headerAlign) {
                                'right' => 'text-right',
                                'center' => 'text-center',
                                default => 'text-left',
                            };
                        @endphp
                        <th scope="col" class="px-6 py-3 {{ $alignClass }} text-xs font-medium text-muted uppercase tracking-wider">
                            {{ $headerText }}
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

