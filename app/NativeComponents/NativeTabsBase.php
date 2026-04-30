<?php

namespace App\NativeComponents;

use Native\Mobile\Edge\NativeComponent;

/**
 * Shared state + behavior for the Native Tabs demo screens. The Search
 * tab is wired as an `action` tab in `NativeTabsLayout` (no URL), and
 * its press handler — `openSearch` — runs on whichever tab screen is
 * currently active. Hosting `$showSearch` and the toggle methods on a
 * base class lets every tab respond to the press without duplicating
 * the wiring.
 */
abstract class NativeTabsBase extends NativeComponent
{
    public bool $showSearch = false;

    public function openSearch(): void
    {
        $this->showSearch = true;
    }

    public function closeSearch(): void
    {
        $this->showSearch = false;
    }
}
