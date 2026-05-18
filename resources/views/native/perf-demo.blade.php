<native:column class="w-full h-full bg-theme-background">

    {{-- Stats panel — live numbers refresh every render --}}
    <native:column class="w-full p-4 gap-2 bg-slate-900">

        <native:row class="w-full items-start justify-between">
            <native:column class="gap-0.5">
                <native:text class="text-xs uppercase tracking-wider text-slate-400">PHP renders</native:text>
                <native:text class="text-3xl font-bold text-emerald-400">{{ $renderCount }}</native:text>
            </native:column>
            <native:column class="gap-0.5 items-end">
                <native:text class="text-xs uppercase tracking-wider text-slate-400">Element count</native:text>
                <native:text class="text-3xl font-bold text-sky-400">{{ number_format($lastElementCount) }}</native:text>
            </native:column>
        </native:row>

        <native:row class="w-full items-start justify-between pt-2">
            <native:column class="gap-0.5">
                <native:text class="text-xs uppercase tracking-wider text-slate-400">PHP build</native:text>
                <native:text class="text-xl font-bold text-white">{{ $lastBuildMs }} ms</native:text>
                <native:text class="text-xs text-slate-400">
                    {{ $lastElementCount > 0 ? round($lastBuildMs * 1000 / $lastElementCount, 1) . 'μs / element' : '—' }}
                </native:text>
            </native:column>
            <native:column class="gap-0.5 items-end">
                <native:text class="text-xs uppercase tracking-wider text-slate-400">Tap → render</native:text>
                <native:text class="text-xl font-bold text-white">{{ $lastActionToRenderMs }} ms</native:text>
                <native:text class="text-xs text-slate-400">{{ $lastRenderAt }}</native:text>
            </native:column>
        </native:row>

{{--        <native:text class="text-xs text-slate-400 pt-2">--}}
{{--            "PHP build" = time PHP spent constructing the element tree.--}}
{{--            "Tap → render" = wall-clock from your tap entering PHP to the build completing--}}
{{--            (the wire-ship + native parse are after this).--}}
{{--            "PHP renders" only ticks on state changes — scroll the list, it stays put.--}}
{{--        </native:text>--}}

        {{-- RN comparison context (published 2026 numbers, see notes) --}}
{{--        <native:column class="bg-slate-800 rounded-lg p-2 mt-2 gap-0.5">--}}
{{--            <native:text class="text-xs uppercase tracking-wider text-amber-400">vs React Native (2026, New Arch)</native:text>--}}
{{--            <native:text class="text-xs text-slate-300">--}}
{{--                RN published: ~900ms paint improvement on 1500-component renders (New Arch vs old bridge).--}}
{{--                Cold start ~4s. Frame budget 16.67ms.--}}
{{--                Bundle ~11MB+. Memory 155-280MB for scrollable lists.--}}
{{--            </native:text>--}}
{{--            <native:text class="text-xs text-slate-300">--}}
{{--                NativePHP: per-frame scrolling/animations/gestures = 0 PHP. Only discrete state changes go through PHP.--}}
{{--                Bundle dominated by embedded PHP runtime (~MB) + native UI (~MB).--}}
{{--            </native:text>--}}
{{--        </native:column>--}}

    </native:column>

    {{-- Stress controls — row-count buttons --}}
    <native:column class="w-full px-4 pt-3 pb-2 gap-2">
        <native:text class="text-xs uppercase tracking-wider text-theme-on-surface-variant">
            Re-build the tree at different sizes
        </native:text>
        <native:row class="gap-2">
            @foreach ([50, 500, 5000, 50000] as $n)
                <native:column
                    @press="setRows({{ $n }})"
                    class="flex-1 py-2 rounded-lg items-center justify-center bg-sky-500"
                    :opacity="$rowCount === $n ? 1 : 0.4"
                    :animate-duration="200">
                    <native:text class="text-white text-xs font-semibold">{{ number_format($n) }}</native:text>
                </native:column>
            @endforeach
        </native:row>
        <native:row class="gap-2">
            @foreach ([200, 1500] as $n)
                <native:column
                    @press="setRows({{ $n }})"
                    class="flex-1 py-2 rounded-lg items-center justify-center bg-sky-500"
                    :opacity="$rowCount === $n ? 1 : 0.4"
                    :animate-duration="200">
                    <native:text class="text-white text-xs font-semibold">{{ number_format($n) }}</native:text>
                </native:column>
            @endforeach
        </native:row>
        <native:text class="text-xs text-theme-on-surface-variant">
            Tap a size. With <native:virtual-list />, only the visible window is built —
            50,000 rows costs the same per render as 50.
        </native:text>
    </native:column>

    {{-- Windowed list — `count` is the logical total; PHP only emits
         rows inside [virtualWindowFrom..virtualWindowTo]. Native fires
         setVirtualWindow(from, to) as the visible range moves. --}}
    <native:virtual-list
        class="flex-1 w-full"
        :count="$rowCount"
        :from="$virtualWindowFrom"
        :to="$virtualWindowTo"
        :estimated-row-height="72"
        :overscan="40"
        item="native.perf-row"
        on-window-change="setVirtualWindow" />

</native:column>
