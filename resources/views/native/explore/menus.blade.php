@php
    use Native\Mobile\Edge\Layouts\Builders\NavAction;
    use App\Icons\Android;
    use App\Icons\Ios;

    $pressableMenu = [
        NavAction::make('record')
            ->label('Record audio')
            ->icon(ios: Ios::Mic, android: Android::Mic)
            ->press('logRecord'),
        NavAction::make('upload')
            ->label('Upload file')
            ->icon(ios: Ios::ArrowUp, android: Android::ArrowUpward)
            ->press('logUpload'),
        NavAction::divider(),
        NavAction::make('settings')
            ->label('Audio settings')
            ->icon(ios: Ios::Gear, android: Android::Settings)
            ->press('logSettings'),
    ];

    $buttonMenu = [
        NavAction::make('export_pdf')
            ->label('Export as PDF')
            ->icon(ios: Ios::DocText, android: Android::Description)
            ->press('logExportPdf'),
        NavAction::make('export_csv')
            ->label('Export as CSV')
            ->icon(ios: Ios::Doc, android: Android::FileCopy)
            ->press('logExportCsv'),
        NavAction::divider(),
        NavAction::make('print')
            ->label('Print')
            ->icon(ios: Ios::Printer, android: Android::Print)
            ->press('logPrint'),
    ];

    $listItemMenu = [
        NavAction::make('mark_read')
            ->label('Mark as read')
            ->icon(ios: Ios::CheckmarkCircle, android: Android::CheckCircle)
            ->press('logMarkRead'),
        NavAction::make('mute')
            ->label('Mute notifications')
            ->icon(ios: Ios::BellSlash, android: Android::NotificationsOff)
            ->press('logMute'),
        NavAction::divider(),
        NavAction::make('archive')
            ->label('Archive')
            ->icon(ios: Ios::Archivebox, android: Android::Archive)
            ->press('logArchive'),
            NavAction::divider(),
        NavAction::make('delete')
            ->label('Delete')
            ->icon(ios: Ios::Trash, android: Android::Delete)
            ->destructive()
            ->press('logDelete'),
    ];
@endphp

<native:scroll-view class="w-full h-full bg-theme-background">
    <native:column class="w-full p-5 gap-6">

        {{-- ── Pressable menu ── --}}
        <native:column class="w-full gap-2">
            <native:text class="text-lg font-semibold text-theme-on-background">Pressable + `:menu`</native:text>

            <native:row class="w-full gap-3 items-center justify-between">
                <native:text class="text-sm text-theme-on-surface-variant">Tap the mic →</native:text>
                <native:pressable
                    class="glass:interactive android:dark:bg-theme-surface-variant rounded-full p-3 items-center justify-center"
                    :menu="$pressableMenu">
                    <native:icon name="mic" :size="22" />
                </native:pressable>
            </native:row>
        </native:column>

        <native:divider class="my-2"/>

        {{-- ── Button menu ── --}}
        <native:column class="w-full gap-2">
            <native:text class="text-lg font-semibold text-theme-on-background">Button + `:menu`</native:text>
            <native:row class="w-full gap-2">
                <native:button label="Export" :menu="$buttonMenu"/>
            </native:row>
        </native:column>

        <native:divider class="my-2"/>

        {{-- ── ListItem trailing-menu ── --}}
        <native:column class="w-full gap-2">
            <native:text class="text-lg font-semibold text-theme-on-background">ListItem + `:trailing-menu`</native:text>

            <native:column class="w-full bg-theme-surface rounded-xl">
                <native:list-item
                    headline="Sarah Miller"
                    supporting="Did you see the new design specs?"
                    leadingMonogram="SM"
                    leadingMonogramColor="#0EA5E9"
                    :trailing-menu="$listItemMenu"/>
                <native:divider/>
                <native:list-item
                    headline="Design Team"
                    supporting="Alex: Looks good to me!"
                    leadingMonogram="DT"
                    leadingMonogramColor="#A855F7"
                    :trailing-menu="$listItemMenu"/>
                <native:divider/>
                <native:list-item
                    headline="Marcus James"
                    supporting="Thanks for the heads up!"
                    leadingMonogram="MJ"
                    leadingMonogramColor="#10B981"
                    :trailing-menu="$listItemMenu"/>
            </native:column>
        </native:column>

    </native:column>
</native:scroll-view>
