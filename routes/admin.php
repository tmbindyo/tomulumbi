<?php


// Dashboard
Route::get('/dashboard', 'Admin\DashboardController@dashboard')->name('admin.dashboard');


// Calendar
Route::get('/calendar', 'Admin\CalendarController@viewCalender')->name('admin.calendar');


// Action types
Route::get('/action/types', 'Admin\SettingsController@actionTypes')->name('admin.action.types');
Route::get('/action/type/create', 'Admin\SettingsController@actionTypeCreate')->name('admin.action.type.create');
Route::post('/action/type/store', 'Admin\SettingsController@actionTypeStore')->name('admin.action.type.store');
Route::get('/action/type/show/{action_type_id}', 'Admin\SettingsController@actionTypeShow')->name('admin.action.type.show');
Route::post('/action/type/update/{action_type_id}', 'Admin\SettingsController@actionTypeUpdate')->name('admin.action.type.update');
Route::get('/action/type/delete/{action_type_id}', 'Admin\SettingsController@actionTypeDelete')->name('admin.action.type.delete');
Route::get('/action/type/restore/{action_type_id}', 'Admin\SettingsController@actionTypeRestore')->name('admin.action.type.restore');


// Album types
Route::get('/album/types', 'Admin\SettingsController@albumTypes')->name('admin.album.types');
Route::get('/album/type/create', 'Admin\SettingsController@albumTypeCreate')->name('admin.album.type.create');
Route::post('/album/type/store', 'Admin\SettingsController@albumTypeStore')->name('admin.album.type.store');
Route::get('/album/type/show/{album_type_id}', 'Admin\SettingsController@albumTypeShow')->name('admin.album.type.show');
Route::post('/album/type/update/{album_type_id}', 'Admin\SettingsController@albumTypeUpdate')->name('admin.album.type.update');
Route::get('/album/type/delete/{album_type_id}', 'Admin\SettingsController@albumTypeDelete')->name('admin.album.type.delete');
Route::get('/album/type/restore/{album_type_id}', 'Admin\SettingsController@albumTypeRestore')->name('admin.album.type.restore');


// Category
Route::get('/categories', 'Admin\SettingsController@categories')->name('admin.categories');
Route::get('/category/create', 'Admin\SettingsController@categoryCreate')->name('admin.category.create');
Route::get('/category/show/{category_id}', 'Admin\SettingsController@categoryShow')->name('admin.category.show');
Route::post('/category/store', 'Admin\SettingsController@categoryStore')->name('admin.category.store');
Route::post('/category/update/{category_id}', 'Admin\SettingsController@categoryUpdate')->name('admin.category.update');
Route::get('/category/delete/{category_id}', 'Admin\SettingsController@categoryDelete')->name('admin.category.delete');
Route::get('/category/restore/{category_id}', 'Admin\SettingsController@categoryRestore')->name('admin.category.restore');


// Campaign types
Route::get('/campaign/types', 'Admin\SettingsController@campaignTypes')->name('admin.campaign.types');
Route::get('/campaign/type/create', 'Admin\SettingsController@campaignTypeCreate')->name('admin.campaign.type.create');
Route::post('/campaign/type/store', 'Admin\SettingsController@campaignTypeStore')->name('admin.campaign.type.store');
Route::get('/campaign/type/show/{campaign_type_id}', 'Admin\SettingsController@campaignTypeShow')->name('admin.campaign.type.show');
Route::post('/campaign/type/update/{campaign_type_id}', 'Admin\SettingsController@campaignTypeUpdate')->name('admin.campaign.type.update');
Route::get('/campaign/type/delete/{campaign_type_id}', 'Admin\SettingsController@campaignTypeDelete')->name('admin.campaign.type.delete');
Route::get('/campaign/type/restore/{campaign_type_id}', 'Admin\SettingsController@campaignTypeRestore')->name('admin.campaign.type.restore');


// Contact types
Route::get('/contact/types', 'Admin\SettingsController@contactTypes')->name('admin.contact.types');
Route::get('/contact/type/create', 'Admin\SettingsController@contactTypeCreate')->name('admin.contact.type.create');
Route::post('/contact/type/store', 'Admin\SettingsController@contactTypeStore')->name('admin.contact.type.store');
Route::get('/contact/type/show/{contact_type_id}', 'Admin\SettingsController@contactTypeShow')->name('admin.contact.type.show');
Route::post('/contact/type/update/{contact_type_id}', 'Admin\SettingsController@contactTypeUpdate')->name('admin.contact.type.update');
Route::get('/contact/type/delete/{contact_type_id}', 'Admin\SettingsController@contactTypeDelete')->name('admin.contact.type.delete');
Route::get('/contact/type/restore/{contact_type_id}', 'Admin\SettingsController@contactTypeRestore')->name('admin.contact.type.restore');


