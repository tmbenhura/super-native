<native:scroll-view class="w-full h-full bg-[#f7f9fb] safe-area">
    <native:column class="w-full px-5 py-10 gap-8 items-center">

        {{-- Header — sync icon block + brand + tagline --}}
        <native:column class="w-full items-center gap-2">
            <native:column class="w-[80] h-[80] rounded-2xl bg-white items-center justify-center mb-2 border border-slate-100">
                <native:icon name="arrow.triangle.2.circlepath" :size="36" color="#0891b2" />
            </native:column>
            <native:text class="text-[24] font-bold text-[#0891b2] tracking-tight">SyncUp</native:text>
            <native:text class="text-[14] text-[#3d494d] text-center">Connect with your world effortlessly and stay in sync with those who matter most.</native:text>
        </native:column>

        {{-- Form card --}}
        <native:column class="w-full bg-white rounded-3xl p-6 gap-4 border border-[#eceef0]">

            {{-- Email field --}}
            <native:column class="w-full gap-1">
                <native:text class="text-[12] font-semibold text-[#191c1e] ml-1">Email Address</native:text>
                <native:row class="w-full bg-[#f2f4f6] rounded-xl px-3 py-1 items-center gap-2">
                    <native:icon name="mail" :size="20" color="#6d797e" />
                    <native:outlined-text-input
                        value="{{ $email }}"
                        placeholder="name@example.com"
                        @change="updateEmail"
                        :variant="0"
                        class="flex-1"
                    />
                </native:row>
            </native:column>

            {{-- Password field --}}
            <native:column class="w-full gap-1">
                <native:row class="w-full justify-between items-center px-1">
                    <native:text class="text-[12] font-semibold text-[#191c1e]">Password</native:text>
                    <native:text @press="forgotPassword" class="text-[11] font-medium text-[#00677d]">Forgot?</native:text>
                </native:row>
                <native:row class="w-full bg-[#f2f4f6] rounded-xl px-3 py-1 items-center gap-2">
                    <native:icon name="lock" :size="20" color="#6d797e" />
                    <native:outlined-text-input
                        value="{{ $password }}"
                        placeholder="••••••••"
                        :secure="!$showPassword"
                        @change="updatePassword"
                        :variant="0"
                        class="flex-1"
                    />
                    <native:column @press="toggleVisibility" class="px-2 py-2">
                        <native:icon name="{{ $showPassword ? 'visibility_off' : 'visibility' }}" :size="20" color="#6d797e" />
                    </native:column>
                </native:row>
            </native:column>

            {{-- Login button --}}
            <native:column @press="login" class="w-full bg-[#00677d] rounded-xl py-4 items-center mt-2">
                <native:text class="text-[18] font-semibold text-white">Login</native:text>
            </native:column>

            {{-- Divider with label --}}
            <native:row class="w-full items-center gap-3 mt-4">
                <native:column class="flex-1 h-px bg-[#e6e8ea]" />
                <native:text class="text-[11] font-medium text-[#6d797e]">OR CONTINUE WITH</native:text>
                <native:column class="flex-1 h-px bg-[#e6e8ea]" />
            </native:row>

            {{-- Social buttons --}}
            <native:row class="w-full gap-3 mt-2">
                <native:column @press="loginWithGoogle" class="flex-1 py-3 rounded-xl border border-[#bcc9ce] items-center">
                    <native:text class="text-[12] font-semibold text-[#191c1e]">Google</native:text>
                </native:column>
                <native:column @press="loginWithApple" class="flex-1 py-3 rounded-xl border border-[#bcc9ce] items-center">
                    <native:text class="text-[12] font-semibold text-[#191c1e]">Apple</native:text>
                </native:column>
            </native:row>
        </native:column>

        {{-- Footer --}}
        <native:column class="w-full items-center gap-4">
            <native:row class="items-center gap-1">
                <native:text class="text-[14] text-[#3d494d]">Don't have an account?</native:text>
                <native:text @press="createAccount" class="text-[14] font-semibold text-[#00677d]">Create Account</native:text>
            </native:row>
            <native:row class="items-center gap-3">
                <native:text class="text-[11] text-[#6d797e]">Privacy Policy</native:text>
                <native:text class="text-[11] text-[#bcc9ce]">•</native:text>
                <native:text class="text-[11] text-[#6d797e]">Terms of Service</native:text>
            </native:row>
        </native:column>

    </native:column>
</native:scroll-view>
