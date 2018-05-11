<?php
date_default_timezone_set('Asia/Kolkata');

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
Route::match(['get', 'post'], '/', 'Website\HomeController@index');
Route::match(['get', 'post'], '/get_search_result', 'Website\AjaxController@get_search_result');
Route::match(['get', 'post'], '/set_dashboard_portlet', 'Website\AjaxController@set_dashboard_portlet');
Route::match(['get', 'post'], '/arrange_dashboard_portlet', 'Website\AjaxController@arrange_dashboard_portlet');
Route::match(['get', 'post'], '/view_df_comment', 'Website\AjaxController@view_df_comment');
Route::match(['get', 'post'], '/feedback', 'Website\HomeController@feedback');
Route::match(['post'], '/send_otp_sms', 'Website\AjaxController@send_otp_sms');
Route::match(['post'], '/active_mobile_no', 'Website\AjaxController@active_mobile_no');
Route::get('/services', function () {
    return view('website.services');
});
Route::get('/officerlogin', function () {
    return view('website.officer-login');
});
/*Route::get('/KPIdashboard', function () {
    return view('website.KPIdashboard');
});*/
Route::get('/KPIdashboard', 'PageController@KPIdashboard')->name('website.KPIdashboard');
Route::get('/socialwall', function () {
    return view('website.socialwall');
});
/*Route::get('/Kpidetails', function () {
    return view('website.KPIdetails');
});*/
/*Route::get('/Kpidetails/{id}', 'PageController@Kpidetails')->name('website.Kpidetails');*/
Route::get('/Kpidetails/{parameter}', 'PageController@Kpidetails')->name('website.Kpidetails');

Route::get('/KPIaddnew', 'PageController@KPIaddnew')->name('website.KPIaddnew');

Route::post('/KPIinsert', 'PageController@KPIinsert')->name('website.KPIinsert');

Route::post('/KPIdatainsert', 'PageController@KPIdatainsert')->name('website.KPIdatainsert');

Route::get('/KPIindex', 'PageController@KPIindex')->name('website.KPIindex');

Route::post('/KPIsearch', 'PageController@KPIsearch')->name('website.KPIsearch');

Route::post('/KPIsearching', 'PageController@KPIsearching')->name('website.KPIsearching');

Route::get('/KPIedit/{id}', 'PageController@KPIedit')->name('website.KPIedit');

Route::post('/KPIupdate/{id}', 'PageController@KPIupdate')->name('website.KPIupdate');


Route::get('/KPIdatamanagement', 'PageController@KPIdatamanagement')->name('website.KPIdatamanagement');

Route::post('/KPIgetparameter', 'PageController@KPIgetparameter')->name('website.KPIgetparameter');

Route::post('/KPIgetparameterDetails', 'PageController@KPIgetparameterDetails')->name('website.KPIgetparameterDetails');

Route::get('/KPIdelete/{id}', 'PageController@KPIdelete')->name('website.KPIdelete');

Route::get('/KPIdatadelete/{id}', 'PageController@KPIdatadelete')->name('website.KPIdatadelete');

Route::get('/KPIdataindex', 'PageController@KPIdataindex')->name('website.KPIdataindex');

Route::get('/KPIdataedit/{id}', 'PageController@KPIdataedit')->name('website.KPIdataedit');

Route::post('/KPIdataupdate/{id}', 'PageController@KPIdataupdate')->name('website.KPIdataupdate');

Route::get('importExport', 'PageController@importExport');
// Route for export/download tabledata to .csv, .xls or .xlsx
Route::get('downloadExcel/{type}', 'PageController@downloadExcel');
// Route for import excel data to database.
Route::post('importExcel', 'PageController@importExcel');

Route::post('saveexcel', 'PageController@saveExcel');

Route::get('/parametermaster', 'PageController@parametermaster')->name('website.parametermaster');

Route::post('/parametermasterinsert', 'PageController@parametermasterinsert')->name('website.parametermasterinsert');

Route::get('/events', function () {
    return view('website.events');
});
/*Route::get('/mycomplaints', function () {
    return view('website.mycomplaints');
});*/

Route::get('/complaintregistration', function () {
    return view('website.complaintregistration');
});

Route::get('/citizenservice', function () {
    return view('website.citizenservice');
});

Route::get('/familycommunity', function () {
    return view('website.family-community');
});
Route::get('/citizengrievance', function () {
    return view('website.citizengrievance');
});

 Route::get('/trackstatus', function () {
        return view('website.trackstatus');
    });
    
  Route::get('/mycomplaints', function () {
        return view('website.mycomplaints');
    });
    
