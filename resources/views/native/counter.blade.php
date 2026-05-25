<column class="w-full h-full items-center justify-center bg-white gap-4">
    <text class="text-[100] font-bold text-blue-600">{{$count}}</text>
    <row class="gap-8 justify-center">
        <column @press="decrement" class="px-8 py-4 shadow rounded bg-cyan-500">
            <native:icon :size="40" class="text-center text-white"
                         :android="App\Icons\Android::ArrowDropDown"
                         :ios="App\Icons\Ios::ChevronDown"
            />
        </column>

        <column @press="increment" class="px-8 py-4 shadow rounded bg-blue-500" >
            <native:icon :size="40" class="text-center text-white"
                  :android="App\Icons\AndroidOutlined::ArrowDropUp"
                  :ios="App\Icons\Ios::ChevronUp"
            />
        </column>
    </row>
</column>
