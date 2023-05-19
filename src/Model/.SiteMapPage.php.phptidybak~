<?php

namespace Logicbrush\SiteMapPage\Model;

use Page;
use PageController;
use SilverStripe\Blog\Model\Blog;
use SilverStripe\CMS\Model\RedirectorPage;
use SilverStripe\ORM\FieldType\DBField;

class SiteMapPage extends Page {

	private static $icon = 'logicbrush/silverstripe-sitemappage:images/treeicons/sitemap-page.png';
	private static $description = 'A page that includes a link to every searchable page on the site';

	private static $table_name = 'SiteMapPage';

	public function getSiteMap() {
		return $this->makeSiteMap( \Page::get()->filter( 'ParentID', 0 ) );
	}


	private function makeSiteMap( $pages ) {

		$html = "";

		foreach ( $pages as $page ) {
			if ( ( $page->ShowInMenus || $page->ShowInSearch ) && ! ( $page instanceof RedirectorPage ) ) {
				$html .= "<li><a href=\"{$page->Link()}\">" . htmlspecialchars( $page->MenuTitle ) . '</a>';
				if ( $page instanceof Blog ) {
					// Sort blog entries by descending date.
					$html .= $this->makeSiteMap(
						 $page->getBlogPosts()
					);
				} else {
					$html .= $this->makeSiteMap( $page->AllChildren() );
				}
				$html .= '</li>';
			}
		}

		if ( $html ) {
			return DBField::create_field( 'HTMLText', "<ul>$html</ul>" );
		}

		return false;
	}


}


class SiteMapPageController extends PageController {

	public function index() {
		return [
			'Content' => DBField::create_field( 'HTMLText', $this->Content . "\n\n" . $this->SiteMap )
		];
	}


}