Route::get('/newsdetails', function () {
    return view('website.newsdetails');
});
Route::get('/blogdetails', function () {
    return view('website.blogdetails');
});
Route::get('/circularnotification', function () {
    return view('website.circularnotification');
});
Route::get('/circularnotificationdetails', function () {
    return view('website.circularnotificationdetails');
});

Route::get('/search', function () {
    return view('website.search');
});
Route::get('/error', function () {
    return view('website.errorpage');
});
Route::get('/applicationstatus', function () {
    return view('portal.applicationstatus');
});
 Route::get('/addblog', function () {
     return view('portal.addblog');
 });
 Route::get('/downloadable-resource', function () {
     return view('website.downloadableresource');
 });
 Route::get('/sitemap', function () {
     return view('website.sitemap');
 });
 Route::get('/screen-reader', function () {
     return view('website.screenreader');
 });
 Route::get('/faq', function () {
     return view('website.faq');
 });

Route::get('/contact-us', function () {
    return view('website.contact');
});
Route::get('/officerdashboard', function () {
    return view('portal.officerdashboard');
});

Route::get('/api-analytics-tracker', 'AnalyticController@trackSiteDetails');
Route::get('/chartdashboard/{searchtype?}','AnalyticController@showDashboardSearch');
Route::post('/chartdashboard/date-range','AnalyticController@showDashboardDaterange');
Route::post('/chartdashboard/show-sessionmodal','AnalyticController@showSessionModalGraph');
Route::post('/chartdashboard/show-usermodal','AnalyticController@showUserModalGraph');
Route::post('/chartdashboard/search-keyword-modal','AnalyticController@showSearchKeywordModal');
Route::post('/chartdashboard/content-usage-modal','AnalyticController@showContentUsageModal');
Route::post('/chartdashboard/document-download-modal','AnalyticController@showDocumentDownloadModal');
Route::post('/chartdashboard/document-mobile-modal','AnalyticController@showDocumentMobileModal');
Route::post('/chartdashboard/show-bouncerate-modal','AnalyticController@showBounceRateModal');
Route::post('/chartdashboard/show-newsession-modal','AnalyticController@showNewsessionModal');
Route::post('/chartdashboard/show-desktop-modal','AnalyticController@showDesktopModal');
Route::post('/chartdashboard/show-mobile-modal','AnalyticController@showMobileModal');
Route::post('/chartdashboard/show-pageviewmodal','AnalyticController@showPageviewModalGraph');


Route::get('/blog', 'Website\WebController@blog');
Route::get('/blogdetails/{blogId}', 'Website\WebController@blogdetails');
Route::get('/events', 'Website\WebController@events');
Route::get('/news', 'Website\WebController@news');
Route::get('/career', 'Website\WebController@career');
Route::get('/captcha', 'Website\CaptchaController@index');
Route::match(['get', 'post'], '/officerlogin', 'Website\LoginController@login');
Route::match(['get', 'post'], '/citizenlogin', 'Website\AuthController@login');
Route::match(['get', 'post'], '/forgetpassword', 'Website\ForgetPasswordController@index');
Route::match(['get', 'post'], '/resetpassword/{params}', 'Website\ForgetPasswordController@resetpassword');
Route::match(['get', 'post'], '/otp/{params}', 'Website\ForgetPasswordController@resetbyopt');
Route::match(['get', 'post'], '/logout', 'Website\AuthController@logout');
Route::match(['get', 'post'], '/newregister', 'Website\RegistrationController@register');
Route::match(['get', 'post'], '/activateaccount/{params?}', 'Website\RegistrationController@activateaccount');
Route::match(['get', 'post'], '/applydetails/{careerId}', 'Website\WebController@applycareer');
Route::match(['get', 'post'], '/blogdetails/{blogId}', 'Website\WebController@blogcomment');
Route::match(['get','post'],'/newsdetails/{newsId}', 'Website\WebController@newsdetails');
Route::match(['get', 'post'], '/set-language', 'Website\AjaxController@setLanguage');
Route::match(['get', 'post'], '/get-filtered-events', 'Website\AjaxController@getFilteredEvents');


Route::match(['get', 'post'], '/discussion-forum', 'Website\DiscussionforumController@comment');


