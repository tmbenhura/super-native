<native:column class="w-full h-full bg-[#f7f9fb] gap-4">

    {{-- Message thread --}}
    <native:scroll-view class="w-full flex-1">
        <native:column class="w-full px-5 py-4 gap-3">

            {{-- Date divider --}}
            <native:row class="w-full justify-center my-2">
                <native:column class="px-3 py-1 rounded-full bg-[#eceef0]">
                    <native:text class="text-[12] font-semibold text-[#6d797e]">TODAY</native:text>
                </native:column>
            </native:row>

            {{-- Messages --}}
            @foreach ($messages as $m)
                @if ($m['fromMe'])
                    {{-- Outgoing — primary bubble, right-aligned --}}
                    <native:row class="w-full justify-end">
                        <native:column class="w-[280] bg-[#00677d] rounded-2xl px-4 py-3 gap-1">
                            <native:text class="text-[14] text-white">{{ $m['text'] }}</native:text>
                            <native:row class="items-center justify-end gap-1">
                                <native:text class="text-[10] text-[#a5f3fc]">{{ $m['time'] }}</native:text>
                                @if (($m['status'] ?? null) === 'read')
                                    <native:icon name="checkmark" :size="14" color="#a5f3fc"/>
                                @elseif (($m['status'] ?? null) === 'sent')
                                    <native:icon name="checkmark" :size="14" color="#7dd3fc"/>
                                @endif
                            </native:row>
                        </native:column>
                    </native:row>
                @else
                    {{-- Incoming — light gray bubble, left-aligned --}}
                    <native:row class="w-full">
                        <native:column class="w-[280] bg-[#F1F5F9] rounded-2xl px-4 py-3 gap-1 border border-[#e2e8f0]">
                            @if (! empty($m['imageUrl']))
                                <native:image src="{{ $m['imageUrl'] }}" class="w-full h-[180] rounded-xl" :fit="2"/>
                            @endif
                            <native:text class="text-[14] text-[#191c1e]">{{ $m['text'] }}</native:text>
                            <native:row class="justify-end">
                                <native:text class="text-[10] text-[#94a3b8]">{{ $m['time'] }}</native:text>
                            </native:row>
                        </native:column>
                    </native:row>
                @endif
            @endforeach

            {{-- Typing indicator --}}
            <native:row class="w-full items-center gap-1 ml-2">
                <native:column class="w-[8] h-[8] rounded-full bg-[#cbd5e1]"/>
                <native:column class="w-[8] h-[8] rounded-full bg-[#cbd5e1]"/>
                <native:column class="w-[8] h-[8] rounded-full bg-[#cbd5e1]"/>
            </native:row>

        </native:column>
    </native:scroll-view>
    <native:divider/>
    <native:row class="w-full gap-2 w-full bg-white border-t border-[#f1f5f9] px-4 pt-3 items-center justify-center">
        <native:icon name="plus.circle.fill" :size="24" color="#64748b"/>
        <native:outlined-text-input
            value="{{ $draft }}"
            placeholder="Message..."
            @change="setDraft"
            class="flex-1"
            :variant="0"
            :multiline="true"
            leading-icon="face.smiling"
        />
        <native:icon name="paperplane.fill" :size="24" color="#94a3b8"/>
    </native:row>

</native:column>
