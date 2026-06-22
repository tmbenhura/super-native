<?php

namespace App\NativeComponents;

use Native\Mobile\Edge\NativeComponent;

class Counter extends NativeComponent
{
    public $count = 0;

    public function navTitle(): string
    {
        return 'Hey @LaravelLive UK';
    }

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
