<?php


// Dashboard
Route::get('/dashboard', 'Admin\DashboardController@dashboard')->name('admin.dashboard');


// Calendar
Route::get('/calendar', 'Admin\CalendarController@viewCalender')->name('admin.calendar');


// Settings
Route::get('/album/types', 'Admin\SettingsController@albumTypes')->name('admin.album.types');
Route::get('/album/type/create', 'Admin\SettingsController@albumTypeCreate')->name('admin.album.type.create');
Route::post('/album/type/store', 'Admin\SettingsController@albumTypeStore')->name('admin.album.type.store');
Route::get('/album/type/show/{album_type_id}', 'Admin\SettingsController@albumTypeShow')->name('admin.album.type.show');
Route::post('/album/type/update/{album_type_id}', 'Admin\SettingsController@albumTypeUpdate')->name('admin.album.type.show.update');
Route::get('/album/type/delete/{album_type_id}', 'Admin\SettingsController@albumTypeDelete')->name('admin.album.type.show.delete');
Route::get('/album/type/restore/{album_type_id}', 'Admin\SettingsController@albumTypeRestore')->name('admin.album.type.show.restore');


// Contact types
Route::get('/contact/types', 'Admin\SettingsController@contactTypes')->name('admin.contact.types');
Route::get('/contact/type/create', 'Admin\SettingsController@contactTypeCreate')->name('admin.contact.type.create');
Route::post('/contact/type/store', 'Admin\SettingsController@contactTypeStore')->name('admin.contact.type.store');
Route::get('/contact/type/show/{contact_type_id}', 'Admin\SettingsController@contactTypeShow')->name('admin.contact.type');
Route::post('/contact/type/update/{contact_type_id}', 'Admin\SettingsController@contactTypeUpdate')->name('admin.contact.type.update');
Route::get('/contact/type/delete/{contact_type_id}', 'Admin\SettingsController@contactTypeDelete')->name('admin.contact.type.delete');
Route::get('/contact/type/restore/{contact_type_id}', 'Admin\SettingsController@contactTypeRestore')->name('admin.contact.type.restore');


// Project types
Route::get('/project/types', 'Admin\SettingsController@projectTypes')->name('admin.project.types');
Route::get('/project/type/create', 'Admin\SettingsController@projectTypeCreate')->name('admin.project.type.create');
Route::post('/project/type/store', 'Admin\SettingsController@projectTypeStore')->name('admin.project.type.store');
Route::get('/project/type/show/{project_type_id}', 'Admin\SettingsController@projectTypeShow')->name('admin.project.type.show');
Route::post('/project/type/update/{project_type_id}', 'Admin\SettingsController@projectTypeUpdate')->name('admin.project.type.update');
Route::get('/project/type/delete/{project_type_id}', 'Admin\SettingsController@projectTypeDelete')->name('admin.project.type.delete');
Route::get('/project/type/restore/{project_type_id}', 'Admin\SettingsController@projectTypeRestore')->name('admin.project.type.restore');


// Tags
Route::get('/tags', 'Admin\SettingsController@tags')->name('admin.tags');
Route::get('/tag/create', 'Admin\SettingsController@tagCreate')->name('admin.tag.create');
Route::get('/tag/show/{tag_id}', 'Admin\SettingsController@tagShow')->name('admin.tag.show');
Route::post('/tag/store', 'Admin\SettingsController@tagStore')->name('admin.tag.store');
Route::post('/tag/update/{tag_id}', 'Admin\SettingsController@tagUpdate')->name('admin.tag.update');
Route::post('/tag/cover/image/{album_id}', 'Admin\SettingsController@tagCoverImageUpload')->name('admin.tag.cover.image');
Route::get('/tag/delete/{tag_id}', 'Admin\SettingsController@tagDelete')->name('admin.tag.delete');
Route::get('/tag/restore/{tag_id}', 'Admin\SettingsController@tagRestore')->name('admin.tag.restore');


// Category
Route::get('/categories', 'Admin\SettingsController@categories')->name('admin.categories');
Route::get('/category/create', 'Admin\SettingsController@categoryCreate')->name('admin.category.create');
Route::get('/category/show/{category_id}', 'Admin\SettingsController@categoryShow')->name('admin.category.show');
Route::post('/category/store', 'Admin\SettingsController@categoryStore')->name('admin.category.store');
Route::post('/category/update/{category_id}', 'Admin\SettingsController@categoryUpdate')->name('admin.category.update');
Route::get('/category/delete/{category_id}', 'Admin\SettingsController@categoryDelete')->name('admin.category.delete');
Route::get('/category/restore/{category_id}', 'Admin\SettingsController@categoryRestore')->name('admin.category.restore');


