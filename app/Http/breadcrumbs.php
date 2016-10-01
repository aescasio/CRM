<?php
/**
 * Created by PhpStorm.
 * User: ITS-Gelo
 * Date: 2016-04-07
 * Time: 9:48 AM
 */

// Home

Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home');
});

// Home > Industry
Breadcrumbs::register('industry', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Industry', route('industry.index'));
});

// Home > Client Types
Breadcrumbs::register('clienttypes', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Client Types', route('clientTypes/index'));
});
