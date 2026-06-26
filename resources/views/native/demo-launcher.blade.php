<scroll-view class="w-full h-full bg-theme-background">
    <column class="w-full p-5 gap-3">
        @foreach ($demos as $demo)
            <row
                @press="navigate('{{ $demo['url'] }}')"
                class="items-start gap-4 p-4 bg-theme-surface-variant rounded-2xl shadow"
            >
                <column class="w-[44] h-[44] rounded-full items-center justify-center bg-[{{ $demo['color'] }}]">
                    <icon :name="$demo['icon']" :size="22" color="#FFFFFF" />
                </column>
                <column class="flex-1 gap-0.5">
                    <text class="text-base font-semibold text-theme-on-surface">{{ $demo['title'] }}</text>
                    <text class="text-sm text-theme-on-surface-variant">{{ $demo['subtitle'] }}</text>
                </column>
                <icon name="chevron_right" :size="20" color="#9CA3AF" dark-color="#94A3B8" />
            </row>
        @endforeach
    </column>
</scroll-view>
