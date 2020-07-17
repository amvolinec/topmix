<?php

Route::group(['middleware' => ['web']], function () {
    Route::get('forms/', 'Avart\Forms\FieldsController@index')->name('forms.index');
    Route::get('get-index/{table}', 'Avart\Forms\FieldsController@getIndex')->name('forms.get_index');
    Route::get('forms/create', 'Avart\Forms\FieldsController@create')->name('forms.create');
    Route::post('forms/store', 'Avart\Forms\FieldsController@store')->name('forms.store');
    Route::get('forms/{route}/edit', 'Avart\Forms\FieldsController@edit')->name('forms.edit');
    Route::put('forms/{route}/update', 'Avart\Forms\FieldsController@update')->name('forms.update');
});


