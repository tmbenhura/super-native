<?php

namespace App\NativeComponents;

use Native\Mobile\Edge\NativeComponent;

class Counter extends NativeComponent
{
    public function navTitle(): string
    {
        return 'Counter';
    }

    public $count = 0;

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
    }

    public function render(): \Illuminate\View\View
    {
        return view('native.counter');
    }
}
