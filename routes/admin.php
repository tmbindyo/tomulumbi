<?php


// Home
Route::get('/dashboard', 'Admin\DashboardController@dashboard')->name('admin.dashboard');
Route::get('/album/dashboard', 'Admin\DashboardController@albumDashboard')->name('admin.album.dashboard');
Route::get('/client/dashboard', 'Admin\DashboardController@clientDashboard')->name('admin.client.dashboard');
Route::get('/design/dashboard', 'Admin\DashboardController@designDashboard')->name('admin.design.dashboard');
Route::get('/project/dashboard', 'Admin\DashboardController@projectDashboard')->name('admin.project.dashboard');


// Settings
Route::get('/album/types', 'Admin\SettingsController@albumTypes')->name('admin.album.types');
Route::get('/album/type/{album_type_id}', 'Admin\SettingsController@albumType')->name('admin.album.type');
Route::post('/album/type', 'Admin\SettingsController@albumTypeSave')->name('admin.album.type.save');
Route::post('/album/type/update/{album_type_id}', 'Admin\SettingsController@albumTypeUpdate')->name('admin.album.type.update');
Route::get('/album/type/delete/{album_type_id}', 'Admin\SettingsController@albumTypeDelete')->name('admin.album.type.delete');

Route::get('/tags', 'Admin\SettingsController@tags')->name('admin.tags');
Route::get('/tag/{tag_id}', 'Admin\SettingsController@tag')->name('admin.tag');
Route::post('/tag', 'Admin\SettingsController@tagSave')->name('admin.tag.save');
Route::post('/tag/update/{tag_id}', 'Admin\SettingsController@tagUpdate')->name('admin.tag.update');
Route::get('/tag/delete/{tag_id}', 'Admin\SettingsController@tagDelete')->name('admin.tag.delete');

Route::get('/categories', 'Admin\SettingsController@categories')->name('admin.categories');
Route::get('/category/{category_id}', 'Admin\SettingsController@category')->name('admin.category');
Route::post('/category', 'Admin\SettingsController@categorySave')->name('admin.category.save');
Route::post('/category/update/{category_id}', 'Admin\SettingsController@categoryUpdate')->name('admin.category.update');
Route::get('/category/delete/{category_id}', 'Admin\SettingsController@categoryDelete')->name('admin.category.delete');


// Album
Route::get('/albums', 'Admin\AlbumController@albums')->name('admin.albums');
Route::get('/album/{album_id}', 'Admin\AlbumController@album')->name('admin.album');
Route::post('/album', 'Admin\AlbumController@albumSave')->name('admin.album.save');
Route::post('/album/update/{album_id}', 'Admin\AlbumController@albumUpdate')->name('admin.album.update');
Route::get('/album/delete/{album_id}', 'Admin\SettingsController@albumDelete')->name('admin.album.delete');
// ALbum set
Route::get('/album/set/{album_id}', 'Admin\AlbumController@albumSet')->name('admin.album.set');
Route::post('/album/set/{album_id}', 'Admin\AlbumController@albumSetSave')->name('admin.album.set.save');

Route::post('/album/set/image/upload/{album_set_id}', 'Admin\AlbumController@albumSetImageUpload')->name('admin.album.set.image.upload');

Route::get('/calendar', 'Admin\CalendarController@calendar')->name('admin.calendar');

Route::get('/form', 'Admin\DashboardController@form')->name('admin.form');
Route::get('/form/advanced', 'Admin\DashboardController@formAdvanced')->name('admin.form.advanced');
Route::get('/form/validation', 'Admin\DashboardController@formValidation')->name('admin.form.validation');
Route::get('/form/wizard', 'Admin\DashboardController@formWizard')->name('admin.form.wizard');
Route::get('/form/upload', 'Admin\DashboardController@formUpload')->name('admin.form.upload');
Route::get('/form/buttons', 'Admin\DashboardController@formButtons')->name('admin.form.buttons');

Route::get('/general/elements', 'Admin\DashboardController@generalElements')->name('admin.general.elements');
Route::get('/media/gallery', 'Admin\DashboardController@mediaGallery')->name('admin.media.gallery');
Route::get('/typography', 'Admin\DashboardController@typography')->name('admin.typography');
Route::get('/icons', 'Admin\DashboardController@icons')->name('admin.icons');
Route::get('/glyphicons', 'Admin\DashboardController@glyphicons')->name('admin.glyphicons');
Route::get('/widgets', 'Admin\DashboardController@widgets')->name('admin.widgets');
Route::get('/invoice', 'Admin\DashboardController@invoice')->name('admin.invoice');
Route::get('/inbox', 'Admin\DashboardController@inbox')->name('admin.inbox');
//Route::get('/calendar', 'Admin\DashboardController@calendar')->name('admin.calendar');

Route::get('/tables', 'Admin\DashboardController@tables')->name('admin.tables');
Route::get('/tables/dynamic', 'Admin\DashboardController@tablesDynamic')->name('admin.tables.dynamic');

Route::get('/charts/js', 'Admin\DashboardController@chartsJs')->name('admin.charts.js');
Route::get('/charts/js/2', 'Admin\DashboardController@chartsJs2')->name('admin.charts.js.2');
Route::get('/morris/js/', 'Admin\DashboardController@morrisJs')->name('admin.morris.js');
Route::get('/echarts', 'Admin\DashboardController@echarts')->name('admin.echarts');
Route::get('/other/charts', 'Admin\DashboardController@otherCharts')->name('admin.other.charts');

Route::get('/fixed/sidebar', 'Admin\DashboardController@tables')->name('admin.fixed.sidebar');
Route::get('/fixed/footer', 'Admin\DashboardController@tables')->name('admin.fixed.footer');

Route::get('/ecommerce', 'Admin\DashboardController@tables')->name('admin.e.commerce');
Route::get('/projects', 'Admin\DashboardController@tables')->name('admin.projects');
Route::get('/project/details', 'Admin\DashboardController@tables')->name('admin.project.details');
Route::get('/contacts', 'Admin\DashboardController@tables')->name('admin.contacts');
Route::get('/profile', 'Admin\DashboardController@tables')->name('admin.profile');

Route::get('/page/403', 'Admin\DashboardController@tables')->name('admin.page.403');
Route::get('/page/404', 'Admin\DashboardController@tables')->name('admin.page.404');
Route::get('/page/500', 'Admin\DashboardController@tables')->name('admin.page.500');
Route::get('/plain/page', 'Admin\DashboardController@tables')->name('admin.plain.page');
Route::get('/login', 'Admin\DashboardController@tables')->name('admin.login');
Route::get('/pricing/tables', 'Admin\DashboardController@tables')->name('admin.pricing.tables');


