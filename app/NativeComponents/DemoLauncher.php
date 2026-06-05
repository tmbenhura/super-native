<?php

namespace App\NativeComponents;

use Native\Mobile\Edge\Layouts\Builders\NavBarOptions;
use Native\Mobile\Edge\NativeComponent;

/**
 * Top-level launcher screen — lists every demo app in the project.
 * Tapping a row pushes that demo onto the navigation stack; the framework
 * TopBar (via StackLayout) provides a back chevron to return here.
 */
class DemoLauncher extends NativeComponent
{
    public array $demos = [
        // ── Component showcases (broken out from explore) ──
        ['id' => 'counter', 'title' => 'Counter', 'subtitle' => 'Minimal Livewire-style counter', 'icon' => 'add', 'color' => '#10B981', 'url' => '/counter'],
        ['id' => 'reactivity', 'title' => 'Reactivity', 'subtitle' => '#[Computed], #[Poll] and #[Lazy] placeholder in one screen', 'icon' => 'bolt.fill', 'color' => '#8B5CF6', 'url' => '/reactivity'],
        ['id' => 'forms', 'title' => 'Slider', 'subtitle' => 'Text input, slider, toggle, checkbox, select, radio', 'icon' => 'square.text.square', 'color' => '#10B981', 'url' => '/explore/forms'],
        ['id' => 'mail', 'title' => 'Mail Inbox', 'subtitle' => 'Pull-to-refresh + leading/trailing swipe actions', 'icon' => 'envelope.fill', 'color' => '#0EA5E9', 'url' => '/mail-demo'],
        ['id' => 'sheets', 'title' => 'Sheets & Modals', 'subtitle' => 'Bottom-sheet detents, dismissible + blocking modals', 'icon' => 'rectangle.portrait.bottomthird.inset.filled', 'color' => '#A855F7', 'url' => '/explore/sheets'],
        ['id' => 'menus', 'title' => 'Menus', 'subtitle' => 'Tap-to-open dropdowns on Pressable, Button, ListItem.trailing', 'icon' => 'list.dash', 'color' => '#0891B2', 'url' => '/explore/menus'],
        ['id' => 'glass', 'title' => 'Glass', 'subtitle' => 'Liquid Glass Demo', 'icon' => 'list.bullet.rectangle', 'color' => '#0EA5E9', 'url' => '/glass'],
        ['id' => 'nativetabs', 'title' => 'Native Tabs', 'subtitle' => 'TabView-rendered bottom bar; Liquid Glass on iOS 26+', 'icon' => 'rectangle.bottomthird.inset.filled', 'color' => '#A855F7', 'url' => '/native-tabs'],
        ['id' => 'syncupnative', 'title' => 'SyncUp Messaging', 'subtitle' => 'Login, chat threads, friends, profile (5 screens) — custom chrome', 'icon' => 'chat_bubble', 'color' => '#0891b2', 'url' => '/syncup-native/login'],

//        ['id' => 'animate', 'title' => 'Animations', 'subtitle' => 'Awesome native animations', 'icon' => 'sparkles', 'color' => '#F59E0B', 'url' => '/animate'],
//        ['id' => 'refresh', 'title' => 'Pull to refresh', 'subtitle' => 'Native pull-to-refresh on custom card content', 'icon' => 'arrow.clockwise', 'color' => '#10B981', 'url' => '/refreshable-demo'],
        ['id' => 'perf', 'title' => 'Performance', 'subtitle' => 'Live FPS overlay + stress scenarios (Phase A)', 'icon' => 'speedometer', 'color' => '#EF4444', 'url' => '/perf'],
        ['id' => 'benchmark', 'title' => 'Benchmark Suite', 'subtitle' => 'Full scenario suite with FPS / RTT / jank / memory + RN/Flutter/Native comparison', 'icon' => 'gauge.with.dots.needle.67percent', 'color' => '#DC2626', 'url' => '/benchmark'],
        ['id' => 'phase1key', 'title' => 'Phase 1 — Keys', 'subtitle' => 'Stable keyed-identity verification — ->key() produces hash ids that survive reorder', 'icon' => 'key.fill', 'color' => '#F59E0B', 'url' => '/phase1-key-test'],
        ['id' => 'phase2memo', 'title' => 'Phase 2 — Memo', 'subtitle' => 'Toggle NPHP_FLAG_SUBTREE_MEMO and watch BENCH_C flat bytes shrink for unchanged rows', 'icon' => 'doc.on.doc', 'color' => '#0EA5E9', 'url' => '/phase2-memo-test'],
        ['id' => 'phase4virtuallist', 'title' => 'Phase 4 — Virtual List', 'subtitle' => '10k-row windowed list — only the visible slice gets materialized and shipped', 'icon' => 'list.dash', 'color' => '#22C55E', 'url' => '/phase4-virtual-list-test'],
        ['id' => 'perfshowdown', 'title' => 'Live Perf HUD', 'subtitle' => 'Tap +1, toggle Memo / Double-Buffer, watch real C-extension stats update on screen', 'icon' => 'chart.bar.fill', 'color' => '#FACC15', 'url' => '/perf-showdown'],
//        ['id' => 'buttons', 'title' => 'Buttons', 'subtitle' => 'Variants, sizes, icons, states, pressable', 'icon' => 'square.and.pencil', 'color' => '#0EA5E9', 'url' => '/explore/buttons'],
//        ['id' => 'typography', 'title' => 'Typography & Colors', 'subtitle' => 'Sizes, theme tokens, tailwind palette', 'icon' => 'textformat.alt', 'color' => '#A855F7', 'url' => '/explore/typography'],
//        ['id' => 'cards', 'title' => 'Cards & Chips', 'subtitle' => 'Card variants, chips, badges, list items', 'icon' => 'rectangle.stack.fill', 'color' => '#F59E0B', 'url' => '/explore/cards'],
//        ['id' => 'icons', 'title' => 'Icons', 'subtitle' => 'IconHelper catalog + direct SF Symbols', 'icon' => 'star.fill', 'color' => '#EC4899', 'url' => '/explore/icons'],
//        ['id' => 'layout', 'title' => 'Layout & Canvas', 'subtitle' => 'Flex, stack, canvas shapes, activity indicator', 'icon' => 'rectangle.3.group', 'color' => '#6366F1', 'url' => '/explore/layout'],
//        ['id' => 'buttonsform', 'title' => 'Buttons (Form)', 'subtitle' => 'Variants, sizes, extras in a NavigationStack + grouped form', 'icon' => 'list.bullet.rectangle', 'color' => '#0EA5E9', 'url' => '/buttons-form'],
//        ['id' => 'nativechrome', 'title' => 'Native Chrome', 'subtitle' => 'NavigationStack-rendered top bar; Liquid Glass on iOS 26+', 'icon' => 'square.stack.3d.up.fill', 'color' => '#A855F7', 'url' => '/native-chrome'],

        // ── Mini app demos ──
//        ['id' => 'tabs', 'title' => 'Layout Demo', 'subtitle' => 'TabsLayout + StackLayout (Home / Browse / Profile + push detail)', 'icon' => 'dashboard', 'color' => '#6366F1', 'url' => '/tabs'],
//        ['id' => 'twitter', 'title' => 'Twitter / X', 'subtitle' => 'Feed, tweet detail, profile, compose', 'icon' => 'chat_bubble', 'color' => '#1D9BF0', 'url' => '/twitter'],
//        ['id' => 'ikea', 'title' => 'IKEA', 'subtitle' => 'Home, product detail, cart, search', 'icon' => 'bed.double.fill', 'color' => '#0058A3', 'url' => '/ikea'],
//        ['id' => 'facebook', 'title' => 'Facebook', 'subtitle' => 'Feed, post, profile, create', 'icon' => 'person.2.fill', 'color' => '#1877F2', 'url' => '/facebook'],
//        ['id' => 'instagram', 'title' => 'Instagram', 'subtitle' => 'Feed, post, profile, search', 'icon' => 'camera', 'color' => '#E1306C', 'url' => '/instagram'],
//        ['id' => 'spotify', 'title' => 'Spotify', 'subtitle' => 'Home, playlist, artist, search', 'icon' => 'music.note', 'color' => '#1DB954', 'url' => '/spotify'],
//        ['id' => 'youtube', 'title' => 'YouTube', 'subtitle' => 'Home, video, channel, search', 'icon' => 'play.rectangle.fill', 'color' => '#FF0000', 'url' => '/youtube'],
//        ['id' => 'syncup', 'title' => 'SyncUp Messaging', 'subtitle' => 'Login, chat threads, friends, profile (5 screens) — custom chrome', 'icon' => 'chat_bubble', 'color' => '#00B4D8', 'url' => '/syncup/login'],
          ];

    public function navTitle(): string
    {
        return 'SuperNative Demo';
    }

    /** Root screen — nothing to pop back to, hide the chevron. */
    public function showsNavBack(): bool
    {
        return false;
    }

    public function navigationOptions(): ?NavBarOptions
    {
        // `large` gives the iOS-native big-title-on-top, left-aligned,
        // collapses to inline as content scrolls under the bar (iOS 26+
        // gets Liquid Glass material during the collapse).
        return NavBarOptions::make()
            ->displayMode('large')
            ->subtitle('Tap a demo to launch');
    }

    public function render(): \Illuminate\View\View
    {
        return view('demo-launcher');
    }
}
