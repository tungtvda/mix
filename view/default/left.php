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
    $asign['online_support']=returnLanguage('online_support','Monday to Saturday');
    $asign['new_left']=returnLanguage('new_left','News');
    $asign['fanpage_left']=returnLanguage('fanpage_left','News');

    $asign['news_list'] ="";
    if(count($data['news_list'])>0)
    {
        $asign['news_list'] = print_item('news', $data['news_list']);
    }

    $asign['danhmuc_subport'] ="";
    if(count($data['danhmuc_subport'])>0)
    {
        foreach($data['danhmuc_subport'] as $dmtour1) {
            $id_dmtour2 = "danhmuc_id=" . $dmtour1->id;
            $data['subport'] = subport_getByTop('', $id_dmtour2, 'id desc');
            if (count($data['subport']) > 0) {
                $asign['danhmuc_subport'] .= " <div class=\"nicdark_space10\"></div><div class=\"nicdark_focus\">
                <label class=\"lable_subpport\">".returnLanguageField('name', $dmtour1)."</label>

                <div class=\"nicdark_space10\"></div>
                <ul class=\"subpport\">";
                foreach($data['subport'] as $subport) {
                    $asign['danhmuc_subport'] .= "<li>
                        <a href='tel:$subport->phone_format' class=\"mobi_subpport\">
                            <i class=\"icon-mobile\"></i>".$subport->phone."
                        </a>

                    </li>";
                }

                $asign['danhmuc_subport'] .= "</ul>

            </div><div class=\"nicdark_space10\"></div>";
            }
        }
    }
    print_template($asign,'left');
}
