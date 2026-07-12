<column class="w-full h-full items-center justify-center  gap-8">
    <text @press="testCamera" class="text-[120] font-bold text-theme-on-surface-variant">
        {{ $count * 8}}
    </text>

    <row class="gap-8 ">
        <native:icon  @press="decrement" :size="40"
                     class="text-center text-theme-on-secondary px-8 py-4 shadow rounded bg-theme-secondary"
                     :android="App\Icons\Android::ArrowCircleDown"
                     :ios="App\Icons\Ios::ChevronDown"
        />
        <native:icon @press="increment" :size="40" class="text-center text-theme-on-primary px-8 py-4 shadow rounded bg-theme-primary"
                     :android="App\Icons\AndroidOutlined::ArrowCircleUp"
                     :ios="App\Icons\Ios::ChevronUp"
        />
    </row>
</column>
