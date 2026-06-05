<?php

namespace App\NativeComponents;

use Native\Mobile\Attributes\Computed;
use Native\Mobile\Attributes\Lazy;
use Native\Mobile\Attributes\Poll;
use Native\Mobile\Edge\NativeComponent;

/**
 * Showcases the Livewire-style reactivity primitives on NativeComponent:
 *
 *   #[Lazy]      — the screen paints a skeleton instantly while the (here
 *                  deliberately slow) mount() runs, then swaps in real content.
 *   #[Poll]      — tick() runs every 3s with no user interaction, then the
 *                  loop re-renders.
 *   #[Computed]  — doubled() is derived, memoized per frame, and read in Blade
 *                  as $this->doubled.
 *
 * Note: re-rendering is whole-screen and the SMALLEST poll interval wins, so
 * tick() and the Blade native:poll="3s" clock are kept at the same 3s cadence
 * — a faster poller here would mask the slower one (Livewire wire:poll works
 * the same way).
 */
#[Lazy]
class ReactivityDemo extends NativeComponent
{
    public int $count = 0;

    /** Advanced by the #[Poll] timer below, not by user interaction. */
    public int $seconds = 0;

    public $time = '';

    public function navTitle(): string
    {
        return 'Reactivity';
    }

    /**
     * Simulate slow setup (a remote fetch, heavy query, etc.). Because the
     * class is #[Lazy], placeholder() is published before this runs, so the
     * screen feels instant instead of blocking on the 2s delay.
     */
    public function mount(): void
    {
        sleep(2);
    }

    protected function placeholder(): \Illuminate\View\View
    {
        return view('native.reactivity-demo-placeholder');
    }

    /** #[Poll] — fires every 3s, then the loop re-renders. */
    #[Poll(3000)]
    public function tick(): void
    {
        $this->time = now()->format('F j, Y h:i:s');
    }

    /** #[Computed] — derived from $count, recomputed when state changes. */
    #[Computed]
    public function doubled(): int
    {
        return $this->count * 2;
    }

    public function increment(): void
    {
        $this->count++;
    }

    public function decrement(): void
    {
        $this->count--;
    }

    public function render(): \Illuminate\View\View
    {
        return view('native.reactivity-demo');
    }
}
