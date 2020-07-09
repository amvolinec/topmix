<?php

Route::group(['middleware' => ['web']], function () {
    Route::get('forms/', 'Avart\Forms\FieldsController@index')->name('forms.index');
    Route::get('forms/create', 'Avart\Forms\FieldsController@create')->name('forms.create');
    Route::post('forms/store', 'Avart\Forms\FieldsController@store')->name('forms.store');
});


