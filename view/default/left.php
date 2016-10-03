<?php
/**
 * Created by PhpStorm.
 * User: ductho
 * Date: 8/15/14
 * Time: 3:43 PM
 */
require_once DIR.'/view/default/public.php';
function view_left($data=array())
{
    $asign=array();
//    $asign['Title']=$data['Title'];
//    $asign['Description']=strip_tags($data['Description']);
//    $asign['Keyword']=strip_tags($data['Keyword']);
//    $asign['icon']=$data['config'][0]->Icon;
//    $asign['link_anh']=SITE_NAME.$data['link_anh'];
    $asign['search']=returnLanguage('search','SEARCH');
    $asign['list_departure']=returnSearchDeparture();
    $asign['list_destination']=returnSearchDestination();
    $asign['list_Durations']=returnSearchDurations();
    $asign['list_Vehicle']=returnSearchVehicle();
    $asign['list_Hotel']=returnSearchHotel();

    $asign['departure']=returnLanguage('departure','Type Your Departure');
    $asign['destination']=returnLanguage('destination','Type Your Destination');
    $asign['search']=returnLanguage('search','SEARCH');
    $asign['name_tour']=returnLanguage('name_tour','Type Your Tour');

    $asign['vehicle']=returnLanguage('vehicle','Vehicle');
    $asign['hotel']=returnLanguage('hotel','Hotel');

    $asign['all_departure']=returnLanguage('all_departure','ALL Departure');
    $asign['all_destination']=returnLanguage('all_destination','ALL Destinations');
    $asign['all_duration']=returnLanguage('all_duration','ALL Durations');
    print_template($asign,'left');
}
