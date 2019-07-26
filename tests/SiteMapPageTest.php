<?php

namespace Logicbrush\SiteMapPage\Tests;

use Logicbrush\SiteMapPage\Model\SiteMapPage;
use SilverStripe\Dev\FunctionalTest;

class SiteMapPageTest extends FunctionalTest {

    public function testIt() {
        $page = new SiteMapPage();
        $page->write();
        $this->assertTrue(false);
    }
    
}