// Expense accounts
Route::get('/expense/accounts', 'Admin\SettingsController@expenseAccounts')->name('admin.expense.accounts');
Route::get('/expense/account/create', 'Admin\SettingsController@expenseAccountCreate')->name('admin.expense.account.create');
Route::post('/expense/account/store', 'Admin\SettingsController@expenseAccountStore')->name('admin.expense.account.store');
Route::get('/expense/account/show/{contact_type_id}', 'Admin\SettingsController@expenseAccountShow')->name('admin.expense.account.show');
Route::post('/expense/account/update/{contact_type_id}', 'Admin\SettingsController@expenseAccountUpdate')->name('admin.expense.account.update');
Route::get('/expense/account/delete/{contact_type_id}', 'Admin\SettingsController@expenseAccountDelete')->name('admin.expense.account.delete');
Route::get('/expense/account/restore/{contact_type_id}', 'Admin\SettingsController@expenseAccountRestore')->name('admin.expense.account.restore');


// Frequencies
Route::get('/frequencies', 'Admin\SettingsController@frequencies')->name('admin.frequencies');
Route::get('/frequency/create', 'Admin\SettingsController@frequencyCreate')->name('admin.frequency.create');
Route::post('/frequency/store', 'Admin\SettingsController@frequencyStore')->name('admin.frequency.store');
Route::get('/frequency/show/{contact_type_id}', 'Admin\SettingsController@frequencyShow')->name('admin.frequency.show');
Route::post('/frequency/update/{contact_type_id}', 'Admin\SettingsController@frequencyUpdate')->name('admin.frequency.update');
Route::get('/frequency/delete/{contact_type_id}', 'Admin\SettingsController@frequencyDelete')->name('admin.frequency.delete');
Route::get('/frequency/restore/{contact_type_id}', 'Admin\SettingsController@frequencyRestore')->name('admin.frequency.restore');


// labels
Route::get('/labels', 'Admin\SettingsController@labels')->name('admin.labels');
Route::get('/label/create', 'Admin\SettingsController@labelCreate')->name('admin.label.create');
Route::post('/label/store', 'Admin\SettingsController@labelStore')->name('admin.label.store');
Route::get('/label/show/{project_type_id}', 'Admin\SettingsController@labelShow')->name('admin.label.show');
Route::post('/label/update/{project_type_id}', 'Admin\SettingsController@labelUpdate')->name('admin.label.update');
Route::get('/label/delete/{project_type_id}', 'Admin\SettingsController@labelDelete')->name('admin.label.delete');
Route::get('/label/restore/{project_type_id}', 'Admin\SettingsController@labelRestore')->name('admin.label.restore');


// Lead sources
Route::get('/lead/sources', 'Admin\SettingsController@leadSources')->name('admin.lead.sources');
Route::get('/lead/source/create', 'Admin\SettingsController@leadSourceCreate')->name('admin.lead.source.create');
Route::post('/lead/source/store', 'Admin\SettingsController@leadSourceStore')->name('admin.lead.source.store');
Route::get('/lead/source/show/{project_type_id}', 'Admin\SettingsController@leadSourceShow')->name('admin.lead.source.show');
Route::post('/lead/source/update/{project_type_id}', 'Admin\SettingsController@leadSourceUpdate')->name('admin.lead.source.update');
Route::get('/lead/source/delete/{project_type_id}', 'Admin\SettingsController@leadSourceDelete')->name('admin.lead.source.delete');
Route::get('/lead/source/restore/{project_type_id}', 'Admin\SettingsController@leadSourceRestore')->name('admin.lead.source.restore');


