<?php

// Client proof routes

Route::get('/proofs', 'ClientProof\AlbumController@albums')->name('client.proofs');
Route::get('/proof/{album_id}', 'ClientProof\AlbumController@albumProof')->name('client.proof');

