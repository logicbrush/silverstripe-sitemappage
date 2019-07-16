<?php

namespace Logicbrush\SiteMapPage\Tasks;

use SilverStripe\ORM\DB;
use Logicbrush\SiteMapPage\Model\SiteMapPage;
use SilverStripe\Dev\MigrationTask;

class UpdatePageReferencesTask extends MigrationTask {

    public function up() {
        $this->runSql('SiteMapPage', SiteMapPage::class);
    }

    public function down() {
        $this->runSql(SiteMapPage::class, 'SiteMapPage');
    }

    private function runSql($from, $to) {
        
        DB::query("update `SiteTree` set ClassName = '{$from}' where ClassName = '{$to}'");
        
        DB::query("update `SiteTree_Live` set ClassName = '{$from}' where ClassName = '{$to}'");
        
        DB::query("update `SiteTreeVersions_Live` set ClassName = '{$from}' where ClassName = '{$to}'");
        
        DB::query("update `SiteTreeLink` set ParentClass = '{$from}' where ParentClass = '{$to}'");
        
    }
}
