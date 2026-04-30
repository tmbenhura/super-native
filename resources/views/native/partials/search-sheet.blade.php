<native:bottom-sheet :visible="$showSearch" @dismiss="closeSearch" detents="medium,large">
    <native:column class="w-full p-6 gap-4">
        <native:row class="w-full items-center gap-3">
            <native:icon name="magnifyingglass" class="text-[20] text-[#A855F7]" />
            <native:text class="text-2xl font-bold flex-1">Search</native:text>
            <native:column @press="closeSearch" class="px-3 py-1 rounded-full bg-[#F1F5F9]">
                <native:text class="text-sm font-semibold text-[#64748B]">Close</native:text>
            </native:column>
        </native:row>

        <native:divider />

        <native:column class="w-full p-4 rounded-xl bg-[#F8FAFC] gap-2">
            <native:text class="text-base font-semibold text-[#0F172A]">Action-tab pattern</native:text>
            <native:text class="text-sm text-gray-500">
                The Search "tab" is a <native:text class="font-semibold text-[#0F172A]">Tab::action()</native:text>,
                not a route. Tapping it fires
                <native:text class="font-semibold text-[#0F172A]">openSearch()</native:text>
                on whichever tab screen is active — Apple's Photos / Mail pattern,
                where the search affordance is an action rather than navigation.
            </native:text>
        </native:column>

        <native:column class="w-full p-4 rounded-xl bg-[#F8FAFC] gap-2">
            <native:text class="text-base font-semibold text-[#0F172A]">Dismiss</native:text>
            <native:text class="text-sm text-gray-500">
                Tap "Close" above, swipe this sheet down, or drag it to the medium detent
                and beyond. <native:text class="font-semibold text-[#0F172A]">@dismiss</native:text>
                fires <native:text class="font-semibold text-[#0F172A]">closeSearch()</native:text>
                so the parent stays in sync.
            </native:text>
        </native:column>
    </native:column>
</native:bottom-sheet>
