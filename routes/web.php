<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*----------- start : get method ----------*/
Route::group(['middleware' => 'prevent-back-history'],function(){
  Auth::routes();
 //Route::get('/home/dashboard', 'MyAdminController@Dashboard');

Route::get('/', 'MyAdminController@index');
Route::get('/home/dashboard', 'MyAdminController@Dashboard');
Route::get('/logout', 'MyAdminController@Logout');
Route::get('/home/check-compny', 'MyAdminController@CheckCompny');
Route::get('/form-mast-depot', 'MasterController@DepotForm');
Route::get('/view-mast-depot', 'MasterController@DepotView');
Route::get('/edit-depot/{id}', 'MasterController@EditDepotForm');

/*----------- start : dealer form ----------*/

Route::get('/form-mast-dealer', 'MasterController@DealerForm');
Route::get('/view-mast-dealer', 'MasterController@DealerView');
Route::get('/edit-dealer/{id}', 'MasterController@EditDealerForm');

/*----------- start : end dealer form ----------*/

/*----------- start : destinaton  form ----------*/

Route::get('/form-mast-destination', 'MasterController@DestinationForm');
Route::get('/view-mast-destination', 'MasterController@DestinationView');
Route::get('/edit-destination/{id}', 'MasterController@EditDestinationForm');


Route::get('/form-mast-transporter', 'MasterController@TransporterForm');
Route::get('/view-mast-transport','MasterController@TransporterView');
Route::get('/edit-transport/{id}','MasterController@EditTransporterForm');


Route::get('/form-mast-fleet', 'MasterController@FleetForm');

Route::get('/view-mast-fleet','MasterController@FleetView');

Route::get('/edit-fleet/{id}','MasterController@EditFleetForm');


Route::get('/form-mast-user', 'MasterController@UserForm');

Route::get('/view-mast-user', 'MasterController@UserView');

Route::get('/edit-user/{id}','MasterController@EditUserForm');


Route::get('/form-mast-fy', 'MasterController@FyForm');

Route::get('/view-mast-fy', 'MasterController@FyView');

Route::get('/edit-fy/{id}','MasterController@EditFyForm');


Route::get('/form-mast-company', 'MasterController@CompanyForm');

Route::get('/view-mast-company', 'MasterController@CompanyView');

Route::get('/edit-company/{id}','MasterController@EditCompanyForm');


Route::get('/form-mast-um', 'MasterController@UmForm');

Route::get('/view-mast-um', 'MasterController@UmView');

Route::get('/edit-um/{id}','MasterController@EditUmForm');


Route::get('/form-mast-item', 'MasterController@ItemForm');

Route::get('/view-mast-item', 'MasterController@ItemView');

Route::get('/edit-item/{id}','MasterController@EditItemForm');


Route::get('/form-mast-itemum', 'MasterController@ItemUmForm');

Route::get('/view-mast-itemum', 'MasterController@ItemUmView');

Route::get('/edit-itemum/{id}','MasterController@EditItemUmForm');


Route::get('/form-mast-rate', 'MasterController@RateForm');

Route::get('/view-mast-rate', 'MasterController@RateView');

Route::get('/edit-rate/{id}', 'MasterController@EditRateForm');

Route::post('userData','MasterController@OutwardSerach');


Route::get('/outward-dispatch','MasterController@OutwardView');





Route::get('/form-mast-account-type', 'MasterController@AccountTypeForm');

Route::get('/view-mast-account-type', 'MasterController@AccountTypeView');

Route::get('/edit-account-type/{id}','MasterController@EditAccountTypeForm');

/*----------- END : destinaton form ----------*/



/*--------- end : get method -------------*/

/*----------- start : post method ----------*/

Route::post('login', 'MyAdminController@login');
Route::post('company-submit', 'MyAdminController@CompanySubmit');
Route::post('form-mast-depot-save', 'MasterController@DepotFormSave');
Route::post('form-mast-depot-update', 'MasterController@DepotFormUpdate');
Route::post('form-mast-dealer-save', 'MasterController@DealerFormSave');
Route::post('form-mast-dealer-update', 'MasterController@DealerFormUpdate');

Route::post('form-mast-destination-save', 'MasterController@DestinationFormSave');

Route::post('form-mast-destination-update', 'MasterController@DestinationFormUpdate');

Route::post('delete-destination', 'MasterController@DeleteDepot');

Route::post('delete-depot', 'MasterController@DeleteDepot');

Route::post('delete-delaer', 'MasterController@DeleteDealer');

Route::post('delete-fleet', 'MasterController@DeleteFleet');

Route::post('delete-transport', 'MasterController@DeleteTransport');

Route::post('delete-user', 'MasterController@DeleteUser');

Route::post('delete-fy', 'MasterController@DeleteFy');

Route::post('delete-company', 'MasterController@DeleteCompany');

Route::post('delete-um', 'MasterController@DeleteUm');

Route::post('delete-item', 'MasterController@DeleteItem');

Route::post('delete-itemum', 'MasterController@DeleteItemUm');

Route::post('delete-acctype', 'MasterController@DeleteAccountType');


Route::post('form-mast-transport-save', 'MasterController@TransportFormSave');

Route::post('form-mast-transport-update', 'MasterController@TransportFormUpdate');


Route::post('form-mast-fleet-save', 'MasterController@FleetFormSave');
Route::post('form-mast-fleet-update', 'MasterController@FleetFormUpdate');


Route::post('form-mast-user-save', 'MasterController@UserFormSave');
Route::post('form-mast-user-update', 'MasterController@UserFormUpdate');


Route::post('form-mast-fy-save', 'MasterController@FyFormSave');
Route::post('form-mast-fy-update', 'MasterController@FyFormUpdate');

Route::post('form-mast-company-save','MasterController@CompanyFormSave');
Route::post('form-mast-company-update','MasterController@CompanyFormUpdate');


Route::post('form-mast-um-save', 'MasterController@UmFormSave');
Route::post('form-mast-um-update', 'MasterController@UmFormUpdate');

Route::post('form-mast-item-save','MasterController@ItemFormSave');
Route::post('form-mast-item-update', 'MasterController@ItemFormUpdate');

Route::post('form-mast-itemum-save','MasterController@ItemUmFormSave');
Route::post('form-mast-itemum-update', 'MasterController@ItemUmFormUpdate');

Route::post('form-mast-rate-save','MasterController@RateFormSave');
Route::post('form-mast-rate-update','MasterController@RateFormUpdate');

Route::post('form-mast-account-type-save','MasterController@AccountTypeFormSave');
Route::post('form-mast-account-type-update','MasterController@AccountTypeFormUpdate');

Route::post('access-control-save','MasterController@accessControl');
Route::get('pdfview','ItemController@pdfview');

Route::get('export', 'MasterController@export');

Route::get('/image', 'ImageController@index');

Route::post('/dropzone/store','ImageController@store')->name('dropzone.store');
Route::post('/dropzone/delete','ImageController@delete')->name('dropzone.delete');


});
/* end : post method */