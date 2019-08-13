<?php


// Home
Route::get('/dashboard', 'Admin\DashboardController@dashboard')->name('admin.dashboard');
Route::get('/album/dashboard', 'Admin\DashboardController@albumDashboard')->name('admin.album.dashboard');
Route::get('/client/dashboard', 'Admin\DashboardController@clientDashboard')->name('admin.client.dashboard');
Route::get('/design/dashboard', 'Admin\DashboardController@designDashboard')->name('admin.design.dashboard');
Route::get('/project/dashboard', 'Admin\DashboardController@projectDashboard')->name('admin.project.dashboard');

// Calendar
Route::get('/calendar', 'Admin\CalendarController@viewCalender')->name('admin.calendar');

// Settings
Route::get('/album/types', 'Admin\SettingsController@albumTypes')->name('admin.album.types');
Route::get('/album/type/{album_type_id}', 'Admin\SettingsController@albumType')->name('admin.album.type');
Route::post('/album/type/save', 'Admin\SettingsController@albumTypeSave')->name('admin.album.type.save');
Route::post('/album/type/update/{album_type_id}', 'Admin\SettingsController@albumTypeUpdate')->name('admin.album.type.update');
Route::get('/album/type/delete/{album_type_id}', 'Admin\SettingsController@albumTypeDelete')->name('admin.album.type.delete');

Route::get('/tags', 'Admin\SettingsController@tags')->name('admin.tags');
Route::get('/tag/{tag_id}', 'Admin\SettingsController@tag')->name('admin.tag');
Route::post('/tag/save', 'Admin\SettingsController@tagSave')->name('admin.tag.save');
Route::post('/tag/update/{tag_id}', 'Admin\SettingsController@tagUpdate')->name('admin.tag.update');
Route::get('/tag/delete/{tag_id}', 'Admin\SettingsController@tagDelete')->name('admin.tag.delete');

Route::get('/categories', 'Admin\SettingsController@categories')->name('admin.categories');
Route::get('/category/{category_id}', 'Admin\SettingsController@category')->name('admin.category');
Route::post('/category/save', 'Admin\SettingsController@categorySave')->name('admin.category.save');
Route::post('/category/update/{category_id}', 'Admin\SettingsController@categoryUpdate')->name('admin.category.update');
Route::get('/category/delete/{category_id}', 'Admin\SettingsController@categoryDelete')->name('admin.category.delete');

Route::get('/typographies', 'Admin\SettingsController@typographies')->name('admin.typographies');
Route::get('/typography/{typography_id}', 'Admin\SettingsController@typography')->name('admin.typography');
Route::post('/typography/save', 'Admin\SettingsController@typographySave')->name('admin.typography.save');
Route::post('/typography/update/{typography_id}', 'Admin\SettingsController@typographyUpdate')->name('admin.typography.update');
Route::get('/typography/delete/{typography_id}', 'Admin\SettingsController@typographyDelete')->name('admin.typography.delete');

// To Dos
Route::get('/to/dos', 'Admin\ToDoController@toDos')->name('admin.to.dos');
Route::post('/to/do/save', 'Admin\ToDoController@toDoSave')->name('admin.to.do.save');
Route::post('/to/do/update/{todo_id}', 'Admin\ToDoController@toDoUpdate')->name('admin.to.do.update');
Route::get('/to/do/set/in/progress/{todo_id}', 'Admin\ToDoController@toDoSetInProgress')->name('admin.to.do.set.in.progress');
Route::get('/to/do/set/completed/{todo_id}', 'Admin\ToDoController@toDoSetCompleted')->name('admin.to.do.set.completed');
Route::get('/to/do/delete/{todo_id}', 'Admin\ToDoController@toDoDelete')->name('admin.to.do.delete');


// Client proof routes
Route::get('/client/settings', 'Admin\ClientController@clientSettings')->name('admin.client.settings');
Route::get('/client/albums', 'Admin\ClientController@albums')->name('admin.client.albums');
Route::get('album/set/status/{album_set_id}', 'Admin\ClientController@albumSetStatus')->name('admin.album.set.status');
Route::get('album/set/download/status/{album_set_id}', 'Admin\ClientController@albumSetDownloadStatus')->name('admin.album.set.download.status');

// Album
Route::get('/albums', 'Admin\ClientController@albums')->name('admin.albums');
Route::get('/album/create', 'Admin\ClientController@albumRegistration')->name('admin.album.create');
Route::get('/album/{album_id}', 'Admin\ClientController@album')->name('admin.album');
Route::post('/album/update/collection/settings/{album_id}', 'Admin\ClientController@albumUpdateCollectionSettings')->name('admin.album.update.collection.settings');
Route::post('/album/update/design/{album_id}', 'Admin\ClientController@albumUpdateDesign')->name('admin.album.update.design');
Route::post('/album/update/privacy/{album_id}', 'Admin\ClientController@albumUpdatePrivacy')->name('admin.album.update.privacy');
Route::post('/album/set/cover/image/{album_id}', 'Admin\ClientController@albumCoverImageUpload')->name('admin.album.set.cover.image');
Route::post('/album/update/download/{album_id}', 'Admin\ClientController@albumUpdateDownload')->name('admin.album.update.download');
Route::get('/album/generate/password/{album_id}', 'Admin\ClientController@generateAlbumPassword')->name('admin.album.generate.password');
Route::get('/album/generate/pin/{album_id}', 'Admin\ClientController@generateAlbumPin')->name('admin.album.generate.pin');
Route::post('/album/to/do/save/{album_id}', 'Admin\ToDoController@albumToDoSave')->name('admin.album.to.do.save');
Route::get('/album/restrict/to/specific/{album_id}/email/{email}', 'Admin\ClientController@albumDownloadRestrictionEmail')->name('admin.album.restrict.to.specific.email');
Route::get('/album/restrict/to/specific/email/delete/{restriction_email_id}', 'Admin\ClientController@albumDownloadRestrictionEmailDelete')->name('admin.album.restrict.to.specific.email.delete');
Route::post('/album/save', 'Admin\ClientController@albumSave')->name('admin.album.save');
Route::post('/album/update/{album_id}', 'Admin\ClientController@albumUpdate')->name('admin.album.update');
Route::get('/album/delete/{album_id}', 'Admin\SettingsController@albumDelete')->name('admin.album.delete');

// Album set
Route::get('/album/set/{album_id}', 'Admin\ClientController@albumSet')->name('admin.album.set');
Route::post('/album/set/{album_id}/save', 'Admin\ClientController@albumSetSave')->name('admin.album.set.save');

Route::post('/album/set/image/upload/{album_set_id}', 'Admin\ClientController@albumSetImageUpload')->name('admin.album.set.image.upload');


Route::get('/personal/albums', 'Admin\DashboardController@form')->name('admin.personal.albums');
Route::get('/design/work', 'Admin\DashboardController@form')->name('admin.design.work');
Route::get('/diy', 'Admin\DashboardController@form')->name('admin.diy');
Route::get('/store', 'Admin\DashboardController@form')->name('admin.store');


