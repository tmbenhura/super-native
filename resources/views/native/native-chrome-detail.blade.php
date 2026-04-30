<native:scroll-view class="w-full h-full bg-theme-surface">
    <native:column class="w-full p-5 gap-5">

        <native:column class="w-full gap-2">
            <native:text class="text-2xl font-bold">Pushed Detail</native:text>
            <native:text class="text-sm text-gray-500">
                You arrived here via the NavigationCoordinator pushing this URI onto SwiftUI's
                path. Try edge-swipe back from the left edge — the system gesture should pop
                you back to /native-chrome with state preserved (the share counter survives).
            </native:text>
        </native:column>

        <native:divider />

        <native:column class="w-full gap-2">
            <native:text class="text-base font-semibold">What to verify</native:text>
            <native:text class="text-sm text-gray-500">• Edge-swipe from left pops back to /native-chrome</native:text>
            <native:text class="text-sm text-gray-500">• System back chevron in the top-left also pops</native:text>
            <native:text class="text-sm text-gray-500">• On pop, the previous screen renders during the animation (cached)</native:text>
            <native:text class="text-sm text-gray-500">• Star icon toggles state via `navigationOptions()` action</native:text>
        </native:column>

        <native:column class="w-full p-4 rounded-xl bg-[#F1F5F9] gap-2">
            <native:text class="text-[11] font-semibold text-[#64748B]">STAR STATE</native:text>
            <native:text class="text-base text-[#0F172A]">{{ $starred ? '⭐ Starred' : '☆ Not starred' }}</native:text>
        </native:column>

    </native:column>
</native:scroll-view>
