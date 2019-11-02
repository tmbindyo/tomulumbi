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
Route::get('/client/settings', 'Admin\AlbumController@clientSettings')->name('admin.client.settings');


// Album
Route::get('/personal/albums', 'Admin\AlbumController@personalAlbums')->name('admin.personal.albums');
Route::get('/personal/album/create', 'Admin\AlbumController@personalAlbumCreate')->name('admin.personal.album.create');
Route::post('/personal/album/store', 'Admin\AlbumController@personalAlbumStore')->name('admin.personal.album.store');
Route::get('/personal/album/show/{album_id}', 'Admin\AlbumController@personalAlbumShow')->name('admin.personal.album.show');
Route::post('/personal/album/update/{album_id}', 'Admin\AlbumController@personalAlbumUpdate')->name('admin.personal.album.update');
Route::get('/personal/album/delete/{album_id}', 'Admin\AlbumController@personalAlbumDelete')->name('admin.personal.album.delete');
Route::get('/personal/album/restore/{album_id}', 'Admin\AlbumController@personalAlbumRestore')->name('admin.personal.album.restore');
Route::post('/personal/album/set/cover/image/{album_id}', 'Admin\AlbumController@personalAlbumCoverImageUpload')->name('admin.personal.album.set.cover.image');
Route::post('/personal/album/update/design/{album_id}', 'Admin\AlbumController@personalAlbumUpdateDesign')->name('admin.personal.album.update.design');

Route::get('/client/proofs', 'Admin\AlbumController@clientProofs')->name('admin.client.proofs');
Route::get('/client/proof/create', 'Admin\AlbumController@clientProofCreate')->name('admin.client.proof.create');
Route::post('/clint/proof/store', 'Admin\AlbumController@clientProofStore')->name('admin.client.proof.store');
Route::get('/client/proof/show/{album_id}', 'Admin\AlbumController@clientProofShow')->name('admin.client.proof.show');
Route::get('/client/proof/delete/{album_id}', 'Admin\AlbumController@clientProofDelete')->name('admin.client.proof.delete');
Route::get('/client/proof/restore/{album_id}', 'Admin\AlbumController@clientProofRestore')->name('admin.client.proof.delete');
Route::post('/client/proof/update/collection/settings/{album_id}', 'Admin\AlbumController@albumUpdateCollectionSettings')->name('admin.client.proof.update.collection.settings');
Route::post('/client/proof/update/design/{album_id}', 'Admin\AlbumController@clientProofUpdateDesign')->name('admin.client.proof.update.design');
Route::post('/client/proof/update/cover/image/design/{album_id}', 'Admin\AlbumController@clientProofUpdateCoverImageDesign')->name('admin.client.proof.update.cover.image.design');
Route::post('/client/proof/update/privacy/{album_id}', 'Admin\AlbumController@clientProofUpdatePrivacy')->name('admin.client.proof.update.privacy');
Route::post('/client/proof/set/cover/image/{album_id}', 'Admin\AlbumController@clientProofCoverImageUpload')->name('admin.client.proof.set.cover.image');
Route::post('/client/proof/update/download/{album_id}', 'Admin\AlbumController@clientProofUpdateDownload')->name('admin.client.proof.update.download');
Route::get('/client/proof/generate/password/{album_id}', 'Admin\AlbumController@generateClientProofPassword')->name('admin.client.proof.generate.password');
Route::get('/client/proof/generate/pin/{album_id}', 'Admin\AlbumController@generateClientProofPin')->name('admin.client.proof.generate.pin');
Route::get('/client/proof/restrict/to/specific/{album_id}/email/{email}', 'Admin\AlbumController@clientProofDownloadRestrictionEmail')->name('admin.client.proof.restrict.to.specific.email');
Route::get('/client/proof/restrict/to/specific/email/delete/{restriction_email_id}', 'Admin\AlbumController@clientProofDownloadRestrictionEmailDelete')->name('admin.client.proof.restrict.to.specific.email.delete');

Route::post('/client/proof/to/do/save/{album_id}', 'Admin\ToDoController@albumToDoSave')->name('admin.client.proof.to.do.save');
// Album set
Route::get('/client/proof/set/{album_id}', 'Admin\AlbumController@clientProofSet')->name('admin.client.proof.set');
Route::post('/client/proof/set/{album_id}/save', 'Admin\AlbumController@clientProofSetSave')->name('admin.client.proof.set.save');
Route::get('/client/proof/set/status/{album_set_id}', 'Admin\AlbumController@clientProofSetStatus')->name('admin.client.proof.set.status');
Route::get('/client/proof/set/download/status/{album_set_id}', 'Admin\AlbumController@clientProofSetDownloadStatus')->name('admin.client.proof.set.download.status');
Route::post('/client/proof/set/image/upload/{album_set_id}', 'Admin\AlbumController@clientProofSetImageUpload')->name('admin.client.proof.set.image.upload');



Route::get('/designs', 'Admin\DashboardController@designs')->name('admin.designs');
Route::get('/diy', 'Admin\DashboardController@dashboard')->name('admin.diy');
Route::get('/store', 'Admin\DashboardController@dashboard')->name('admin.store');


Route::get('/test/masonry', 'Admin\SettingsController@testMasonry')->name('admin.test.masonry');


