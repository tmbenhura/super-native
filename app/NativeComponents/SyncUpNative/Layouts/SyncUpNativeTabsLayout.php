<?php

namespace App\NativeComponents\SyncUpNative\Layouts;

use App\Icons\Material;
use App\Icons\SF;
use Native\Mobile\Edge\Layouts\Builders\NavAction;
use Native\Mobile\Edge\Layouts\Builders\NavBar;
use Native\Mobile\Edge\Layouts\Builders\Tab;
use Native\Mobile\Edge\Layouts\Builders\TabBar;
use Native\Mobile\Edge\Layouts\NativeLayout;
use Native\Mobile\Edge\NativeComponent;

/**
 * Native-chrome variant of SyncUp's tabs layout. Same shape as the
 * original `SyncUpTabsLayout` — three tab roots with a NavBar — except
 * `usesNativeChrome()` is `true`, so iOS routes through SwiftUI's
 * `TabView` + per-tab `NavigationStack` instead of the custom HStack
 * `TopBar` / `BottomNav` elements.
 *
 * Tab URLs all point under `/syncup-native/...` so this demo runs in
 * parallel with the original `/syncup/...` flow for side-by-side
 * comparison from the launcher.
 */
class SyncUpNativeTabsLayout extends NativeLayout
{
    public function usesNativeChrome(): bool
    {
        return true;
    }

    public function navBar(NativeComponent $screen): ?NavBar
    {
        return NavBar::make()
            ->title($screen->navTitle())
            ->back();
    }

    public function tabBar(NativeComponent $screen): ?TabBar
    {
        return TabBar::make()
            ->add(Tab::link('Messages', '/syncup-native', sf: SF::Message, material: Material::ChatBubble)->badge($this->getUnreadMessageCount()))
            ->add(Tab::link('Friends', '/syncup-native/friends', sf: SF::Person3, material: Material::Group)->news($this->showNewsIndicator()))
            ->add(Tab::link('Profile', '/syncup-native/profile', sf: SF::Person, material: Material::Person));
    }

    public function getUnreadMessageCount()
    {
        return 2;
    }

    public function showNewsIndicator()
    {
        return false;
    }

}
