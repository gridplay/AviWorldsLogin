<?php
namespace GridPlay\AWLogin;
use SocialiteProviders\Manager\SocialiteWasCalled;
class AWLoginExtendSocialite {
    public function handle(SocialiteWasCalled $socialiteWasCalled) {
        $socialiteWasCalled->extendSocialite('awlogin', Provider::class);
    }
}