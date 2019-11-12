<?php



// Removed for coming soon
Route::get('/pending', 'Landing\LandingController@index')->name('index');
Route::get('/about', 'Landing\LandingController@index')->name('about');
Route::get('/contact', 'Landing\LandingController@index')->name('contact');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'ComingSoon\ComingSoonController@comingSoon')->name('comingSoon');

Auth::routes();

// Welcome
Route::get('/welcome', 'Landing\LandingController@welcome')->name('welcome');

// Client proofs
Route::get('/client/proofs', 'Landing\AlbumController@clientProofs')->name('client.proofs');
Route::get('/client/proof/{album_id}', 'Landing\AlbumController@clientProof')->name('client.proof');
Route::get('/client/proof/access/{album_id}', 'Landing\AlbumController@clientProofAccess')->name('client.proof.access');
Route::post('/client/proof/access/{album_id}', 'Landing\AlbumController@clientProofAccessCheck')->name('client.proof.access.check');
Route::get('/client/proof/show/{album_view_id}', 'Landing\AlbumController@clientProofShow')->name('client.proof.show');

Route::get('/client/proof/download/{album_view_id}', 'Landing\AlbumController@clientProofDownload')->name('client.proof.download');
Route::post('/client/proof/download/pin/{album_view_id}', 'Landing\AlbumController@clientProofDownloadPin')->name('client.proof.download.pin');

// Personal albums
Route::get('/personal/albums', 'Landing\AlbumController@personalAlbums')->name('personal.albums');
Route::get('/personal/album/show/{album_id}', 'Landing\AlbumController@personalAlbumShow')->name('personal.album.show');

Route::get('/tags', 'Landing\AlbumController@tags')->name('tags');
Route::get('/tag/show/{tag_id}', 'Landing\AlbumController@tagShow')->name('tag.show');

// Design work
Route::get('/designs', 'Landing\DesignController@designs')->name('designs');
Route::get('/design/show/{design_id}', 'Landing\DesignController@designShow')->name('design.show');
Route::get('/design/work/{design_work_id}', 'Landing\DesignController@designWork')->name('design.work');
Route::get('/design/{design_id}/gallery', 'Landing\DesignController@designGallery')->name('design.gallery');

// Contact
Route::post('/contact', 'Landing\LandingController@contactSave')->name('contact.save');

// Journal
Route::get('/journals', 'Landing\JournalController@journals')->name('journals');
Route::get('/journal/show/{journal_id}', 'Landing\JournalController@journalShow')->name('journal.show');
Route::get('/journal/gallery/{journal_id}', 'Landing\JournalController@journalGalleryShow')->name('journal.gallery.show');

Route::get('/projects', 'Landing\ProjectController@projects')->name('projects');
Route::get('/project/show/{project_id}', 'Landing\ProjectController@projectShow')->name('project.show');
