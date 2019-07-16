<?php

namespace Logicbrush\SiteMapPage\Tasks;

use SilverStripe\ORM\DB;
use Logicbrush\SiteMapPage\Model\SiteMapPage;
use SilverStripe\Dev\MigrationTask;

class UpdateSiteMapPageReferencesTask extends MigrationTask {

    private static $segment = 'UpdateSiteMapPageReferencesTask';

    protected $title = "Update SiteMapPage DB References";
    
    protected $description = "Updates the references to the class name in the datbase to the FQCN."; 

    public function up() {
        $this->runSql('SiteMapPage', SiteMapPage::class);
    }

    public function down() {
        $this->runSql(SiteMapPage::class, 'SiteMapPage');
    }

    private function runSql($from, $to) {
        
        DB::query("update `SiteTree` set ClassName = '{$to}' where ClassName = '{$from}'");
        
        DB::query("update `SiteTree_Live` set ClassName = '{$to}' where ClassName = '{$from}'");
        
        DB::query("update `SiteTree_Versions` set ClassName = '{$to}' where ClassName = '{$from}'");
        
        DB::query("update `SiteTreeLink` set ParentClass = '{$to}' where ParentClass = '{$from}'");
        
    }
}
