<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Page';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'Page/login';
$route['facilities'] = 'Page/facilities';
$route['gallery'] = 'Page/gallery';
$route['events'] = 'Page/events';
$route['wp'] = 'Page/index';

/**
 * ------------------------------------------------
 * ADMIN ROUTES
 * ------------------------------------------------
 **/
$route['admin-details']          = 'Page/admin_details';
$route['admin-gallery']          = 'Page/admin_gallery';
$route['admin-newsletter']       = 'Page/admin_newsletter';
$route['admin-events']           = 'Page/admin_events';
$route['admin-events-attendance']           = 'Page/admin_events_attendacnce';
$route['select-events-section']  = 'EventController/get_section';

$route['insert-details']['POST']        = 'AboutController/insert_details';
$route['delete-details']['POST']        = 'AboutController/delete_details';
$route['update-mission']['POST']        = 'AboutController/update_mission';
$route['update-vision']['POST']         = 'AboutController/update_vision';
$route['update-goals']['POST']          = 'AboutController/update_goals';
$route['update-faqs']['POST']           = 'AboutController/update_faqs';
$route['login-submit']['POST']          = 'LoginController/login_submit';
$route['sign-out']['GET']               = 'LoginController/sign_out';
$route['insert-event']['POST']          = 'EventController/insert_event';
$route['delete-event']['POST']          = 'EventController/delete_event';
$route['update-event']['POST']          = 'EventController/update_event';
$route['insert-facilities']['POST']     = 'FacilitiesController/insert_facilities';
$route['delete-facilities']['POST']     = 'FacilitiesController/delete_facilities';
$route['update-facilities']['POST']     = 'FacilitiesController/update_facilities';
$route['insert-gallery-photo']['POST']  = 'GalleryController/insert_gallery_photo';
$route['delete-gallery-photo']['POST']  = 'GalleryController/delete_gallery_photo';
$route['delete-gallery-video']['POST']  = 'GalleryController/delete_gallery_video';
$route['update-facilities-pic']['POST'] = 'FacilitiesController/update_facilities_pic';
$route['update-events-pic']['POST']     = 'EventController/update_events_pic';
$route['delete-newsletter']['POST']     = 'NewsletterController/delete_newsletter';
$route['insert-about']['POST']          = 'AboutController/insert_about';
$route['update-about']['POST']          = 'AboutController/update_about';
$route['insert-gallery-songs']['POST']  = 'GalleryController/insert_gallery_songs';
$route['insert-gallery-video']['POST']  = 'GalleryController/insert_gallery_video';
$route['delete-gallery-songs']['POST']  = 'GalleryController/delete_gallery_songs';
$route['insert-event-attendance']['POST']  = 'EventController/insert_event_attendance';


/**
 * ---------------------------------------------------
 * WEBSITE DETAILS
 * ---------------------------------------------------
 */
  $route['get-details']            = 'WebsiteDetailsController/get_details';
  $route['get-facilities-details'] = 'WebsiteDetailsController/get_facilities_details';
  $route['get-events']             = 'WebsiteDetailsController/get_events_details';
  $route['get-gallery']['GET']     = 'GalleryController/get_gallery';
  $route['sendmail']['GET']        = 'NewsletterController/send_phpmailer';
  $route['get-newsletter']['GET']  = 'NewsletterController/get_newsletter';
  $route['get-event-attendance']['GET']  = 'EventAttendanceController/get_event_attendance';
  






