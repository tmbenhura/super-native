<?php

namespace App\NativeComponents;

use Native\Mobile\Edge\Element;

class NativeTabsHome extends NativeTabsBase
{
    public int $taps = 0;

    public function navTitle(): string
    {
        return 'Home';
    }

    public function tap(): void
    {
        $this->taps++;
    }

    public function render(): Element
    {
        return $this->view('native-tabs-home');
    }
}