// Organization types
Route::get('/organization/types', 'Admin\SettingsController@organizationTypes')->name('admin.organization.types');
Route::get('/organization/type/create', 'Admin\SettingsController@organizationTypeCreate')->name('admin.organization.type.create');
Route::post('/organization/type/store', 'Admin\SettingsController@organizationTypeStore')->name('admin.organization.type.store');
Route::get('/organization/type/show/{organization_type_id}', 'Admin\SettingsController@organizationTypeShow')->name('admin.organization.type.show');
Route::post('/organization/type/update/{organization_type_id}', 'Admin\SettingsController@organizationTypeUpdate')->name('admin.organization.type.update');
Route::get('/organization/type/delete/{organization_type_id}', 'Admin\SettingsController@organizationTypeDelete')->name('admin.organization.type.delete');
Route::get('/organization/type/restore/{organization_type_id}', 'Admin\SettingsController@organizationTypeRestore')->name('admin.organization.type.restore');


// Project types
Route::get('/project/types', 'Admin\SettingsController@projectTypes')->name('admin.project.types');
Route::get('/project/type/create', 'Admin\SettingsController@projectTypeCreate')->name('admin.project.type.create');
Route::post('/project/type/store', 'Admin\SettingsController@projectTypeStore')->name('admin.project.type.store');
Route::get('/project/type/show/{project_type_id}', 'Admin\SettingsController@projectTypeShow')->name('admin.project.type.show');
Route::post('/project/type/update/{project_type_id}', 'Admin\SettingsController@projectTypeUpdate')->name('admin.project.type.update');
Route::get('/project/type/delete/{project_type_id}', 'Admin\SettingsController@projectTypeDelete')->name('admin.project.type.delete');
Route::get('/project/type/restore/{project_type_id}', 'Admin\SettingsController@projectTypeRestore')->name('admin.project.type.restore');


// sizes
Route::get('/sizes', 'Admin\SettingsController@sizes')->name('admin.sizes');
Route::get('/size/create', 'Admin\SettingsController@sizeCreate')->name('admin.size.create');
Route::post('/size/store', 'Admin\SettingsController@sizeStore')->name('admin.size.store');
Route::get('/size/show/{size_id}', 'Admin\SettingsController@sizeShow')->name('admin.size.show');
Route::post('/size/update/{size_id}', 'Admin\SettingsController@sizeUpdate')->name('admin.size.update');
Route::get('/size/delete/{size_id}', 'Admin\SettingsController@sizeDelete')->name('admin.size.delete');
Route::get('/size/restore/{size_id}', 'Admin\SettingsController@sizeRestore')->name('admin.size.restore');


// sub types
Route::get('/sub/types', 'Admin\SettingsController@subTypes')->name('admin.sub.types');
Route::get('/sub/type/create', 'Admin\SettingsController@subTypeCreate')->name('admin.sub.type.create');
Route::post('/sub/type/store', 'Admin\SettingsController@subTypeStore')->name('admin.sub.type.store');
Route::get('/sub/type/show/{sub_type_id}', 'Admin\SettingsController@subTypeShow')->name('admin.sub.type.show');
Route::post('/sub/type/update/{sub_type_id}', 'Admin\SettingsController@subTypeUpdate')->name('admin.sub.type.update');
Route::get('/sub/type/delete/{sub_type_id}', 'Admin\SettingsController@subTypeDelete')->name('admin.sub.type.delete');
Route::get('/sub/type/restore/{sub_type_id}', 'Admin\SettingsController@subTypeRestore')->name('admin.sub.type.restore');


// Tags
Route::get('/tags', 'Admin\SettingsController@tags')->name('admin.tags');
Route::get('/tag/create', 'Admin\SettingsController@tagCreate')->name('admin.tag.create');
Route::post('/tag/store', 'Admin\SettingsController@tagStore')->name('admin.tag.store');
Route::get('/tag/show/{tag_id}', 'Admin\SettingsController@tagShow')->name('admin.tag.show');
Route::post('/tag/update/{tag_id}', 'Admin\SettingsController@tagUpdate')->name('admin.tag.update');
Route::post('/tag/cover/image/{album_id}', 'Admin\SettingsController@tagCoverImageUpload')->name('admin.tag.cover.image');
Route::get('/tag/delete/{tag_id}', 'Admin\SettingsController@tagDelete')->name('admin.tag.delete');
Route::get('/tag/restore/{tag_id}', 'Admin\SettingsController@tagRestore')->name('admin.tag.restore');


