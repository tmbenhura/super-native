<column class="w-full h-full items-center justify-center bg-white gap-4">
    <text class="text-[100] font-bold text-red-500">{{$count }}</text>
    <row class="gap-8 justify-center">
        <column @press="decrement" class="px-8 py-4 shadow rounded bg-red-500">
            <native:icon :size="40" class="text-center  text-white"
                         :material="App\Icons\Material::DownhillSkiing"
                         :sf="App\Icons\SF::ChevronDown"
            />
        </column>

        <column @press="increment" class="px-8 py-4 shadow rounded bg-blue-500" >
            <native:icon :size="40" class="text-center text-white"
                  :material="App\Icons\MaterialOutlined::AccessAlarm"
                  :sf="App\Icons\SF::ChevronUp"
            />
        </column>
    </row>
</column>
