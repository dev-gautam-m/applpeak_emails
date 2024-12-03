<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

// testing routes
Route::get('/sendEmails', 'CronController@sendEmails');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Server
    Route::delete('servers/destroy', 'ServerController@massDestroy')->name('servers.massDestroy');
    Route::resource('servers', 'ServerController');

    // Email Template
    Route::delete('email-templates/destroy', 'EmailTemplateController@massDestroy')->name('email-templates.massDestroy');
    Route::resource('email-templates', 'EmailTemplateController');

    // Contact
    Route::delete('contacts/destroy', 'ContactController@massDestroy')->name('contacts.massDestroy');
    Route::resource('contacts', 'ContactController');

    // Contact Group
    Route::delete('contact-groups/destroy', 'ContactGroupController@massDestroy')->name('contact-groups.massDestroy');
    Route::resource('contact-groups', 'ContactGroupController');

    // Email Log
    Route::delete('email-logs/destroy', 'EmailLogController@massDestroy')->name('email-logs.massDestroy');
    Route::resource('email-logs', 'EmailLogController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