Route::group(array('prefix' => 'portal', 'middleware' => 'authuser'), function() {
    /*Route::get('/tourismdashboard', function () {
        return view('portal.tourismdashboard');
    });*/
    Route::match(['get', 'post'], '/getNocCategory', 'Portal\AjaxController@getNocCategory');
    Route::match(['get', 'post'], '/getsucpicious', 'Portal\SucpiciousController@getSucpicious');
    Route::match(['get', 'post'], '/tourismdashboard', 'Portal\PagesController@tourismdashboard');
//Route::group(array('prefix' => 'portal'), function() {
                                    //      Grievance Route  //
    Route::match(['get', 'post'], '/complaint-registration', 'Portal\GrivanceController@complaintregistration');

    Route::match(['get', 'post'], '/opinion', 'Portal\AjaxController@getopinion');

    Route::match(['get', 'post'], '/get-subcategory', 'Portal\AjaxController@getSubCategory');
    
    Route::match(['get', 'post'], '/get-organization', 'Portal\AjaxController@getOrganization');
    
    Route::match(['get', 'post'], '/get-demographicdata', 'Portal\AjaxController@getDemographicData');
    
    Route::match(['get', 'post'], '/get-demographicsecondlabeldata', 'Portal\AjaxController@getDemographicSecondLabelData');
    
   Route::match(['get', 'post'], '/upload-file', 'Portal\AjaxController@uploadComplaintFile');
  
    Route::match(['get', 'post'], '/register-complaint', 'Portal\AjaxController@registerComplaint');

    Route::match(['get', 'post'], '/complaint-list', 'Portal\GrivanceController@complaintList');

    Route::match(['get', 'post'], '/getcomplaintlist', 'Portal\AjaxController@complaintList');

    Route::match(['get', 'post'], '/getmorecomplaintlist', 'Portal\AjaxController@viewMorecomplaintList');

    Route::match(['get', 'post'], '/track-complaints', 'Portal\AjaxController@trackComplaints');
    
    Route::match(['get', 'post'], '/view-complaints', 'Portal\AjaxController@viewComplaints');

    
     
    
    Route::match(['get', 'post'], '/reopen-complaints', 'Portal\AjaxController@repoenComplaint');
    
    Route::match(['get', 'post'], '/view-feedback', 'Portal\AjaxController@viewFeedbackComplaint');
    
    Route::match(['get', 'post'], '/feedback-complaints', 'Portal\AjaxController@feedbackComplaint');
    
   Route::match(['get', 'post'], '/gis-locations', 'Portal\AjaxController@getGisLocations');
   
   Route::match(['get', 'post'], '/gis-ward', 'Portal\AjaxController@getGisWord');
   
   Route::match(['get', 'post'], '/gismap', 'Portal\AjaxController@gismap');
   
   Route::match(['get', 'post'], '/gis-location', 'Portal\AjaxController@getGisLocationslatlongwise');


                                                  //      Grievance Route  //
    Route::match(['get', 'post'], '/industrialform/{formId?}/{action?}', 'Portal\IndustrialController@industrialform');
    Route::match(['get', 'post'], '/healthcenterform/{formId?}/{action?}', 'Portal\HealthController@healthcenterform');
    Route::match(['get', 'post'], '/educationalform/{formId?}/{action?}', 'Portal\EducationalController@educationalform');
    Route::match(['get', 'post'], '/commercialform/{formId?}/{action?}', 'Portal\CommercialController@commercialform');
    Route::match(['get', 'post'], '/editprofile', 'Portal\EditprofileController@editprofile');
    Route::match(['get', 'post'], '/changepassword', 'Portal\EditprofileController@changepassword');

   
     Route::match(['get', 'post'], '/dashboard', 'Portal\PagesController@dashboard');

    Route::get('/viewcommercialform', 'Website\CommercialController@viewcommercial');
    Route::get('/vieweducationform', 'Portal\EducationalController@vieweducation');
    Route::get('/viewhealthform', 'Portal\HealthController@viewhealth');
    Route::get('/viewindustrialunits', 'Portal\IndustrialController@viewindustrialunits');
    Route::get('/services', function() {
        return view('portal.services.serviceslist');
    });
    Route::get('/applyservice', function() {
        return view('portal.services.applyservice');
    });
     
    Route::get('/serviceDesc', function() {
        return view('portal.services.serviceDesc');
    });
    Route::get('/downloads', function() {
        return view('portal.services.downloads');
    });
    Route::get('/applicationDetails', function() {
        return view('portal.services.applicationDetails');
    });
    Route::get('/addmaster', function() {
        return view('portal.master.addmaster');
    });
    Route::get('/viewmaster', function() {
        return view('portal.master.viewmaster');
    });
    Route::match(['get','post'],'/digitallocker', 'Portal\DigitalLockerController@add');
    Route::match(['get','post'],'/send-otp-to-download', 'Portal\AjaxController@sendotptodownload');
    Route::match(['get', 'post'], '/download-document', 'Portal\AjaxController@download_document');

    Route::match(['get', 'post'], '/addblog', 'Portal\AddblogController@addblog');

    Route::match(['get', 'post'], '/nocCategory/{action?}/{categoryId?}', 'Portal\NocCategoryController@Index');

    Route::match(['get', 'post'], '/nocSubCategory/{action?}/{categoryId?}', 'Portal\NocSubCategoryController@Index');
});


