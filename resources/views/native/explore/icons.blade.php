@php
    use App\Icons\Ios;
    use App\Icons\Android;
    use App\Icons\AndroidOutlined;

    // Swap the section to render here. `<native:lazy-grid>` is itself a
    // scrolling container, so it owns the screen; stacking multiple
    // lazy grids in one parent fights over viewport height. Use this
    // demo as a catalog browser for one enum at a time.
    $section = ['heading' => 'SF Symbols',          'enum' => Ios::class,             'slot' => 'ios'];
//     $section = ['heading' => 'Material (filled)',   'enum' => Android::class,         'slot' => 'android'];
    // $section = ['heading' => 'Material (outlined)', 'enum' => AndroidOutlined::class, 'slot' => 'android'];

    $cases = $section['enum']::cases();
@endphp

<native:column class="w-full h-full bg-theme-background">

    <native:text class="text-lg font-semibold text-theme-on-background px-5 pt-5">
        {{ $section['heading'] }} ({{ count($cases) }})
    </native:text>

    {{-- SwiftUI `LazyVGrid` / Compose `LazyVerticalGrid` — only the rows
         currently in (or about to enter) the viewport are composed, so
         the full Material catalog (~2,000 cells) scrolls smoothly. --}}
    <native:lazy-grid :columns="4" :gap="12" class="flex-1 px-5 py-3">
        @foreach ($cases as $case)
            <native:column class="items-center gap-1 p-3 bg-theme-surface-variant rounded-lg">
                @if ($section['slot'] === 'ios')
                    <native:icon :ios="$case" :size="24" class="text-slate-800 dark:text-white"/>
                @else
                    <native:icon :android="$case" :size="24" class="text-slate-800 dark:text-white"/>
                @endif
                <native:text class="text-[10px] text-center text-theme-on-surface">{{ $case->name }}</native:text>
            </native:column>
        @endforeach
    </native:lazy-grid>

</native:column>
