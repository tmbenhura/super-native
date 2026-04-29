<?php

namespace App\NativeComponents;

use App\NativeComponents\Concerns\HasSyncUpData;
use Native\Mobile\Edge\Element;
use Native\Mobile\Edge\Layouts\Builders\NavAction;
use Native\Mobile\Edge\Layouts\Builders\NavBarOptions;
use Native\Mobile\Edge\NativeComponent;
use Native\Mobile\Edge\Transition;

class SyncUpChats extends NativeComponent
{
    use HasSyncUpData;

    public string $activeFilter = 'All';

    public string $search = '';

    public function navTitle(): string
    {
        return 'SyncUp';
    }

    /**
     * Screen-level NavBar additions appended to the layout's actions.
     * The layout already supplies the `search` action, so we only contribute
     * a `more` (overflow) action here.
     */
    public function navigationOptions(): ?NavBarOptions
    {
        return NavBarOptions::make()
            ->action(NavAction::make('more')->icon('ellipsis')->press('openMenu'));
    }

    public function setFilter(string $name): void
    {
        $this->activeFilter = $name;
    }

    public function updateSearch(string $value): void
    {
        $this->search = $value;
    }

    public function openChat(int $id): void
    {
        $this->navigate("/syncup/chat/{$id}")
            ->transition(Transition::SlideFromRight);
    }

    public function newMessage(): void
    {
        // Demo stub — would push a recipient picker.
    }

    public function addSuggestion(int $id): void
    {
        // Demo stub.
    }

    public function openSearch(): void
    {
        // Demo stub.
    }

    public function openMenu(): void
    {
        // Demo stub.
    }

    public function render(): Element
    {
        $users = self::suUsers();
        $conversations = self::suConversations();

        // Decorate each conversation with the related user (or a synthetic
        // 'group' avatar for is-group rows).
        $rows = [];
        foreach ($conversations as $c) {
            if ($c['isGroup']) {
                $rows[] = $c + [
                    'displayName' => $c['name'],
                    'avatarUrl' => null,
                ];
            } else {
                $u = self::suUser($c['userId']);
                $rows[] = $c + [
                    'displayName' => $u['name'],
                    'avatarUrl' => $u['avatarUrl'],
                    'status' => $u['status'],
                ];
            }
        }

        return $this->view('syncup.chats', [
            'rows' => $rows,
            'filters' => self::suFilters(),
            'suggestions' => self::suSuggestions(),
        ]);
    }
}
