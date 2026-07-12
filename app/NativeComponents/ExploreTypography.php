<?php

namespace App\NativeComponents;

use Illuminate\View\View;
use Native\Mobile\Edge\Layouts\Builders\NavBarOptions;
use Native\Mobile\Edge\NativeComponent;

class ExploreTypography extends NativeComponent
{
    public function navTitle(): string
    {
        return 'Typography & Colors';
    }

    public function navigationOptions(): ?NavBarOptions
    {
        // displayMode is a plain setter — last call wins. Keep `inline`:
        // on iOS a custom bar font only applies to inline titles (system
        // large titles can't be fonted per screen).
        return NavBarOptions::make()
            ->displayMode('inline')
            ->font('Audiowide-Regular');
    }

    public function render(): View
    {
        return view('explore.typography');
    }
}
