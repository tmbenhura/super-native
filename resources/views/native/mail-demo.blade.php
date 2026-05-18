@php
    use App\Icons\SF;
    use App\Icons\Material;
@endphp

<native:list @refresh="refresh" :separator="true" class="w-full h-full ">

    @foreach ($emails as $email)
        <native:list-item
            @press="open('{{ $email['id'] }}')"
            :leadingMonogram="strtoupper(substr($email['from'], 0, 1))"
            :leadingMonogramColor="$email['unread'] ? '#3B82F6' : '#94A3B8'"
            :overline="$email['from']"
            :headline="$email['subject']"
            :supporting="$email['preview']"
            :trailing-badges="array_values(array_filter([
                $email['flagged'] ? [
                    'sf'       => SF::FlagFill,
                    'material' => Material::Flag,
                    'color'    => '#EF4444',
                ] : null,
                $email['pinned'] ? [
                    'sf'       => 'pin.fill',
                    'material' => Material::PushPin,
                    'color'    => '#F59E0B',
                ] : null,
            ]))"
            :leading-actions="[
                [
                    'method'   => $email['unread'] ? 'open(\'' . $email['id'] . '\')' : 'toggleRead(\'' . $email['id'] . '\')',
                    'label'    => $email['unread'] ? 'Read' : 'Unread',
                    'sf'       => $email['unread'] ? SF::Envelope : SF::EnvelopeFill,
                    'material' => Material::MarkEmailRead,
                    'tint'     => '#3B82F6',
                ],
                [
                    'method'   => 'togglePin(\'' . $email['id'] . '\')',
                    'label'    => $email['pinned'] ? 'Unpin' : 'Pin',
                    'sf'       => 'pin.fill',
                    'material' => Material::PushPin,
                    'tint'     => $email['pinned'] ? '#D97706' : '#F59E0B',
                ],
            ]"
            :trailing-actions="[
                [
                    'method'   => 'toggleFlag(\'' . $email['id'] . '\')',
                    'label'    => $email['flagged'] ? 'Unflag' : 'Flag',
                    'sf'       => SF::Flag,
                    'material' => Material::Flag,
                    'tint'     => $email['flagged'] ? '#EA580C' : '#F97316',
                ],
                [
                    'method'   => 'delete(\'' . $email['id'] . '\')',
                    'label'    => 'Delete',
                    'sf'       => SF::Trash,
                    'material' => Material::Delete,
                    'role'     => 'destructive',
                ],
            ]" />
    @endforeach

    @if (empty($emails))
        <native:column class="w-full items-center justify-center py-20 gap-2">
            <native:text class="text-base font-semibold text-theme-on-surface">All clean</native:text>
            <native:text class="text-sm text-theme-on-surface-variant">Pull down to refresh.</native:text>
        </native:column>
    @endif

</native:list>
