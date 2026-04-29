<native:column class="w-full h-full  gap-4 ">
    <native:scroll-view class="w-full flex-1 items-center justify-center">
        <native:text class="text-2xl font-extrabold text-zinc-900 text-center ">Main area</native:text>
    </native:scroll-view>
    <native:divider/>
    <native:row class="w-full gap-2 w-full bg-white border-t border-[#f1f5f9] px-4 pt-3 items-center justify-center">
        <native:icon @press="send" name="plus.circle.fill" :size="24" color="#64748b"/>
        <native:icon @press="send" name="face.smiling" :size="24" color="#94a3b8"/>
        <native:outlined-text-input
            value="hi"
            placeholder="Message..."
            @change="setDraft"
            :variant="0"
            :multiline="true"
            class="flex-1"
        />
        <native:column @press="send" class="w-[40] h-[40] items-center justify-center rounded-full bg-[#00677d]">
            <native:icon name="paperplane.fill" :size="20" color="#94a3b8"/>
        </native:column>
    </native:row>
</native:column>
