<?php

namespace App\NativeComponents;

use Native\Mobile\Edge\Element;
use Native\Mobile\Edge\NativeComponent;

class TestLayout extends NativeComponent
{
    public function render(): Element
    {
        return $this->view('test-layout');
    }
}