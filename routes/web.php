<?php

Route::get('/debug-sentry', function () {
    throw new Exception('My first Sentry error!');
});

Route::get('storage', function(){
    return Storage::disk('minio')->files();
});

Route::get('/test', 'Landing\LandingController@test')->name('test');
Route::get('/add/file', 'Landing\LandingController@addFile')->name('add.file');
Route::get('/get/file', 'Landing\LandingController@getFile')->name('get.bucket');
Route::get('/json/file', 'Landing\LandingController@jsonFile')->name('get.bucket');
Route::get('/json/file/get', 'Landing\LandingController@jsonFileGet')->name('get.bucket');
Route::get('/json/file/get/temp', 'Landing\LandingController@jsonFileGetTemp')->name('get.bucket');

// Removed for coming soon
Route::get('/pending', 'Landing\LandingController@index')->name('index');
Route::get('/about', 'Landing\LandingController@index')->name('about');
Route::get('/contact', 'Landing\LandingController@index')->name('contact');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'Landing\LandingController@welcome')->name('tomulumbi');

Auth::routes();

// Wedding
Route::get('/wedding', 'Landing\LandingController@wedding')->name('wedding');

// Welcome
Route::get('/welcome', 'Landing\LandingController@welcome')->name('welcome');

Route::get('/javascript', 'Landing\LandingController@javascriptNotEnabled')->name('javascript.not.enabled');

Route::get('/test/email', 'Landing\LandingController@testEmail')->name('test.email');


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
Route::get('/personal/album/access/{album_id}', 'Landing\AlbumController@personalAlbumAccess')->name('personal.album.access');
Route::post('/personal/album/access/{album_id}', 'Landing\AlbumController@personalAlbumAccessCheck')->name('personal.album.access.check');
Route::get('/personal/album/show/{album_id}', 'Landing\AlbumController@personalAlbumShow')->name('personal.album.show');

Route::get('/personal/album/download/{album_view_id}', 'Landing\AlbumController@personalAlbumDownload')->name('personal.album.download');
Route::post('/personal/album/download/pin/{album_view_id}', 'Landing\AlbumController@personalAlbumDownloadPin')->name('personal.album.download.pin');


Route::get('/tags', 'Landing\AlbumController@tags')->name('tags');
Route::get('/tag/show/{tag_id}', 'Landing\AlbumController@tagShow')->name('tag.show');


// Design work
Route::get('/designs', 'Landing\DesignController@designs')->name('designs');
Route::get('/design/show/{design_id}', 'Landing\DesignController@designShow')->name('design.show');
Route::get('/design/work/{design_work_id}', 'Landing\DesignController@designWork')->name('design.work');
Route::get('/design/{design_id}/gallery', 'Landing\DesignController@designGallery')->name('design.gallery');


// Journal
Route::get('/journals', 'Landing\JournalController@journals')->name('journals');
Route::get('/journal/show/{journal_id}', 'Landing\JournalController@journalShow')->name('journal.show');
Route::get('/journal/gallery/{journal_id}', 'Landing\JournalController@journalGalleryShow')->name('journal.gallery.show');


// Projects
Route::get('/projects', 'Landing\ProjectController@projects')->name('projects');
Route::get('/project/show/{project_id}', 'Landing\ProjectController@projectShow')->name('project.show');


// Contact
Route::post('/email/store', 'Landing\LandingController@emailStore')->name('email.store');


// Store
Route::get('/store', 'Landing\StoreController@store')->name('store');
Route::get('/store/cart', 'Landing\StoreController@cart')->name('store.cart');
Route::get('/store/checkout', 'Landing\StoreController@checkout')->name('store.checkout');
Route::post('/store/checkout/store', 'Landing\StoreController@checkoutStore')->name('store.checkout.store');
Route::get('/store/products', 'Landing\StoreController@products')->name('store.products');
Route::get('/store/type/{type_id}/products', 'Landing\StoreController@typeProducts')->name('store.type.products');
Route::get('/store/product/show/{product_id}', 'Landing\StoreController@productShow')->name('store.product.show');

Route::post('/add/cart', 'Landing\StoreController@addToCart')->name('add.cart');
Route::post('/update/cart/{item_id}', 'Landing\StoreController@updateCart')->name('update.cart');
Route::get('/subtract/cart/item/quantity/{item_id}', 'Landing\StoreController@subtractCartItemQuantity')->name('subtract.cart.item.quantity');
Route::get('/add/cart/item/quantity/{item_id}', 'Landing\StoreController@addCartItemQuantity')->name('add.cart.item.quantity');
Route::get('/remove/item/{item_id}', 'Landing\StoreController@removeItem')->name('remove.item');
Route::get('/clear/cart', 'Landing\StoreController@clearCart')->name('clear.cart');


// Tudeme
Route::get('/tudeme/about', 'Landing\TudemeController@about')->name('tudeme.about');
Route::get('/tudeme/blog', 'Landing\TudemeController@blog')->name('tudeme.blog');
Route::get('/tudeme/blog/show/{blog_id}', 'Landing\TudemeController@blogShow')->name('tudeme.blog.show');
Route::get('/tudeme/categories/{id}', 'Landing\TudemeController@categories')->name('tudeme.categories');
Route::get('/tudeme/category/{category_type}/{category}', 'Landing\TudemeController@category')->name('tudeme.category');
Route::get('/tudeme/contact', 'Landing\TudemeController@contact')->name('tudeme.contact');
Route::get('/tudeme', 'Landing\TudemeController@index')->name('tudeme');
Route::get('/tudeme/recipe/{recipie_id}', 'Landing\TudemeController@recipe')->name('tudeme.recipe');

Route::get('/tudeme/search', 'Landing\TudemeController@search')->name('tudeme.search');
Route::post('/tudeme/basic/search', 'Landing\TudemeController@basicSearch')->name('tudeme.basic.search');
Route::post('/tudeme/advanced/search', 'Landing\TudemeController@advancedSearch')->name('tudeme.advanced.search');

Route::post('/tudeme/about', 'Landing\TudemeController@about')->name('tudeme.about');


// Projects
Route::get('/letters', 'Landing\LetterController@letters')->name('letters');
Route::get('/letter/show/{letter_id}', 'Landing\LetterController@letterShow')->name('letter.show');
