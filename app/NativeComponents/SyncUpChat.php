<?php

namespace App\NativeComponents;

use App\NativeComponents\Concerns\HasSyncUpData;
use Native\Mobile\Edge\Element;
use Native\Mobile\Edge\Layouts\Builders\NavAction;
use Native\Mobile\Edge\Layouts\Builders\NavBarOptions;
use Native\Mobile\Edge\NativeComponent;

class SyncUpChat extends NativeComponent
{
    use HasSyncUpData;

    /** @var array<int, array{id:int, fromMe:bool, text:string, time:string, imageUrl?:string, status?:string}> */
    public array $messages = [];

    public string $draft = '';

    /** Tracks whether we've seeded $messages from the conversation id yet. */
    public bool $seeded = false;

    public function mount(): void
    {
        $id = (int) $this->param('id', 1);
        $this->messages = self::suMessages($id);
        $this->seeded = true;
    }

    public function navTitle(): string
    {
        return $this->friend()['name'];
    }

    public function navigationOptions(): ?NavBarOptions
    {
        return NavBarOptions::make()
            ->action(NavAction::make('video')->icon('video.fill')->press('startVideo'))
            ->action(NavAction::make('call')->icon('phone.fill')->press('startCall'))
            ->action(NavAction::make('more')->icon('ellipsis')->press('openMenu'));
    }

    public function setDraft(string $value): void
    {
        $this->draft = $value;
    }

    public function send(): void
    {
        $text = trim($this->draft);
        if ($text === '') {
            return;
        }

        $this->messages[] = [
            'id' => count($this->messages) + 1,
            'fromMe' => true,
            'text' => $text,
            'time' => date('g:i A'),
            'status' => 'sent',
        ];
        $this->draft = '';
    }

    public function attachFile(): void  { /* stub */ }
    public function attachPhoto(): void { /* stub */ }
    public function openEmoji(): void   { /* stub */ }
    public function openMore(): void    { /* stub */ }
    public function startCall(): void   { /* stub */ }
    public function startVideo(): void  { /* stub */ }
    public function openMenu(): void    { /* stub */ }

    /** Resolve the friend (other party) for the conversation. */
    private function friend(): array
    {
        $id = (int) $this->param('id', 1);
        $conv = self::suConversation($id);
        if ($conv && ! $conv['isGroup']) {
            return self::suUser($conv['userId']);
        }
        // Fallback for the demo — Alex Rivera matches the mockup.
        return self::suUser(5);
    }

    public function render(): Element
    {
        return $this->view('syncup.chat', [
            'friend' => $this->friend(),
        ]);
    }
}