// Titles
Route::get('/titles', 'Admin\SettingsController@titles')->name('admin.titles');
Route::get('/title/create', 'Admin\SettingsController@titleCreate')->name('admin.title.create');
Route::post('/title/store', 'Admin\SettingsController@titleStore')->name('admin.title.store');
Route::get('/title/show/{title_id}', 'Admin\SettingsController@titleShow')->name('admin.title.show');
Route::post('/title/update/{title_id}', 'Admin\SettingsController@titleUpdate')->name('admin.title.update');
Route::get('/title/delete/{title_id}', 'Admin\SettingsController@titleDelete')->name('admin.title.delete');
Route::get('/title/restore/{title_id}', 'Admin\SettingsController@titleRestore')->name('admin.title.restore');


// types
Route::get('/types', 'Admin\SettingsController@types')->name('admin.types');
Route::get('/type/create', 'Admin\SettingsController@typeCreate')->name('admin.type.create');
Route::post('/type/store', 'Admin\SettingsController@typeStore')->name('admin.type.store');
Route::get('/type/show/{type_id}', 'Admin\SettingsController@typeShow')->name('admin.type.show');
Route::post('/type/update/{type_id}', 'Admin\SettingsController@typeUpdate')->name('admin.type.update');
Route::get('/type/delete/{type_id}', 'Admin\SettingsController@typeDelete')->name('admin.type.delete');
Route::get('/type/restore/{type_id}', 'Admin\SettingsController@typeRestore')->name('admin.type.restore');


// typography
Route::get('/typographies', 'Admin\SettingsController@typographies')->name('admin.typographies');
Route::get('/typography/create', 'Admin\SettingsController@typographyCreate')->name('admin.typography.create');
Route::post('/typography/store', 'Admin\SettingsController@typographyStore')->name('admin.typography.store');
Route::get('/typography/show/{typography_id}', 'Admin\SettingsController@typographyShow')->name('admin.typography.show');
Route::post('/typography/update/{typography_id}', 'Admin\SettingsController@typographyUpdate')->name('admin.typography.update');
Route::get('/typography/delete/{typography_id}', 'Admin\SettingsController@typographyDelete')->name('admin.typography.delete');
Route::get('/typography/restore/{typography_id}', 'Admin\SettingsController@typographyRestore')->name('admin.typography.restore');



// To Dos
Route::get('/to/dos', 'Admin\ToDoController@toDos')->name('admin.to.dos');
Route::post('/to/do/store', 'Admin\ToDoController@toDoStore')->name('admin.to.do.store');
Route::post('/to/do/update/{todo_id}', 'Admin\ToDoController@toDoUpdate')->name('admin.to.do.update');
Route::get('/to/do/set/in/progress/{todo_id}', 'Admin\ToDoController@toDoSetInProgress')->name('admin.to.do.set.in.progress');
Route::get('/to/do/set/completed/{todo_id}', 'Admin\ToDoController@toDoSetCompleted')->name('admin.to.do.set.completed');
Route::get('/to/do/delete/{todo_id}', 'Admin\ToDoController@toDoDelete')->name('admin.to.do.delete');



/// CRM

// Feed
Route::get('/feed', 'Admin\CRMController@feed')->name('admin.feed');


// Campaign
Route::get('/campaigns', 'Admin\CRMController@campaigns')->name('admin.campaigns');
Route::get('/campaign/create', 'Admin\CRMController@campaignCreate')->name('admin.campaign.create');
Route::post('/campaign/store', 'Admin\CRMController@campaignStore')->name('admin.campaign.store');
Route::get('/campaign/show/{campaign_id}', 'Admin\CRMController@campaignShow')->name('admin.campaign.show');
Route::post('/campaign/update/{campaign_id}', 'Admin\CRMController@campaignUpdate')->name('admin.campaign.update');
Route::get('/campaign/delete/{campaign_id}', 'Admin\CRMController@campaignDelete')->name('admin.campaign.delete');
Route::get('/campaign/restore/{campaign_id}', 'Admin\CRMController@campaignRestore')->name('admin.campaign.restore');

// Campaign uploads
Route::get('/campaign/uploads/{campaign_id}', 'Admin\CRMController@campaignUploads')->name('admin.campaign.uploads');
Route::post('/campaign/upload/store/{campaign_id}', 'Admin\CRMController@campaignUploadStore')->name('admin.campaign.upload.store');
Route::get('/campaign/upload/download/{upload_id}', 'Admin\CRMController@campaignUploadDownload')->name('admin.campaign.upload.download');


