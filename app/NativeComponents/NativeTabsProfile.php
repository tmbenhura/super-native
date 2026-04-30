<?php

namespace App\NativeComponents;

use Native\Mobile\Edge\Element;

class NativeTabsProfile extends NativeTabsBase
{
    public function navTitle(): string
    {
        return 'Profile';
    }

    public function render(): Element
    {
        return $this->view('native-tabs-profile');
    }
}
