<?php

use Illuminate\Container\Container;
use Illuminate\Support\Facades\Facade;

$app = new Container();
$app->singleton('app', Container::class);
Facade::setFacadeApplication($app);