// Leads
Route::get('/leads', 'Admin\CRMController@leads')->name('admin.leads');


// Contacts
Route::get('/contacts', 'Admin\CRMController@contacts')->name('admin.contacts');
Route::get('/contact/create', 'Admin\CRMController@contactCreate')->name('admin.contact.create');
Route::post('/contact/store', 'Admin\CRMController@contactStore')->name('admin.contact.store');
Route::get('/contact/show/{contact_id}', 'Admin\CRMController@contactShow')->name('admin.contact.show');
Route::post('/contact/update/{contact_id}', 'Admin\CRMController@contactUpdate')->name('admin.contact.update');
Route::get('/contact/delete/{contact_id}', 'Admin\CRMController@contactDelete')->name('admin.contact.delete');
Route::get('/contact/restore/{contact_id}', 'Admin\CRMController@contactRestore')->name('admin.contact.restore');

Route::get('/contact/update/lead/to/contact/{contact_id}', 'Admin\CRMController@contactUpdateLeadToContact')->name('admin.contact.update.lead.to.contact');
Route::post('/contact/contact/type/store/{contact_id}', 'Admin\CRMController@contactContactTypeStore')->name('admin.contact.contact.type.store');


// organizations
Route::get('/organizations', 'Admin\CRMController@organizations')->name('admin.organizations');
Route::get('/organization/create', 'Admin\CRMController@organizationCreate')->name('admin.organization.create');
Route::post('/organization/store', 'Admin\CRMController@organizationStore')->name('admin.organization.store');
Route::get('/organization/show/{organization_id}', 'Admin\CRMController@organizationShow')->name('admin.organization.show');
Route::post('/organization/update/{organization_id}', 'Admin\CRMController@organizationUpdate')->name('admin.organization.update');
Route::get('/organization/delete/{organization_id}', 'Admin\CRMController@organizationDelete')->name('admin.organization.delete');
Route::get('/organization/restore/{organization_id}', 'Admin\CRMController@organizationRestore')->name('admin.organization.restore');


// Deals
Route::get('/deals', 'Admin\CRMController@deals')->name('admin.deals');
Route::get('/deal/create', 'Admin\CRMController@dealCreate')->name('admin.deal.create');
Route::post('/deal/store', 'Admin\CRMController@dealStore')->name('admin.deal.store');
Route::get('/deal/show/{deal_id}', 'Admin\CRMController@dealShow')->name('admin.deal.show');
Route::post('/deal/update/{deal_id}', 'Admin\CRMController@dealUpdate')->name('admin.deal.update');
Route::get('/deal/delete/{deal_id}', 'Admin\CRMController@dealDelete')->name('admin.deal.delete');
Route::get('/deal/restore/{deal_id}', 'Admin\CRMController@dealRestore')->name('admin.deal.restore');


// Emails
Route::get('/emails', 'Admin\EmailController@emails')->name('admin.emails');
Route::get('/email/show/{email_id}', 'Admin\EmailController@emailShow')->name('admin.email.show');
Route::post('/email/update/{email_id}', 'Admin\EmailController@emailUpdate')->name('admin.email.update');


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
Route::get('/orders', 'Admin\SaleController@orders')->name('admin.orders');
Route::get('/order/create', 'Admin\SaleController@orderCreate')->name('admin.order.create');
Route::post('/order/store', 'Admin\SaleController@orderStore')->name('admin.order.store');
Route::get('/order/show/{order_id}', 'Admin\SaleController@orderShow')->name('admin.order.show');
Route::post('/order/update/status/{order_id}', 'Admin\SaleController@orderUpdateStatus')->name('admin.order.update.status');
Route::post('/order/{order_id}/payment/store', 'Admin\SaleController@orderPaymentStore')->name('admin.order.payment.store');
Route::post('/order/{order_id}/expense/store', 'Admin\SaleController@orderExpenseStore')->name('admin.order.expense.store');

