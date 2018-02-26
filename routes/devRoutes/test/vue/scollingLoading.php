<?php

Route::group([
    'prefix'    => 'test'
],function (){
    Route::get('/scrolling','Test\Vue\Scrolling@index');
});