// typography
Route::get('/typographies', 'Admin\SettingsController@typographies')->name('admin.typographies');
Route::get('/typography/create', 'Admin\SettingsController@typographyCreate')->name('admin.typography.create');
Route::get('/typography/show/{typography_id}', 'Admin\SettingsController@typographyShow')->name('admin.typography.show');
Route::post('/typography/store', 'Admin\SettingsController@typographyStore')->name('admin.typography.store');
Route::post('/typography/update/{typography_id}', 'Admin\SettingsController@typographyUpdate')->name('admin.typography.update');
Route::get('/typography/delete/{typography_id}', 'Admin\SettingsController@typographyDelete')->name('admin.typography.delete');
Route::get('/typography/restore/{typography_id}', 'Admin\SettingsController@typographyRestore')->name('admin.typography.restore');


// types
Route::get('/types', 'Admin\SettingsController@types')->name('admin.types');
Route::get('/type/create', 'Admin\SettingsController@typeCreate')->name('admin.type.create');
Route::get('/type/show/{type_id}', 'Admin\SettingsController@typeShow')->name('admin.type.show');
Route::post('/type/store', 'Admin\SettingsController@typeStore')->name('admin.type.store');
Route::post('/type/update/{type_id}', 'Admin\SettingsController@typeUpdate')->name('admin.type.update');
Route::get('/type/delete/{type_id}', 'Admin\SettingsController@typeDelete')->name('admin.type.delete');
Route::get('/type/restore/{type_id}', 'Admin\SettingsController@typeRestore')->name('admin.type.restore');


// sub types
Route::get('/sub/types', 'Admin\SettingsController@subTypes')->name('admin.sub.types');
Route::get('/sub/type/create', 'Admin\SettingsController@subTypeCreate')->name('admin.sub.type.create');
Route::get('/sub/type/show/{sub_type_id}', 'Admin\SettingsController@subTypeShow')->name('admin.sub.type.show');
Route::post('/sub/type/store', 'Admin\SettingsController@subTypeStore')->name('admin.sub.type.store');
Route::post('/sub/type/update/{sub_type_id}', 'Admin\SettingsController@subTypeUpdate')->name('admin.sub.type.update');
Route::get('/sub/type/delete/{sub_type_id}', 'Admin\SettingsController@subTypeDelete')->name('admin.sub.type.delete');
Route::get('/sub/type/restore/{sub_type_id}', 'Admin\SettingsController@subTypeRestore')->name('admin.sub.type.restore');


// sizes
Route::get('/sizes', 'Admin\SettingsController@sizes')->name('admin.sizes');
Route::get('/size/create', 'Admin\SettingsController@sizeCreate')->name('admin.size.create');
Route::get('/size/show/{size_id}', 'Admin\SettingsController@sizeShow')->name('admin.size.show');
Route::post('/size/store', 'Admin\SettingsController@sizeStore')->name('admin.size.store');
Route::post('/size/update/{size_id}', 'Admin\SettingsController@sizeUpdate')->name('admin.size.update');
Route::get('/size/delete/{size_id}', 'Admin\SettingsController@sizeDelete')->name('admin.size.delete');
Route::get('/size/restore/{size_id}', 'Admin\SettingsController@sizeRestore')->name('admin.size.restore');


// Contacts
Route::get('/contacts', 'Admin\ContactController@contacts')->name('admin.contacts');
Route::get('/contact/create', 'Admin\ContactController@contactCreate')->name('admin.contact.create');
Route::post('/contact/store', 'Admin\ContactController@contactStore')->name('admin.contact.store');
Route::get('/contact/show/{contact_id}', 'Admin\ContactController@contactShow')->name('admin.contact.show');
Route::post('/contact/update/{contact_id}', 'Admin\ContactController@contactUpdate')->name('admin.contact.update');
Route::get('/contact/delete/{contact_id}', 'Admin\ContactController@contactDelete')->name('admin.contact.delete');
Route::get('/contact/restore/{contact_id}', 'Admin\ContactController@contactRestore')->name('admin.contact.restore');


// Emails
Route::get('/emails', 'Admin\EmailController@emails')->name('admin.emails');
Route::get('/email/show/{email_id}', 'Admin\EmailController@emailShow')->name('admin.email.show');
Route::post('/email/update/{email_id}', 'Admin\EmailController@emailUpdate')->name('admin.email.update');


