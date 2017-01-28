<?php

function isRouterActive($name){
	return Route::currentRouteName($name);
}