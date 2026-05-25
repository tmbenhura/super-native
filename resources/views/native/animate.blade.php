<native:scroll-view class="w-full h-full bg-theme-background">
    <native:column class="w-full p-5 gap-8">

        {{-- ────────────────────────────────────────────────────────────
             1) Animated vs snap.
             Same opacity change, one with `animate-duration`, one without.
             ──────────────────────────────────────────────────────── --}}
        <native:column class="w-full gap-3">
            <native:text class="text-xs  text-theme-on-surface-variant">
                Animated vs snap
            </native:text>

            <native:row class="w-full gap-4">
                <native:column
                    class="flex-1 h-[120] rounded-2xl items-center justify-center bg-purple-500"
                    :opacity="$visible ? 1 : 0.15"
                    :animate-duration="$duration"
                    :animate-easing="$easing">
                    <native:text class="text-white font-semibold">animated</native:text>
                    <native:text class="text-white text-xs">{{ $duration }}ms · {{ $easing }}</native:text>
                </native:column>

                <native:column
                    class="flex-1 h-[120] rounded-2xl items-center justify-center bg-slate-400"
                    :opacity="$visible ? 1 : 0.15">
                    <native:text class="text-white font-semibold">snap</native:text>
                    <native:text class="text-white text-xs">no animation</native:text>
                </native:column>
            </native:row>

            <native:button label="Toggle" @press="toggle" class="w-full" />

            {{-- Easing picker — selected stays fully opaque, others fade --}}
            <native:row class="gap-2">
                @foreach (['linear', 'ease-in', 'ease-out', 'ease-in-out'] as $opt)
                    <native:column
                        @press="setEasing('{{ $opt }}')"
                        class="flex-1 py-2 rounded-lg items-center justify-center bg-sky-500"
                        :opacity="$easing === $opt ? 1 : 0.55"
                        :animate-duration="200">
                        <native:text class="text-white text-xs font-semibold">{{ $opt }}</native:text>
                    </native:column>
                @endforeach
            </native:row>

            {{-- Duration picker --}}
            <native:row class="gap-2">
                @foreach ([150, 300, 600, 1200] as $ms)
                    <native:column
                        @press="setDuration({{ $ms }})"
                        class="flex-1 py-2 rounded-lg items-center justify-center bg-sky-500"
                        :opacity="$duration === $ms ? 1 : 0.55"
                        :animate-duration="200">
                        <native:text class="text-white text-xs font-semibold">{{ $ms }}ms</native:text>
                    </native:column>
                @endforeach
            </native:row>
        </native:column>

        {{-- ────────────────────────────────────────────────────────────
             2) Easing comparison.
             Four bars toggle together; each uses a different curve so
             the difference is visible side-by-side.
             ──────────────────────────────────────────────────────── --}}
        <native:column class="w-full gap-3">
            <native:text class="text-xs  text-theme-on-surface-variant">
                Easing comparison
            </native:text>

            @foreach (['linear', 'ease-in', 'ease-out', 'ease-in-out'] as $curve)
                <native:column
                    class="w-full h-[44] rounded-xl items-center justify-center bg-indigo-500"
                    :opacity="$visible ? 1 : 0.1"
                    :animate-duration="800"
                    :animate-easing="$curve">
                    <native:text class="text-white text-xs font-semibold">{{ $curve }}</native:text>
                </native:column>
            @endforeach

            <native:text class="text-xs text-theme-on-surface-variant">
                Tap Toggle above. Each bar reaches the target at a different rate.
            </native:text>
        </native:column>

        {{-- ────────────────────────────────────────────────────────────
             3) Step indicator.
             Five dots; the current step is fully opaque, others fade
             back. Prev/Next move the highlight.
             ──────────────────────────────────────────────────────── --}}
        <native:column class="w-full gap-3">
            <native:text class="text-xs  text-theme-on-surface-variant">
                Step indicator — step {{ $step }} of 5
            </native:text>

            <native:row class="w-full gap-3 items-center justify-center">
                @for ($i = 1; $i <= 5; $i++)
                    <native:column
                        class="w-[40] h-[40] rounded-full items-center justify-center bg-emerald-500"
                        :opacity="$step === $i ? 1 : 0.2"
                        :animate-duration="350"
                        animate-easing="ease-out">
                        <native:text class="text-white text-sm font-bold">{{ $i }}</native:text>
                    </native:column>
                @endfor
            </native:row>

            <native:row class="w-full justify-between gap-3">
                <native:button label="Prev" @press="prevStep"  />
                <native:button label="Next" @press="nextStep"  />
            </native:row>
        </native:column>

        {{-- ────────────────────────────────────────────────────────────
             4) Card focus.
             Three cards. Tap one — it stays opaque, the others fade.
             ──────────────────────────────────────────────────────── --}}
        <native:column class="w-full gap-3">
            <native:text class="text-xs  text-theme-on-surface-variant">
                Card focus — tap to highlight
            </native:text>

            <native:row class="w-full gap-3">
                @foreach (['Alpha', 'Beta', 'Gamma'] as $i => $name)
                    <native:column
                        @press="focus({{ $i }})"
                        class="flex-1 h-[110] rounded-2xl items-center justify-center bg-rose-500"
                        :opacity="$focused === $i ? 1 : 0.25"
                        :animate-duration="300"
                        animate-easing="ease-out">
                        <native:text class="text-white text-base font-semibold">{{ $name }}</native:text>
                    </native:column>
                @endforeach
            </native:row>
        </native:column>

        {{-- ────────────────────────────────────────────────────────────
             5) Crossfade.
             Two stacked panels — A and B — swap opacity in unison so
             one fades out while the other fades in.
             ──────────────────────────────────────────────────────── --}}
        <native:column class="w-full gap-3">
            <native:text class="text-xs  text-theme-on-surface-variant">
                Crossfade
            </native:text>

            <native:stack class="w-full h-[140]">
                <native:column
                    class="w-full h-full rounded-2xl items-center justify-center bg-sky-500"
                    :opacity="$cross ? 0 : 1"
                    :animate-duration="500"
                    animate-easing="ease-in-out">
                    <native:text class="text-white text-2xl font-bold">A</native:text>
                </native:column>

                <native:column
                    class="w-full h-full rounded-2xl items-center justify-center bg-amber-500"
                    :opacity="$cross ? 1 : 0"
                    :animate-duration="500"
                    animate-easing="ease-in-out">
                    <native:text class="text-white text-2xl font-bold">B</native:text>
                </native:column>
            </native:stack>

            <native:button label="Swap" @press="swap" class="w-full" />
        </native:column>

        {{-- ────────────────────────────────────────────────────────────
             6) Slide-in panel.
             A card slides up from below as `translate-y` interpolates
             from +120 to 0. Combine with opacity for a richer entry.
             ──────────────────────────────────────────────────────── --}}
        <native:column class="w-full gap-3">
            <native:text class="text-xs  text-theme-on-surface-variant">
                Slide-in
            </native:text>

            <native:stack class="w-full h-[140]">
                <native:column
                    class="w-full h-full rounded-2xl items-center justify-center bg-fuchsia-500"
                    :opacity="$shown ? 1 : 0"
                    :translate-y="$shown ? 0 : 120"
                    :animate-duration="450"
                    animate-easing="ease-out">
                    <native:text class="text-white text-base font-semibold">surprise!</native:text>
                </native:column>
            </native:stack>

            <native:button label="Show / Hide" @press="show" class="w-full" />
        </native:column>

        {{-- ────────────────────────────────────────────────────────────
             7) Scale bump.
             A tap toggles a square between scale 1.0 and 1.4. With a
             spring easing it feels like a satisfying press.
             ──────────────────────────────────────────────────────── --}}
        <native:column class="w-full gap-3">
            <native:text class="text-xs  text-theme-on-surface-variant">
                Scale bump
            </native:text>

            <native:row class="w-full items-center justify-center h-[160]">
                <native:column
                    @press="bump"
                    class="w-[100] h-[100] rounded-2xl items-center justify-center bg-orange-500"
                    :scale="$bumped ? 1.4 : 1.0"
                    :animate-duration="250"
                    animate-easing="ease-out">
                    <native:text class="text-white text-base font-semibold">tap me</native:text>
                </native:column>
            </native:row>
        </native:column>

        {{-- ────────────────────────────────────────────────────────────
             8) Rotate.
             Tap "Spin" to advance the angle by 180°. The icon-card
             interpolates the rotation. Reset to snap back to 0.
             ──────────────────────────────────────────────────────── --}}
        <native:column class="w-full gap-3">
            <native:text class="text-xs  text-theme-on-surface-variant">
                Rotate — {{ $angle }}°
            </native:text>

            <native:row class="w-full items-center justify-center h-[160]">
                <native:column
                    class="w-[100] h-[100] rounded-2xl items-center justify-center bg-cyan-500"
                    :rotate="$angle"
                    :animate-duration="500"
                    animate-easing="ease-in-out">
                    <native:icon
                        :size="50"
                        :ios="\App\Icons\Ios::ArrowUp"
                        :android="\App\Icons\Android::ArrowCircleUp"
                        class="text-white text-base font-semibold" />
                </native:column>
            </native:row>

            <native:row class="justify-between w-full">
                <native:button label="Spin 180°" @press="spin"/>
                <spacer />
                <native:button label="Reset" @press="resetSpin"/>
            </native:row>
        </native:column>

        {{-- ────────────────────────────────────────────────────────────
             9) Combined slide + fade + scale.
             All three transforms animating in unison — typical entrance
             for a modal, toast, or notification.
             ──────────────────────────────────────────────────────── --}}
        <native:column class="w-full gap-3">
            <native:text class="text-xs  text-theme-on-surface-variant">
                Combined entry
            </native:text>

            <native:stack class="w-full h-[160]">
                <native:column
                    class="w-full h-[120] rounded-2xl items-center justify-center bg-violet-600 self-center"
                    :opacity="$toastShown ? 1 : 0"
                    :scale="$toastShown ? 1.0 : 0.7"
                    :translate-y="$toastShown ? 0 : -40"
                    :animate-duration="500"
                    animate-easing="ease-out">
                    <native:text class="text-white text-lg font-bold">toast</native:text>
                    <native:text class="text-white text-xs">opacity + scale + translate, in unison</native:text>
                </native:column>
            </native:stack>

            <native:button label="Show / Hide Toast" @press="toggleToast" class="w-full" />
        </native:column>

        {{-- ────────────────────────────────────────────────────────────
             10) Press feedback (UI-thread).
             Three tiles, three flavors of press feedback. The visual
             change happens INSTANTLY on press-in (no PHP roundtrip);
             @press still fires for any business logic.
             ──────────────────────────────────────────────────────── --}}
        <native:column class="w-full gap-3">
            <native:text class="text-xs  text-theme-on-surface-variant">
                Press feedback — native, zero PHP roundtrip
            </native:text>

            <native:row class="w-full gap-3">
                <native:column
                    @press="bump"
                    class="flex-1 h-[100] rounded-2xl items-center justify-center bg-orange-500"
                    :press-scale="0.9">
                    <native:text class="text-white font-semibold">scale</native:text>
                    <native:text class="text-white text-xs">0.9</native:text>
                </native:column>

                <native:column
                    @press="bump"
                    class="flex-1 h-[100] rounded-2xl items-center justify-center bg-rose-500"
                    :press-opacity="0.55">
                    <native:text class="text-white font-semibold">opacity</native:text>
                    <native:text class="text-white text-xs">0.55</native:text>
                </native:column>

                <native:column
                    @press="bump"
                    class="flex-1 h-[100] rounded-2xl items-center justify-center bg-emerald-500"
                    :press-scale="0.92"
                    :press-translate-y="3"
                    :press-opacity="0.85">
                    <native:text class="text-white font-semibold">combo</native:text>
                    <native:text class="text-white text-xs">all three</native:text>
                </native:column>
            </native:row>

            <native:text class="text-xs text-theme-on-surface-variant">
                Press and hold to feel the difference vs the "scale bump" section above —
                that one waits ~50-100ms for PHP to round-trip the state. This responds
                in < 8ms on the UI thread.
            </native:text>
        </native:column>

        {{-- ────────────────────────────────────────────────────────────
             11) Like button.
             Two hearts stacked — outline always visible underneath,
             filled scaled to 0 when not liked. Tap composes a scale
             bump, press feedback, and crossfade between the two layers.
             ──────────────────────────────────────────────────────── --}}
        <native:column class="w-full gap-3">
            <native:text class="text-xs  text-theme-on-surface-variant">
                Like button — combined transforms
            </native:text>

            <native:row class="w-full items-center justify-center h-[120]">
                <native:stack
                    @press="toggleLike"
                    class="w-[80] h-[80] items-center justify-center"
                    :press-scale="0.85">
                    {{-- outline heart, dimmed when liked --}}
                    <native:text
                        class="text-[56] text-slate-400"
                        :opacity="$liked ? 0 : 1"
                        :animate-duration="200"
                        animate-easing="ease-out">♡</native:text>
                    {{-- filled heart, popped from 0 → 1.0 on like --}}
                    <native:text
                        class="text-[56] text-rose-500"
                        :opacity="$liked ? 1 : 0"
                        :scale="$liked ? 1.0 : 0.4"
                        :rotate="$liked ? 0 : -25"
                        :animate-duration="300"
                        animate-easing="ease-out">♥</native:text>
                </native:stack>
            </native:row>
        </native:column>

        {{-- ────────────────────────────────────────────────────────────
             12) Tab slider.
             Four tabs along the top with a single underline that
             slides between them via `translate-x`. Active tab label
             goes bold-ish via opacity.
             ──────────────────────────────────────────────────────── --}}
        <native:column class="w-full gap-3">
            <native:text class="text-xs  text-theme-on-surface-variant">
                Tab slider
            </native:text>

            <native:column class="w-full bg-gray-700 rounded-2xl">
                <native:stack class="w-full">
                    {{-- sliding indicator — 25% wide, translates by 88px per tab slot --}}
                    <native:column
                        class="w-[88] h-[36] rounded-2xl bg-indigo-500 self-center"
                        :translate-x="($activeTab - 1.5) * 88"
                        :animate-duration="350"
                        animate-easing="ease-in-out" />

                    <native:row class="w-full h-full items-center">
                        @foreach (['Home', 'Search', 'Likes', 'Me'] as $i => $label)
                            <native:column
                                @press="setTab({{ $i }})"
                                class="flex-1 h-full items-center justify-center"
                                :opacity="$activeTab === $i ? 1 : 0.95"
                                :animate-duration="200">
                                <native:text class="text-sm font-semibold text-white">{{ $label }}</native:text>
                            </native:column>
                        @endforeach
                    </native:row>
                </native:stack>
            </native:column>
        </native:column>

        {{-- ────────────────────────────────────────────────────────────
             13) iOS-style switch.
             Track changes color via crossfading two colored backgrounds.
             Knob translates horizontally and slightly scales on toggle.
             ──────────────────────────────────────────────────────── --}}
        <native:column class="w-full gap-3">
            <native:text class="text-xs  text-theme-on-surface-variant">
                Switch — {{ $switchOn ? 'on' : 'off' }}
            </native:text>

            <native:row class="w-full items-center justify-center h-[60]">
                <native:stack
                    @press="toggleSwitch"
                    class="w-[60] h-[34] rounded-full"
                    :press-scale="0.95">
                    {{-- off track (slate) --}}
                    <native:column class="w-full h-full rounded-full bg-slate-400"
                                   :opacity="$switchOn ? 0 : 1"
                                   :animate-duration="200"
                                   animate-easing="ease-in-out" />
                    {{-- on track (green) --}}
                    <native:column class="w-full h-full rounded-full bg-green-500"
                                   :opacity="$switchOn ? 1 : 0"
                                   :animate-duration="200"
                                   animate-easing="ease-in-out" />
                    {{-- knob translates from -13 to +13 --}}
                    <native:column
                        class="w-[28] h-[28] rounded-full bg-white self-center"
                        :translate-x="$switchOn ? 13 : -13"
                        :scale="$switchOn ? 1.05 : 1.0"
                        :animate-duration="250"
                        animate-easing="ease-out" />
                </native:stack>
            </native:row>
        </native:column>

        {{-- ────────────────────────────────────────────────────────────
             14) FAB radial menu.
             Main floating action button in the center. Tap to fan out
             three secondary buttons that scale from 0 and translate
             outward. Tap again to collapse.
             ──────────────────────────────────────────────────────── --}}
        <native:column class="w-full gap-3">
            <native:text class="text-xs  text-theme-on-surface-variant">
                FAB radial menu
            </native:text>

            <native:row class="w-full items-center justify-center h-[160]">
                <native:stack class="w-[180] h-[160] items-center justify-end">
                    {{-- Three sub-actions, fanning out left / up / right --}}
                    <native:column
                        class="w-[44] h-[44] rounded-full items-center justify-center bg-sky-500"
                        :opacity="$fabOpen ? 1 : 0"
                        :scale="$fabOpen ? 1 : 0"
                        :translate-x="$fabOpen ? -70 : 0"
                        :translate-y="$fabOpen ? -40 : 0"
                        :animate-duration="200"
                        animate-easing="ease-out"
                        :press-scale="0.85">
                        <native:icon class="text-white text-base"
                                     :android="\App\Icons\Android::Camera"
                                     :ios="\App\Icons\Ios::Camera "/>
                    </native:column>

                    <native:column
                        class="w-[44] h-[44] rounded-full items-center justify-center bg-emerald-500"
                        :opacity="$fabOpen ? 1 : 0"
                        :scale="$fabOpen ? 1 : 0"
                        :translate-y="$fabOpen ? -90 : 0"
                        :animate-duration="200"
                        animate-easing="ease-out"
                        :press-scale="0.85">
                        <native:icon class="text-white text-base"
                                     :android="\App\Icons\Android::MusicNote"
                                     :ios="\App\Icons\Ios::MusicNote "/>
                    </native:column>

                    <native:column
                        class="w-[44] h-[44] rounded-full items-center justify-center bg-amber-500"
                        :opacity="$fabOpen ? 1 : 0"
                        :scale="$fabOpen ? 1 : 0"
                        :translate-x="$fabOpen ? 70 : 0"
                        :translate-y="$fabOpen ? -40 : 0"
                        :animate-duration="200"
                        animate-easing="ease-out"
                        :press-scale="0.85">
                        <native:icon class="text-white text-base"
                                     :android="\App\Icons\Android::AttachFile"
                                     :ios="\App\Icons\Ios::Paperclip "/>
                    </native:column>

                    {{-- Main FAB — rotates 45° when open so + becomes × --}}
                    <native:column
                        @press="toggleFab"
                        class="w-[60] h-[60] rounded-full items-center justify-center bg-violet-600"
                        :rotate="$fabOpen ? 45 : 0"
                        :animate-duration="300"
                        animate-easing="ease-in-out"
                        :press-scale="0.9">
                        <native:icon class="text-white text-base"
                             :android="\App\Icons\Android::PlusOne"
                                     :ios="\App\Icons\Ios::Plus "/>
                    </native:column>
                </native:stack>
            </native:row>
        </native:column>

        {{-- ────────────────────────────────────────────────────────────
             15) Card stack — tap to shuffle.
             Four colored cards stacked; the "top" card is fully visible
             and centered, the rest sit progressively scaled/offset behind.
             Tapping cycles which card is on top.
             ──────────────────────────────────────────────────────── --}}
        <native:column class="w-full gap-3">
            <native:text class="text-xs  text-theme-on-surface-variant">
                Card stack — tap to shuffle
            </native:text>

            @php
                $deck = [
                    ['color' => 'bg-rose-500',    'label' => 'Hearts'],
                    ['color' => 'bg-amber-500',   'label' => 'Diamonds'],
                    ['color' => 'bg-emerald-500', 'label' => 'Clubs'],
                    ['color' => 'bg-sky-500',     'label' => 'Spades'],
                ];
            @endphp

            <native:row class="w-full items-center justify-center h-[200]" @press="shuffleCards">
                <native:stack class="w-[160] h-[200]">
                    @foreach ($deck as $i => $card)
                        @php
                            $depth = ($i - $topCard + 4) % 4;
                        @endphp
                        <native:column
                            class="w-full h-full rounded-2xl items-center justify-center {{ $card['color'] }}"
                            :scale="1.0 - ($depth * 0.07)"
                            :translate-y="$depth * 14"
                            :opacity="$depth === 0 ? 1 : (1.0 - ($depth * 0.45))"
                            :animate-duration="400"
                            animate-easing="ease-out">
                            <native:text class="text-white text-2xl font-bold">{{ $card['label'] }}</native:text>
                        </native:column>
                    @endforeach
                </native:stack>
            </native:row>

            <native:text class="text-xs text-theme-on-surface-variant">
                Tap the stack. The top card slides back, others step up one place — all four
                animate in unison.
            </native:text>
        </native:column>

        {{-- ────────────────────────────────────────────────────────────
             16) Looping animations — `animate-loop`.
             When set, transforms yoyo forever between identity and the
             configured value. Runs on the platform's render thread, no
             PHP involvement after the first publish.
             ──────────────────────────────────────────────────────── --}}
        <native:column class="w-full gap-3">
            <native:text class="text-xs  text-theme-on-surface-variant">
                Looping animations
            </native:text>

            <native:row class="w-full items-center justify-around h-[120]">
                <native:column class="items-center gap-2">
                    <native:column
                        class="w-[48] h-[48] rounded-full bg-rose-500"
                        :opacity="0.3"
                        :animate-duration="900"
                        :animate-loop="true"
                        animate-easing="ease-in-out" />
                    <native:text class="text-xs text-theme-on-surface-variant">pulse</native:text>
                </native:column>

                <native:column class="items-center gap-2">
                    <native:column
                        class="w-[48] h-[48] rounded-full bg-sky-500"
                        :scale="1.3"
                        :animate-duration="1100"
                        :animate-loop="true"
                        animate-easing="ease-in-out" />
                    <native:text class="text-xs text-theme-on-surface-variant">breathe</native:text>
                </native:column>

                <native:column class="items-center gap-2">
                    <native:column
                        class="w-[48] h-[48] rounded-full bg-emerald-500"
                        :translate-y="-14"
                        :animate-duration="1300"
                        :animate-loop="true"
                        animate-easing="ease-in-out" />
                    <native:text class="text-xs text-theme-on-surface-variant">float</native:text>
                </native:column>

                <native:column class="items-center gap-2">
                    <native:column
                        class="w-[48] h-[48] rounded-2xl bg-amber-500"
                        :rotate="20"
                        :animate-duration="700"
                        :animate-loop="true"
                        animate-easing="ease-in-out" />
                    <native:text class="text-xs text-theme-on-surface-variant">wobble</native:text>
                </native:column>
            </native:row>

            <native:text class="text-xs text-theme-on-surface-variant">
                Each runs on the render thread (Core Animation / Compose RenderNode).
                PHP only published the initial tree — the cycles run forever without it.
            </native:text>
        </native:column>

        {{-- ────────────────────────────────────────────────────────────
             17) Loading dots.
             Three dots with slightly different periods so they drift in
             and out of phase, creating a natural wave without explicit
             stagger / delay support.
             ──────────────────────────────────────────────────────── --}}
        <native:column class="w-full gap-3">
            <native:text class="text-xs  text-theme-on-surface-variant">
                Loading dots
            </native:text>

            <native:row class="w-full items-center justify-center gap-3 h-[80]">
                <native:column
                    class="w-[14] h-[14] rounded-full bg-violet-600"
                    :scale="1.6"
                    :opacity="0.4"
                    :animate-duration="600"
                    :animate-loop="true"
                    animate-easing="ease-in-out" />
                <native:column
                    class="w-[14] h-[14] rounded-full bg-violet-600"
                    :scale="1.6"
                    :opacity="0.4"
                    :animate-duration="720"
                    :animate-loop="true"
                    animate-easing="ease-in-out" />
                <native:column
                    class="w-[14] h-[14] rounded-full bg-violet-600"
                    :scale="1.6"
                    :opacity="0.4"
                    :animate-duration="840"
                    :animate-loop="true"
                    animate-easing="ease-in-out" />
            </native:row>
        </native:column>

        {{-- ────────────────────────────────────────────────────────────
             18) Pulsing notification badge.
             Combines a static solid dot with an outer ring that loops
             scale + opacity for a ripple "you have new mail" effect.
             ──────────────────────────────────────────────────────── --}}
        <native:column class="w-full gap-3">
            <native:text class="text-xs  text-theme-on-surface-variant">
                Pulsing badge
            </native:text>

            <native:row class="w-full items-center justify-center h-[100]">
                <native:stack class="w-[120] h-[80]">
                    <native:column class="w-full h-[60] rounded-xl items-center justify-center bg-slate-700 self-center">
                        <native:text class="text-white text-sm font-semibold">Inbox</native:text>
                    </native:column>

                    {{-- Badge wrapper holds the static position; only its
                         children animate. Without this, the loop's
                         identity-vs-configured oscillation would also
                         move the ring from center to badge spot every
                         cycle. --}}
                    <native:stack
                        class="w-[22] h-[22] self-center"
                        :translate-x="44"
                        :translate-y="-20">
                        {{-- Outer ring — loops scale + opacity only --}}
                        <native:column
                            class="w-full h-full rounded-full bg-rose-500"
                            :scale="2.2"
                            :opacity="0.0"
                            :animate-duration="1400"
                            :animate-loop="true"
                            animate-easing="ease-out" />

                        {{-- Solid dot stays put --}}
                        <native:column
                            class="w-full h-full rounded-full bg-rose-500 items-center justify-center">
                            <native:text class="text-white text-[10] font-bold">3</native:text>
                        </native:column>
                    </native:stack>
                </native:stack>
            </native:row>
        </native:column>

        {{-- ────────────────────────────────────────────────────────────
             19) Phase 3a — gesture-driven SharedValue.
             A card whose translate-y, opacity, and scale are all driven
             by drag distance via a SharedValue + interpolate. PHP only
             published once; every frame of the drag runs natively on
             the UI thread.
             ──────────────────────────────────────────────────────── --}}
        <native:column class="w-full gap-3">
            <native:text class="text-xs  text-theme-on-surface-variant">
                SharedValue drag — Phase 3a
            </native:text>

            <native:stack class="w-full h-[220]">
                {{-- Backdrop that fades in as the card is dragged down --}}
                <native:column
                    class="w-full h-full rounded-2xl bg-slate-800"
                    :opacity="$drag->interpolate([0, 180], [0, 0.5])" />

                <native:gesture-area :pan-y="$drag" class="w-full h-full items-center justify-center">
                    <native:column
                        class="w-[200] h-[120] rounded-2xl items-center justify-center bg-fuchsia-500"
                        :translate-y="$drag->clamp(-60, 180)"
                        :opacity="$drag->interpolate([0, 180], [1, 0.3])"
                        :scale="$drag->interpolate([0, 180], [1, 0.75])">
                        <native:text class="text-white text-lg font-bold">drag me</native:text>
                        <native:text class="text-white text-xs">native UI thread · 0 PHP</native:text>
                    </native:column>
                </native:gesture-area>
            </native:stack>

            <native:text class="text-xs text-theme-on-surface-variant">
                Drag the card up or down. Translate, opacity, and scale all derive from a
                single SharedValue via formula chains. Per-frame: zero PHP roundtrips.
            </native:text>
        </native:column>

    </native:column>
</native:scroll-view>
