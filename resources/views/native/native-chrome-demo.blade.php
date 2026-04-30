<native:scroll-view class="w-full h-full bg-theme-surface">
    <native:column class="w-full p-5 gap-5">

        <native:column class="w-full gap-2">
            <native:text class="text-2xl font-bold">Native chrome</native:text>
            <native:text class="text-sm text-gray-500">
                This screen routes through `NativeStackLayout`, which flips `usesNativeChrome()`
                to `true`. The bar above is rendered via SwiftUI's `NavigationStack` toolbar.
                On iOS 26+ it picks up Liquid Glass automatically since `backgroundColor` is unset.
            </native:text>
        </native:column>

        <native:divider />

        <native:column class="w-full gap-2">
            <native:text class="text-base font-semibold">What to verify</native:text>
            <native:text class="text-sm text-gray-500">• Title "Native Chrome" + subtitle stacked in the bar</native:text>
            <native:text class="text-sm text-gray-500">• Back chevron on the left fires PHP back navigation</native:text>
            <native:text class="text-sm text-gray-500">• Share icon + ellipsis on the right are tappable</native:text>
            <native:text class="text-sm text-gray-500">• On iOS 26+: bar uses translucent Liquid Glass</native:text>
        </native:column>

        <native:divider />

        <native:column class="w-full p-4 rounded-xl bg-[#F1F5F9] gap-2">
            <native:text class="text-[11] font-semibold text-[#64748B]">SHARE TAPS</native:text>
            <native:text class="text-2xl font-bold text-[#0F172A]">{{ $shareCount }}</native:text>
        </native:column>

        <native:column class="w-full p-4 rounded-xl bg-[#F1F5F9] gap-2">
            <native:text class="text-[11] font-semibold text-[#64748B]">LAST ACTION</native:text>
            <native:text class="text-base text-[#0F172A]">{{ $lastAction !== '' ? $lastAction : '—' }}</native:text>
        </native:column>

        <native:divider />

        <native:column class="w-full gap-2">
            <native:text class="text-base font-semibold">Multi-level stack</native:text>
            <native:text class="text-sm text-gray-500">
                Tap below to push a detail screen. Edge-swipe-back from there should pop you
                back here with the share counter intact.
            </native:text>
        </native:column>

        <native:column @press="pushDetail" class="w-full px-4 py-3 rounded-xl bg-[#A855F7] items-center">
            <native:text class="text-white font-semibold">View detail →</native:text>
        </native:column>

    </native:column>
</native:scroll-view>
