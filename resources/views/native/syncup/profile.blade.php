<native:scroll-view class="w-full h-full bg-[#f7f9fb]">
    <native:column class="w-full px-5 py-6 gap-8 pb-24">

        {{-- Avatar with camera FAB overlay --}}
        <native:column class="w-full items-center gap-3">
            <native:stack class="w-[128] h-[128]">
                {{-- Outer gradient ring substitute (solid primary as placeholder for the gradient) --}}
                <native:column class="w-[128] h-[128] rounded-full bg-[#00b4d8] items-center justify-center">
                    <native:column class="w-[120] h-[120] rounded-full bg-white items-center justify-center">
                        <native:image src="https://i.pravatar.cc/300?u=suelena" class="w-[112] h-[112] rounded-full" :fit="2" />
                    </native:column>
                </native:column>
                {{-- Camera FAB pinned bottom-right --}}
                <native:row class="w-[128] h-[128] items-end justify-end">
                    <native:column @press="editPhoto" class="w-[36] h-[36] rounded-full bg-[#00677d] items-center justify-center border-4 border-[#f7f9fb]">
                        <native:icon name="camera.fill" :size="16" color="#FFFFFF" />
                    </native:column>
                </native:row>
            </native:stack>
            <native:text class="text-[24] font-bold text-[#191c1e] tracking-tight">Edit Profile</native:text>
            <native:text class="text-[14] text-[#3d494d]">Personalize your digital presence</native:text>
        </native:column>

        {{-- Form fields --}}
        <native:column class="w-full gap-6">
            {{-- Full Name --}}
            <native:column class="w-full gap-1">
                <native:text class="text-[12] font-semibold text-[#00677d] ml-1">Full Name</native:text>
                <native:outlined-text-input
                    value="{{ $name }}"
                    placeholder="Your name"
                    @change="updateName"
                    :variant="0"
                    class="w-full"
                />
            </native:column>

            {{-- Bio --}}
            <native:column class="w-full gap-1">
                <native:text class="text-[12] font-semibold text-[#00677d] ml-1">Bio</native:text>
                <native:outlined-text-input
                    value="{{ $bio }}"
                    placeholder="Tell people about yourself"
                    @change="updateBio"
                    :variant="0"
                    :multiline="true"
                    class="w-full"
                />
                <native:row class="w-full justify-end">
                    <native:text class="text-[10] text-[#6d797e]">{{ strlen($bio) }} / 160</native:text>
                </native:row>
            </native:column>
        </native:column>

        {{-- My SyncUp Code card --}}
        <native:column class="w-full bg-white border border-[#bcc9ce] rounded-3xl p-6 gap-4">
            <native:row class="w-full justify-center">
                <native:text class="text-[18] font-semibold text-[#191c1e]">My SyncUp Code</native:text>
            </native:row>

            {{-- QR placeholder, centered via row --}}
            <native:row class="w-full justify-center">
                <native:column class="w-[192] h-[192] bg-white border border-[#f1f5f9] rounded-2xl items-center justify-center">
                    <native:icon name="qrcode" :size="120" color="#0891b2" />
                </native:column>
            </native:row>

            {{-- Share Link primary --}}
            <native:row @press="shareLink" class="w-full bg-[#00677d] rounded-xl py-4 items-center justify-center gap-2">
                <native:icon name="share" :size="18" color="#FFFFFF" />
                <native:text class="text-[16] font-semibold text-white">Share Link</native:text>
            </native:row>

            {{-- "Or copy link" divider --}}
            <native:row class="w-full items-center gap-3">
                <native:column class="flex-1 h-px bg-[#bcc9ce]" />
                <native:text class="text-[11] font-medium text-[#6d797e]">OR COPY LINK</native:text>
                <native:column class="flex-1 h-px bg-[#bcc9ce]" />
            </native:row>

            {{-- Copy field --}}
            <native:row class="w-full bg-[#f2f4f6] border border-[#bcc9ce] rounded-xl px-3 py-2 items-center gap-2">
                <native:text class="flex-1 px-2 text-[12] font-medium text-[#3d494d]" :maxLines="1">syncup.me/elena_rod</native:text>
                <native:column @press="copyLink" class="w-[36] h-[36] rounded-lg bg-white border border-[#f1f5f9] items-center justify-center">
                    <native:icon name="doc.on.doc" :size="16" color="#00677d" />
                </native:column>
            </native:row>
        </native:column>

        {{-- Save button --}}
        <native:column @press="saveProfile" class="w-full bg-[#67bafd] rounded-2xl py-4 items-center">
            <native:text class="text-[16] font-semibold text-[#004972]">{{ $saved ? 'Saved ✓' : 'Save Changes' }}</native:text>
        </native:column>

        {{-- Sign out --}}
        <native:column @press="signOut" class="w-full items-center pt-2">
            <native:text class="text-[12] text-[#6d797e]">Sign out</native:text>
        </native:column>

    </native:column>
</native:scroll-view>
