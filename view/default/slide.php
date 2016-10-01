<?php
/**
 * Created by PhpStorm.
 * User: ductho
 * Date: 8/15/14
 * Time: 3:43 PM
 */
require_once DIR.'/view/default/public.php';
function view_slide($data=array())
{
    $asign=array();
    $asign['slide'] ="";
    if(count($data['slide'])>0)
    {
        $asign['slide'] = print_item('slide', $data['slide']);
    }
    $asign['quick_search']=returnLanguage('quick_search','QUICK SEARCH');
    $asign['advanced']=returnLanguage('advanced','ADVANCED');

    $asign['departure']=returnLanguage('departure','Type Your Departure');
    $asign['destination']=returnLanguage('destination','Type Your Destination');
    $asign['search']=returnLanguage('search','SEARCH');
    $asign['name_tour']=returnLanguage('name_tour','Type Your Tour');

    $asign['vehicle']=returnLanguage('vehicle','Vehicle');
    $asign['hotel']=returnLanguage('hotel','Hotel');

    $asign['all_departure']=returnLanguage('all_departure','ALL Departure');
    $asign['all_destination']=returnLanguage('all_destination','ALL Destinations');
    $asign['all_duration']=returnLanguage('all_duration','ALL Durations');

    $asign['list_departure']=returnSearchDeparture();
    $asign['list_destination']=returnSearchDestination();
    $asign['list_Durations']=returnSearchDurations();
    $asign['list_Vehicle']=returnSearchVehicle();
    print_template($asign,'slide');
}