// To Dos
Route::get('/to/dos', 'Admin\ToDoController@toDos')->name('admin.to.dos');
Route::post('/to/do/store', 'Admin\ToDoController@toDoStore')->name('admin.to.do.store');
Route::post('/to/do/update/{todo_id}', 'Admin\ToDoController@toDoUpdate')->name('admin.to.do.update');
Route::get('/to/do/set/in/progress/{todo_id}', 'Admin\ToDoController@toDoSetInProgress')->name('admin.to.do.set.in.progress');
Route::get('/to/do/set/completed/{todo_id}', 'Admin\ToDoController@toDoSetCompleted')->name('admin.to.do.set.completed');
Route::get('/to/do/delete/{todo_id}', 'Admin\ToDoController@toDoDelete')->name('admin.to.do.delete');


// Album
Route::get('/personal/albums', 'Admin\AlbumController@personalAlbums')->name('admin.personal.albums');
Route::get('/personal/album/create', 'Admin\AlbumController@personalAlbumCreate')->name('admin.personal.album.create');
Route::post('/personal/album/store', 'Admin\AlbumController@personalAlbumStore')->name('admin.personal.album.store');
Route::get('/personal/album/show/{album_id}', 'Admin\AlbumController@personalAlbumShow')->name('admin.personal.album.show');
Route::post('/personal/album/update/{album_id}', 'Admin\AlbumController@personalAlbumUpdate')->name('admin.personal.album.update');
Route::get('/personal/album/delete/{album_id}', 'Admin\AlbumController@personalAlbumDelete')->name('admin.personal.album.delete');
Route::get('/personal/album/restore/{album_id}', 'Admin\AlbumController@personalAlbumRestore')->name('admin.personal.album.restore');
Route::post('/personal/album/set/cover/image/{album_id}', 'Admin\AlbumController@personalAlbumCoverImageUpload')->name('admin.personal.album.set.cover.image');
Route::post('/personal/album/set/image/upload/{album_set_id}', 'Admin\AlbumController@personalAlbumSetImageUpload')->name('admin.personal.album.set.image.upload');
Route::post('/personal/album/update/collection/settings/{album_id}', 'Admin\AlbumController@personalAlbumUpdateCollectionSettings')->name('admin.personal.album.update.collection.settings');
Route::post('/personal/album/update/design/{album_id}', 'Admin\AlbumController@personalAlbumUpdateDesign')->name('admin.personal.album.update.design');
Route::post('/personal/album/update/privacy/{album_id}', 'Admin\AlbumController@personalAlbumUpdatePrivacy')->name('admin.personal.album.update.privacy');
Route::post('/personal/album/image/update/print/status/{album_set_id}', 'Admin\AlbumController@personalAlbumImageUpdatePrintStatus')->name('admin.personal.album.image.update.print.status');

Route::get('/personal/album/set/show/{album_set_id}', 'Admin\AlbumController@personalAlbumSetShow')->name('admin.personal.album.set.show');

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

// Album set
Route::post('/client/proof/set/{album_id}/store', 'Admin\AlbumController@clientProofSetStore')->name('admin.client.proof.set.store');
Route::get('/client/proof/set/show/{album_set_id}', 'Admin\AlbumController@clientProofSetShow')->name('admin.client.proof.set.show');
Route::get('/client/proof/set/status/{album_set_id}', 'Admin\AlbumController@clientProofSetStatus')->name('admin.client.proof.set.status');
Route::get('/client/proof/set/download/status/{album_set_id}', 'Admin\AlbumController@clientProofSetDownloadStatus')->name('admin.client.proof.set.download.status');
Route::post('/client/proof/set/image/upload/{album_set_id}', 'Admin\AlbumController@clientProofSetImageUpload')->name('admin.client.proof.set.image.upload');

Route::get('/album/image/delete/{album_image_id}', 'Admin\AlbumController@albumImageDelete')->name('admin.album.image.delete');


// Designs
Route::get('/designs', 'Admin\DesignController@designs')->name('admin.designs');
Route::get('/design/create', 'Admin\DesignController@designCreate')->name('admin.design.create');
Route::post('/design/store', 'Admin\DesignController@designStore')->name('admin.design.store');
Route::get('/design/show/{design_id}', 'Admin\DesignController@designShow')->name('admin.design.show');
Route::post('/design/update/{design_id}', 'Admin\DesignController@designUpdate')->name('admin.design.update');
Route::post('/design/cover/image/{design_id}', 'Admin\DesignController@designCoverImageUpload')->name('admin.design.cover.image');
Route::post('/design/gallery/image/upload/{design_id}', 'Admin\DesignController@designGalleryImageUpload')->name('admin.design.gallery.image.upload');
Route::post('/design/update/design/{design_id}', 'Admin\DesignController@designUpdateDesign')->name('admin.design.update.design');
Route::get('/design/delete/{design_id}', 'Admin\DesignController@designDelete')->name('admin.design.delete');
Route::get('/design/restore/{design_id}', 'Admin\DesignController@designRestore')->name('admin.design.restore');
Route::post('/design/work/store/{design_id}', 'Admin\DesignController@designWorkStore')->name('admin.design.work.store');
Route::post('/design/work/update/{design_id}', 'Admin\DesignController@designWorkUpdate')->name('admin.design.work.update');


