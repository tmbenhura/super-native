<scroll-view class="w-full h-full bg-theme-surface">
    <column class="w-full p-5 gap-5">

        <column class="w-full gap-2">
            <text class="text-2xl font-bold">Profile tab</text>
            <text class="text-sm text-theme-on-surface-variant">
                Third tab. Switching here from the others should be instant and the bar
                should keep its Liquid Glass / opaque appearance throughout.
            </text>
        </column>

        <divider />

        <column class="w-full p-4 rounded-xl bg-theme-surface-variant items-center gap-2">
            <icon :ios="\App\Icons\Ios::Person" :android="\App\Icons\Android::Person" class="text-2xl"></icon>
            <text class="text-base font-semibold text-theme-on-surface">Demo User</text>
            <text class="text-sm text-theme-on-surface-variant">demo@nativephp.com</text>
        </column>

    </column>
</scroll-view>
