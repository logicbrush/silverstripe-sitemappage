<?php

namespace Logicbrush\SiteMapPage\Tests;

use Logicbrush\SiteMapPage\Model\SiteMapPage;
use SilverStripe\Dev\SapphireTest;

class SiteMapPageTest extends SapphireTest {

    protected static $fixture_file = 'Pages.yml';

    /**
     * Check the structure of the sitemap generated from the example
     * fixture file.
     */
    public function testGeneratingSiteMap() {
        $page = $this->objFromFixture(SiteMapPage::class, 'sitemap');
        $html = $page->getSiteMap();
        $this->assertEquals(
            '<ul><li><a href="/">Home</a></li><li><a href="/services/">Services</a><ul><li><a href="/services/service-1/">Service 1</a></li><li><a href="/services/service-2/">Service 2</a></li></ul></li><li><a href="/site-map/">Site Map</a></li></ul>',
            $html->Value
        );
    }
    
}