// Projects
Route::get('/projects', 'Admin\ProjectController@projects')->name('admin.projects');
Route::get('/project/create', 'Admin\ProjectController@projectCreate')->name('admin.project.create');
Route::post('/project/store', 'Admin\ProjectController@projectStore')->name('admin.project.store');
Route::get('/project/show/{project_id}', 'Admin\ProjectController@projectShow')->name('admin.project.show');
Route::post('/project/update/{project_id}', 'Admin\ProjectController@projectUpdate')->name('admin.project.update');
Route::post('/project/cover/image/{project_id}', 'Admin\ProjectController@projectCoverImageUpload')->name('admin.project.cover.image');
Route::post('/project/gallery/image/upload/{project_id}', 'Admin\ProjectController@projectGalleryImageUpload')->name('admin.project.gallery.image.upload');
Route::post('/project/update/design/{project_id}', 'Admin\ProjectController@projectUpdateDesign')->name('admin.project.update.design');
Route::get('/project/delete/{project_id}', 'Admin\ProjectController@projectDelete')->name('admin.project.delete');
Route::get('/project/restore/{project_id}', 'Admin\ProjectController@projectRestore')->name('admin.project.restore');


// Journals
Route::get('/journals', 'Admin\JournalController@journals')->name('admin.journals');
Route::get('/journal/create', 'Admin\JournalController@journalCreate')->name('admin.journal.create');
Route::post('/journal/store', 'Admin\JournalController@journalStore')->name('admin.journal.store');
Route::get('/journal/show/{journal_id}', 'Admin\JournalController@journalShow')->name('admin.journal.show');
Route::post('/journal/update/{journal_id}', 'Admin\JournalController@journalUpdate')->name('admin.journal.update');
Route::post('/journal/cover/image/{journal_id}', 'Admin\JournalController@journalCoverImageUpload')->name('admin.journal.cover.image');
Route::post('/journal/gallery/image/upload/{journal_id}', 'Admin\JournalController@journalGalleryImageUpload')->name('admin.journal.gallery.image.upload');
Route::post('/journal/update/design/{journal_id}', 'Admin\JournalController@journalUpdateDesign')->name('admin.journal.update.design');
Route::get('/journal/delete/{journal_id}', 'Admin\JournalController@journalDelete')->name('admin.journal.delete');
Route::get('/journal/restore/{journal_id}', 'Admin\JournalController@journalRestore')->name('admin.journal.restore');


// Products
Route::get('/products', 'Admin\ProductController@products')->name('admin.products');
Route::get('/product/create', 'Admin\ProductController@productCreate')->name('admin.product.create');
Route::post('/product/store', 'Admin\ProductController@productStore')->name('admin.product.store');
Route::get('/product/show/{product_id}', 'Admin\ProductController@productShow')->name('admin.product.show');
Route::post('/product/update/{product_id}', 'Admin\ProductController@productUpdate')->name('admin.product.update');
Route::post('/product/cover/image/{product_id}', 'Admin\ProductController@productCoverImageUpload')->name('admin.product.cover.image');
Route::post('/product/cover/second/image/{product_id}', 'Admin\ProductController@productCoverImageUploadSecond')->name('admin.product.cover.image.second');
Route::post('/product/gallery/image/upload/{product_id}', 'Admin\ProductController@productGalleryImageUpload')->name('admin.product.gallery.image.upload');
Route::get('/product/delete/{product_id}', 'Admin\ProductController@productDelete')->name('admin.product.delete');
Route::get('/product/restore/{product_id}', 'Admin\ProductController@productRestore')->name('admin.product.restore');


// price lists
Route::post('/price/list/store/{product_id}', 'Admin\ProductController@priceListStore')->name('admin.price.list.store');
Route::get('/price/list/show/{price_list_id}', 'Admin\ProductController@priceListShow')->name('admin.price.list.show');
Route::post('/price/list/update/{price_list_id}', 'Admin\ProductController@priceListUpdate')->name('admin.price.list.update');
Route::get('/price/list/delete/{price_list_id}', 'Admin\ProductController@priceListDelete')->name('admin.price.list.delete');
Route::get('/price/list/restore/{price_list_id}', 'Admin\ProductController@priceListRestore')->name('admin.price.list.restore');

// store
Route::get('/store', 'Admin\DashboardController@dashboard')->name('admin.store');




