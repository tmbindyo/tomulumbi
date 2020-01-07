<?php



// Removed for coming soon
Route::get('/pending', 'Landing\LandingController@index')->name('index');
Route::get('/about', 'Landing\LandingController@index')->name('about');
Route::get('/contact', 'Landing\LandingController@index')->name('contact');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'Landing\LandingController@welcome')->name('tomulumbi');

Auth::routes();

// Welcome
Route::get('/welcome', 'Landing\LandingController@welcome')->name('welcome');
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


// Journal
Route::get('/journals', 'Landing\JournalController@journals')->name('journals');
Route::get('/journal/show/{journal_id}', 'Landing\JournalController@journalShow')->name('journal.show');
Route::get('/journal/gallery/{journal_id}', 'Landing\JournalController@journalGalleryShow')->name('journal.gallery.show');


// Projects
Route::get('/projects', 'Landing\ProjectController@projects')->name('projects');
Route::get('/project/show/{project_id}', 'Landing\ProjectController@projectShow')->name('project.show');
