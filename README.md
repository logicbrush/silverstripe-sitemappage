# silverstripe-sitemappage

[![Build Status](https://travis-ci.org/logicbrush/silverstripe-sitemappage.svg?branch=master)](https://travis-ci.org/logicbrush/silverstripe-sitemappage)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/logicbrush/silverstripe-sitemappage/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/logicbrush/silverstripe-sitemappage/?branch=master)
[![codecov.io](https://codecov.io/github/logicbrush/silverstripe-sitemappage/coverage.svg?branch=master)](https://codecov.io/github/logicbrush/silverstripe-sitemappage?branch=master)

A module for the SilverStripe CMS which produces a page listing every (public) page on your site.

## Why?

Sometimes it's just nice to have a page that lists out everything on your site.

## Installation

```sh
composer require "logicbrush/silverstripe-sitemappage"
```

## Usage

This module defines a new page class of type `Logicbrush\SiteMapPage\Model\SiteMapPage`.  When you create an instance of this page type it will include a heirarchical list of links to all the pages on the site after the content.