// expenses
Route::get('/expenses', 'Admin\ExpenseController@expenses')->name('admin.expenses');
Route::get('/expense/create', 'Admin\ExpenseController@expenseCreate')->name('admin.expense.create');
Route::post('/expense/store', 'Admin\ExpenseController@expenseStore')->name('admin.expense.store');
Route::get('/expense/show/{expense_id}', 'Admin\ExpenseController@expenseShow')->name('admin.expense.show');
Route::get('/expense/edit/{expense_id}', 'Admin\ExpenseController@expenseEdit')->name('admin.expense.edit');
Route::post('/expense/update/{expense_id}', 'Admin\ExpenseController@expenseUpdate')->name('admin.expense.update');
Route::get('/expense/delete/{expense_id}', 'Admin\ExpenseController@expenseDelete')->name('admin.expense.delete');
Route::get('/expense/restore/{expense_id}', 'Admin\ExpenseController@expenseRestore')->name('admin.expense.restore');
Route::get('/expense/product/delete/{expense_id}', 'Admin\ExpenseController@expenseProductDelete')->name('admin.expense.product.delete');
Route::get('/expense/product/restore/{expense_id}', 'Admin\ExpenseController@expenseProductRestore')->name('admin.expense.product.restore');


// transactions
Route::get('/transactions', 'Admin\ExpenseController@transactions')->name('admin.transactions');
Route::get('/transaction/create/{expense_id}', 'Admin\ExpenseController@transactionCreate')->name('admin.transaction.create');
Route::post('/transaction/store', 'Admin\ExpenseController@transactionStore')->name('admin.transaction.store');
Route::get('/account/withdrawal/{account_id}', 'Admin\ExpenseController@accountWithdrawal')->name('admin.account.withdrawal');
Route::get('/account/deposit/{account_id}', 'Admin\ExpenseController@accountDeposit')->name('admin.account.deposit');
Route::get('/transaction/edit/{transaction_id}', 'Admin\ExpenseController@transactionEdit')->name('admin.transaction.edit');
Route::post('/transaction/update/{transaction_id}', 'Admin\ExpenseController@transactionUpdate')->name('admin.transaction.update');
Route::get('/transaction/billed/{transaction_id}', 'Admin\ExpenseController@transactionBilled')->name('admin.transaction.billed');
Route::get('/transaction/pending/payment/{transaction_id}', 'Admin\ExpenseController@transactionPendingPayment')->name('admin.transaction.pending.payment');
Route::get('/transaction/delete/{transaction_id}', 'Admin\ExpenseController@transactionDelete')->name('admin.transaction.delete');
Route::get('/transaction/restore/{transaction_id}', 'Admin\ExpenseController@transactionRestore')->name('admin.transaction.restore');


// accounts
Route::get('/accounts', 'Admin\AccountController@accounts')->name('admin.accounts');
Route::get('/account/create', 'Admin\AccountController@accountCreate')->name('admin.account.create');
Route::post('/account/store', 'Admin\AccountController@accountStore')->name('admin.account.store');
Route::get('/account/show/{account_id}', 'Admin\AccountController@accountShow')->name('admin.account.show');
Route::get('/account/edit/{account_id}', 'Admin\AccountController@accountEdit')->name('admin.account.edit');
Route::post('/account/update/{account_id}', 'Admin\AccountController@accountUpdate')->name('admin.account.update');
Route::get('/account/delete/{account_id}', 'Admin\AccountController@accountDelete')->name('admin.account.delete');
Route::get('/account/restore/{account_id}', 'Admin\AccountController@accountRestore')->name('admin.account.restore');

// account adjustment
Route::get('/account/adjustment/create/{account_id}', 'Admin\AccountController@accountAdjustmentCreate')->name('admin.account.adjustment.create');
Route::get('/account/adjustment/create/{account_id}', 'Admin\AccountController@accountAdjustmentCreate')->name('admin.account.adjustment.create');
Route::post('/account/adjustment/store', 'Admin\AccountController@accountAdjustmentStore')->name('admin.account.adjustment.store');
Route::get('/account/adjustment/edit/{account_id}', 'Admin\AccountController@accountAdjustmentEdit')->name('admin.account.adjustment.edit');
Route::post('/account/adjustment/update/{account_id}', 'Admin\AccountController@accountAdjustmentUpdate')->name('admin.account.adjustment.update');
Route::get('/account/adjustment/delete/{account_id}', 'Admin\AccountController@accountAdjustmentDelete')->name('admin.account.adjustment.delete');
Route::get('/account/adjustment/restore/{account_id}', 'Admin\AccountController@accountAdjustmentRestore')->name('admin.account.adjustment.restore');

Route::get('/account/recurring/test', 'Admin\ExpenseController@testRecurring')->name('admin.account.recurring.test');