Route::group(array('prefix' => 'application', 'middleware' => 'authuserdashboard'), function() {
    Route::get('/officerdashboard', function() {
        return view('application.officerdashboard');
    });
    Route::get('/appsearch', function() {
        return view('application.appsearch');
    });
    Route::get('/analyticsreport', function() {
        return view('application.analyticsreport');
    });
    Route::match(['get', 'post'], '/employeedashboard', 'Application\AdminController@employeedashboard');
    Route::match(['get', 'post'], '/viewAppliedCareer', 'Application\AdminController@viewAppliedCareer');
});


Route::get('/userTimeline', function()
{
  return Twitter::getUserTimeline(['screen_name' => 'csmtechWeb', 'count' => 20, 'format' => 'json']);
});



Route::group(array('prefix' => 'grievance'), function() {

    Route::match(['get', 'post'], '/complaint-registration', 'Grievance\GrivanceController@complaintregistration');

    Route::match(['get', 'post'], '/opinion', 'Grievance\AjaxController@getopinion');

    Route::match(['get', 'post'], '/get-subcategory', 'Grievance\AjaxController@getSubCategory');
    
    Route::match(['get', 'post'], '/get-organization', 'Grievance\AjaxController@getOrganization');
    
    Route::match(['get', 'post'], '/get-demographicdata', 'Grievance\AjaxController@getDemographicData');
    
    Route::match(['get', 'post'], '/get-demographicsecondlabeldata', 'Grievance\AjaxController@getDemographicSecondLabelData');
    
   Route::match(['get', 'post'], '/upload-file', 'Grievance\AjaxController@uploadComplaintFile');
  
    Route::match(['get', 'post'], '/register-complaint', 'Grievance\AjaxController@registerComplaint');

    Route::match(['get', 'post'], '/complaint-list', 'Grievance\GrivanceController@complaintList');

    Route::match(['get', 'post'], '/getcomplaintlist', 'Grievance\AjaxController@complaintList');

    Route::match(['get', 'post'], '/getmorecomplaintlist', 'Grievance\AjaxController@viewMorecomplaintList');

    Route::match(['get', 'post'], '/track-complaints', 'Grievance\AjaxController@trackComplaints');
    
    Route::match(['get', 'post'], '/view-complaints', 'Grievance\AjaxController@viewComplaints');
    
    Route::match(['get', 'post'], '/reopen-complaints', 'Grievance\AjaxController@repoenComplaint');
    
    Route::match(['get', 'post'], '/view-feedback', 'Grievance\AjaxController@viewFeedbackComplaint');
    
    Route::match(['get', 'post'], '/feedback-complaints', 'Grievance\AjaxController@feedbackComplaint');
   
   
   Route::match(['get', 'post'], '/gis-locations', 'Grievance\AjaxController@getGisLocations');
   
   Route::match(['get', 'post'], '/gis-ward', 'Grievance\AjaxController@getGisWord');
   
   Route::match(['get', 'post'], '/gismap', 'Grievance\AjaxController@gismap');
   
   Route::match(['get', 'post'], '/gis-locationbylatlong', 'Grievance\AjaxController@getGisLocationslatlongwise');
   
   Route::match(['get', 'post'], '/uploadFile', 'Grievance\AjaxController@uploadFile');
   
   Route::match(['get', 'post'], '/send-otp', 'Grievance\AjaxController@sendOtp');
   
   Route::match(['get', 'post'], '/check-otp', 'Grievance\AjaxController@CheckOtp');
   
    Route::match(['get', 'post'], '/resend-otp', 'Grievance\AjaxController@ResendOtp');
   Route::match(['get', 'post'], '/feedback-rating', 'Grievance\AjaxController@feedbackRating');
});


Route::get('/grievance/map', function () {
    return view('grievance.map');
});