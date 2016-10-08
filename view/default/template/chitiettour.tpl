<section class="nicdark_section">

    <!--start nicdark_container-->
    <div class="nicdark_container nicdark_clearfix">

        <!--start content-->
        <div class="grid grid_9 percentage nicdark_width100_responsive">

            <div class="nicdark_focus nicdark_padding10 nicdark_sizing">

                <div class="nicdark_focus nicdark_padding10 nicdark_sizing nicdark_bg_greydark">

                    <!--sort-->
                    <div class="nicdark_activity nicdark_width100_iphonepotr nicdark_width100_iphoneland">
                        <h1 style="color:#ffffff;text-transform: uppercase; padding-top: 3px !important;padding-bottom: 4px !important;font-weight: normal;"
                            class="white left nicdark_btn  small nicdark_padding1020">{name_dm}</h1>
                    </div>


                </div>
                <div class="nicdark_space10"></div>
                <div itemscope="" itemtype="http://schema.org/Product" id="product-1379"
                     class="post-1379 product type-product status-publish has-post-thumbnail product_cat-promotions sale shipping-taxable purchasable product-type-simple product-cat-promotions instock">

                    <div class="images">
                        <a itemprop="image" class="woocommerce-main-image zoom" title="{name_dm}"
                           data-rel="prettyPhoto[product-gallery]">
                            <img src="{img}"
                                 class="attachment-shop_single wp-post-image"
                                 alt="{name_dm}"
                                 title="{name_dm}">
                        </a>
                    </div>

                    <div class="summary entry-summary">

                        <!--<h1 itemprop="name" class="product_title entry-title">Bora Bora</h1>-->

                        <div class="woocommerce-product-rating" itemprop="aggregateRating" itemscope=""
                             itemtype="http://schema.org/AggregateRating">
                            <div class="star-rating" title="Rated 3.67 out of 5">
			<span style="width:73.4%"><strong itemprop="ratingValue" class="rating">3.67</strong> out of <span
                        itemprop="bestRating">5</span>				based on <span
                        itemprop="ratingCount" class="rating">3</span> customer ratings			</span>
                            </div>
                        </div>

                        <div itemprop="offers" class="detail_font">

                            <p class="price">
                                <i class="icon-dollar"></i> {price_lang}:
                                <ins><span class="amount">{currency_lang}{price}</span></ins>
                            </p>
                            <p class="price">
                                <i class="icon-calendar"></i> {durations_lang}:
                                <ins><span class="parameter">{durations}</span></ins>
                            </p>
                            <!--<p class="price">
                                <i class="icon-logout"></i> {departure_lang}: <ins><span class="parameter">{departure}</span></ins>
                            </p>-->
                            <p class="price">
                                <i class="icon-login"></i> {destination_lang}:
                                <ins><span class="parameter">{destination}</span></ins>
                            </p>
                            <p class="price">
                                <i class="icon-home"></i> {hotel_lang}:
                                <ins>{hotel}</ins>
                            </p>
                            <p class="price" style="margin-bottom: 10px">
                                <i class="icon-plane"></i> {vehicle_lang}:
                                <ins><span class="parameter">{vehicle}</span></ins>
                            </p>

                        </div>
                        <div itemprop="description">
                            <p>

                            </p>
                        </div>

                        <div itemprop="description">
                            <div class="booking_detail_div grid grid_2">
                                <a href="#booking" class="booking_detail">{booking_lang}</a>
                            </div>
                            <div class="social_div grid grid_10">
                                <!--<div class="addthis_toolbox addthis_default_style "><a
                                            class="addthis_button_facebook_like"
                                            fb:like:layout="button_count"></a> <a
                                            class="addthis_button_tweet"></a> <a class="addthis_button_pinterest_pinit"
                                                                                 pi:pinit:layout="horizontal"></a> <a
                                            class="addthis_counter addthis_pill_style"></a></div>
                                <script type="text/javascript"
                                        src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-5254127c1833f872"></script>-->
                            </div>


                        </div>

                    </div><!-- .summary -->


                    <div class="woocommerce-tabs">
                        <div class="wpb_wrapper">
                            <h3 class=" title left lienquan">{summary_lang}</h3>
                            <div class="wpb_gmaps_widget wpb_content_element map_ready content_detail">
                                <div class="wpb_wrapper">
                                    <div class="wpb_map_wraper">
                                        {summary}
                                    </div>
                                </div>
                            </div>

                            <h3 class=" title left lienquan">{highlights_lang}</h3>
                            <div class="wpb_gmaps_widget wpb_content_element map_ready content_detail">
                                <div class="wpb_wrapper">
                                    <div class="wpb_map_wraper">
                                        {highlights}
                                    </div>
                                </div>
                            </div>
                            <div class="vc_empty_space" style="height: 10px"><span class="vc_empty_space_inner"></span>
                            </div>

                            <div style="width: 100%" class="wpb_tabs wpb_content_element  nicdark_tab_padding0"
                                 data-interval="0">
                                <div id="booking" class=" vc_col-sm-4" style="padding: 0px !important;">
                                    <h3 class=" title left lienquan" style="margin-top: 6px">{booking_form}</h3>
                                    <div class="wpb_gmaps_widget wpb_content_element map_ready content_detail">
                                        <div class="wpb_wrapper">

                                            <link rel="stylesheet" type="text/css" href="{SITE-NAME}/view/default/themes/calendar/src/css/pignose.calender.css" />
                                            <script src="{SITE-NAME}/view/default/themes/calendar/dist/jquery-1.12.4.min.js"></script>
                                            <script src="{SITE-NAME}/view/default/themes/calendar/dist/moment.min.js"></script>
                                            <script type="text/javascript" src="{SITE-NAME}/view/default/themes/calendar/src/js/pignose.calender.js"></script>
                                            <script type="text/javascript">
                                                //<![CDATA[
                                                $(function() {
                                                    $('.calender').pignoseCalender({
                                                        select: function(date, obj) {
                                                            date_check=(date[0] === null? '':date[0].format('YYYY-MM-DD'));
                                                            date_now="{date_now}";
                                                            if(date_check<date_now){
                                                                alert('{check_param_date}');
                                                            }
                                                            else{
                                                                $('#date_input').val(date_check);
                                                                $("#date_table").text(date_check);
                                                            }

                                                        }
                                                    });
                                                    jQuery("#next_booking").click(function(){
                                                        date_now="{date_now}";
                                                        price_children=jQuery('#date_input').val();
                                                        if(price_children==''){
                                                            alert('{check_date}');
                                                        }
                                                        else{
                                                            if(price_children<date_now){
                                                                alert('{check_param_date}');
                                                            }
                                                            else{
                                                                jQuery('.back_detail').hide();
                                                                jQuery('.back_detail_cal').hide();
                                                                jQuery('.next_detail').slideDown();
                                                            }
                                                        }



                                                    });
                                                    jQuery("#back_booking").click(function(){

                                                        jQuery('.next_detail').hide();
                                                        jQuery('.back_detail_cal').slideDown();
                                                        jQuery('.back_detail').slideDown();
                                                    });
                                                    jQuery("#booking_ajax").click(function(){
                                                        id=$('#id_input').val();
                                                        name_url=$('#name_url_input').val();
                                                        date=$('#date_input').val();
                                                        price=$('#price').val();
                                                        price_children=$('#price_children').val();
                                                        price_children_5=$('#price_children_5').val();
                                                        number_adults=$('#price_adults').val();
                                                        number_children=$('#price_children_val').val();
                                                        number_children_5=$('#price_children_5_val').val();
                                                        total_input=$('#total_input').val();

                                                        alert(total_input)
                                                    });


                                                });
                                                function myFunction() {
                                                    price=jQuery('#price').val();
                                                    price_children=jQuery('#price_children').val();
                                                    price_children_5=jQuery('#price_children_5').val();
                                                    price_adults=jQuery('#price_adults').val();

                                                    price_children_val=jQuery('#price_children_val').val();
                                                    price_children_5_val=jQuery('#price_children_5_val').val();

                                                    if(price_children==''){
                                                        price_children=0;
                                                    }
                                                    if(price_children_5==''){
                                                        price_children_5=0;
                                                    }
                                                    if(price==''){
                                                        total="Contact"
                                                        $("#total_fee").text(total);
                                                        $('#total_input').val(total);
                                                    }
                                                    else{
                                                        if(price_adults<1||price_adults==""){
                                                            price_adults=1;
                                                            jQuery('#price_adults').val('1');
                                                        }
                                                        if(price_children_val<1||price_children_val==""){
                                                            price_children_val=0;
                                                        }
                                                        if(price_children_5_val<1||price_children_5_val==""){
                                                            price_children_5_val=0;
                                                        }
                                                        total_adults=price_adults*price;
                                                        total_children=((price_children*100)/price)*price_children_val;
                                                        total_children_5=((price_children_5*100)/price)*price_children_5_val;
                                                        total=total_adults+(total_children*1)+(total_children_5*1);
                                                        var n = parseFloat(total);
                                                        total = Math.round(n * 1000)/1000;
                                                        total=total+" {currency_lang}";
                                                        $("#amount_total").text(total);
                                                        $("#no_adults").text(price_adults);
                                                        $("#no_children").text(price_children_val);
                                                        $("#no_children_5").text(price_children_5_val);
                                                        $("#total_fee").text(total);
                                                        $('#total_input').val(total);
                                                        $("#hidden_total").show();
                                                        $("#next_booking").show();
                                                    }

                                                }
                                                //]]>
                                            </script>
                                            <div class="wpb_map_wraper">

                                                <div class="back_detail_cal">
                                                    <div class="calender"></div>
                                                    <input  id="date_input" hidden value="{date_now}">
                                                    <input  id="id_input" hidden value="{id}">
                                                    <input  id="name_url_input" hidden value="{name_url}">
                                                </div>

                                                <div class="booking_left">
                                                    <div class="back_detail">

                                                    <input id="price" value="{price}" hidden>
                                                    <input id="price_children" value="{price_children_5_10}" hidden>
                                                    <input id="price_children_5" value="{price_children_under_5}" hidden>

                                                    <p>{no_of_adults}</p>
                                                    <input class="nicdark_bg_greydark2 nicdark_border_none grey medium subtitle" onkeyup="myFunction()" onchange="myFunction()" min="1" type="number" id="price_adults"  placeholder="No. of Adults " id="price_adults" value="">
                                                    <p>{no_of_children}</p>
                                                    <input class="nicdark_bg_greydark2 nicdark_border_none grey medium subtitle" onkeyup="myFunction()" onchange="myFunction()"  min="0" type="number" id="price_children_val"  placeholder="No. of Children (5-10 years old)"  value="">
                                                    <p> {no_of_children_5}</p>
                                                    <input class="nicdark_bg_greydark2 nicdark_border_none grey medium subtitle" onkeyup="myFunction()" onchange="myFunction()" min="0" type="number" id="price_children_5_val"  placeholder="No. of Children (under 5 years old)"  value="">
                                                    <input hidden class="nicdark_bg_greydark2 nicdark_border_none grey medium subtitle" id="total_input"   >


                                                    <p style="margin-bottom: 10px; display: none" id="hidden_total">{total}: <span class="amount" id="amount_total"></span></p>
                                                    <a style="width: 40%; display: none" href="javascript:void(0);"  id="next_booking" class="nicdark_btn nicdark_btn_filter fullwidth nicdark_bg_green calculate_bt"><i class="el el-arrow-right"></i> {next}</a>
                                                    </div>
                                                    <div class="next_detail" style="display: none">
                                                    <table class="nicdark_table extrabig nicdark_bg_yellow">

                                                        <tbody class="nicdark_bg_grey nicdark_border_grey table_booking" style="background-color: #f9f9f9 !important; border: none">
                                                        <tr>
                                                            <td>
                                                               {you_chosen_date}:
                                                            </td>
                                                            <td>
                                                                <span id="date_table">{date_now}</span>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                {no_adults}:
                                                            </td>
                                                            <td>
                                                               <span id="no_adults">0</span>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                {no_children}
                                                            </td>
                                                            <td>
                                                                <span id="no_children">N/A</span>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                {no_children_5}
                                                            </td>
                                                            <td>
                                                                <span id="no_children_5">N/A</span>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                {total_fee}:
                                                            </td>
                                                            <td>
                                                                <span id="total_fee"></span>
                                                            </td>

                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <h3 class=" title left lienquan"></h3>
                                                    <input class="nicdark_bg_greydark2 nicdark_border_none grey medium subtitle"  type="text"   placeholder="{full_name}" name="name">
                                                    <input class="nicdark_bg_greydark2 nicdark_border_none grey medium subtitle"  type="email"   placeholder="{email}" name="email">
                                                    <input class="nicdark_bg_greydark2 nicdark_border_none grey medium subtitle"  type="text"   placeholder="{phone}" name="phone">
                                                        <textarea style="height:90px"  placeholder="{request}..." class="nicdark_bg_greydark2 nicdark_border_none grey medium subtitle">

                                                        </textarea>

                                                    <a style="width: 40%;  background-color: #ed1c27" id="back_booking" href="javascript:void(0);" class="nicdark_btn nicdark_btn_filter fullwidth nicdark_bg_green calculate_bt"><i class="el el-arrow-left"></i> {back}</a>
                                                        <a style="width: 40%; float: right;" id="booking_ajax"  href="javascript:void(0);" class="nicdark_btn nicdark_btn_filter fullwidth nicdark_bg_green calculate_bt"><i class="el el-shopping-cart-sign"></i> {booking_lang}</a>
                                                    </div>
                                                </div>
                                            </div>





                                        </div>
                                    </div>
                                </div>
                                <div class=" vc_col-sm-8">
                                    <div class="wpb_wrapper wpb_tour_tabs_wrapper ui-tabs vc_clearfix ui-widget ui-widget-content ui-corner-all">
                                        <ul class="wpb_tabs_nav ui-tabs-nav vc_clearfix ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all"
                                            role="tablist">
                                            <!--<li class="nicdark_width100_iphonepotr  ui-state-default ui-corner-top ui-state-hover ui-tabs-active ui-state-active"
                                            role="tab" tabindex="-1" aria-controls="tab-ffb99a93-1122-0c4fe-3a9f"
                                            aria-labelledby="ui-id-3" aria-selected="true" aria-expanded="true"><a
                                                    class="title white nicdark_bg_blue  ui-tabs-anchor tab_detail"
                                                    href="#tab-ffb99a93-1122-0c4fe-3a9f" role="presentation"
                                                    tabindex="-1" id="ui-id-3"><i class=""></i>{description_lang}</a></li>-->
                                            <li class="nicdark_width100_iphonepotr  ui-state-default ui-corner-top "
                                                role="tab" tabindex="0" aria-controls="tab-f73e40db-041f-3c4fe-3a9f"
                                                aria-labelledby="ui-id-1" aria-selected="true" aria-expanded="true"><a
                                                        class="title white nicdark_bg_blue  ui-tabs-anchor tab_detail"
                                                        href="#tab-f73e40db-041f-3c4fe-3a9f" role="presentation"
                                                        tabindex="-1" id="ui-id-1"><i class=""></i>{schedule_lang}</a>
                                            </li>
                                            <!--<li class="nicdark_width100_iphonepotr  ui-state-default ui-corner-top ui-state-hover"
                                            role="tab" tabindex="-1" aria-controls="tab-ffb99a93-e384-0c4fe-3a9f"
                                            aria-labelledby="ui-id-2" aria-selected="false" aria-expanded="false"><a
                                                    class="title white nicdark_bg_blue  ui-tabs-anchor tab_detail"
                                                    href="#tab-ffb99a93-e384-0c4fe-3a9f" role="presentation"
                                                    tabindex="-1" id="ui-id-2"><i class=""></i>{price_list_lang}</a></li>-->

                                            <li class="nicdark_width100_iphonepotr  ui-state-default ui-corner-top ui-state-hover"
                                                role="tab" tabindex="-1" aria-controls="tab-ffb99a93-e38x-0c4fe-3a9f"
                                                aria-labelledby="ui-id-6" aria-selected="false" aria-expanded="false"><a
                                                        class="title white nicdark_bg_blue  ui-tabs-anchor tab_detail"
                                                        href="#tab-ffb99a93-e38x-0c4fe-3a9f" role="presentation"
                                                        tabindex="-1" id="ui-id-6"><i class=""></i>{inclusion_lang}</a>
                                            </li>
                                            <li class="nicdark_width100_iphonepotr  ui-state-default ui-corner-top ui-state-hover"
                                                role="tab" tabindex="-1" aria-controls="tab-ffb99a93-e38y-0c4fe-3a9f"
                                                aria-labelledby="ui-id-7" aria-selected="false" aria-expanded="false"><a
                                                        class="title white nicdark_bg_blue  ui-tabs-anchor tab_detail"
                                                        href="#tab-ffb99a93-e38y-0c4fe-3a9f" role="presentation"
                                                        tabindex="-1" id="ui-id-7"><i class=""></i>{exclusion_lang}</a>
                                            </li>

                                            <!--<li class="nicdark_width100_iphonepotr  ui-state-default ui-corner-top ui-state-hover"
                                            role="tab" tabindex="-1" aria-controls="tab-ffb99a93-1123-0c4fe-3a9f"
                                            aria-labelledby="ui-id-4" aria-selected="false" aria-expanded="false"><a
                                                    class="title white nicdark_bg_blue  ui-tabs-anchor tab_detail"
                                                    href="#tab-ffb99a93-1123-0c4fe-3a9f" role="presentation"
                                                    tabindex="-1" id="ui-id-4"><i class=""></i>{gallery_lang}</a></li>-->
                                            <li class="nicdark_width100_iphonepotr  ui-state-default ui-corner-top ui-state-hover"
                                                role="tab" tabindex="-1" aria-controls="tab-ffb99a93-1124-0c4fe-3a9f"
                                                aria-labelledby="ui-id-5" aria-selected="false" aria-expanded="false"><a
                                                        class="title white nicdark_bg_blue  ui-tabs-anchor tab_detail"
                                                        href="#tab-ffb99a93-1124-0c4fe-3a9f" role="presentation"
                                                        tabindex="-1" id="ui-id-5"><i class=""></i>{comment_lang}</a>
                                            </li>
                                        </ul>

                                        <!--<div id="tab-ffb99a93-1122-0c4fe-3a9f"
                                         class="wpb_tab  nicdark_bg_grey nicdark_border_grey ui-tabs-panel wpb_ui-tabs-hide vc_clearfix ui-widget-content ui-corner-bottom"
                                         aria-labelledby="ui-id-3" role="tabpanel" aria-hidden="false"
                                         style="display: none;">
                                        <div class="wpb_gmaps_widget wpb_content_element map_ready content_detail">
                                            <div class="wpb_wrapper">
                                                <div class="wpb_map_wraper">
                                                    {content}
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->
                                        <div id="tab-f73e40db-041f-3c4fe-3a9f"
                                             class="wpb_tab  nicdark_bg_grey nicdark_border_grey ui-tabs-panel wpb_ui-tabs-hide vc_clearfix ui-widget-content ui-corner-bottom"
                                             aria-labelledby="ui-id-1" role="tabpanel" aria-hidden="false"
                                             style="display: block;">
                                            <div class="wpb_revslider_element wpb_content_element content_detail">
                                                {schedule}
                                            </div>

                                        </div>
                                        <div id="tab-ffb99a93-e384-0c4fe-3a9f"
                                             class="wpb_tab  nicdark_bg_grey nicdark_border_grey ui-tabs-panel wpb_ui-tabs-hide vc_clearfix ui-widget-content ui-corner-bottom"
                                             aria-labelledby="ui-id-2" role="tabpanel" aria-hidden="true"
                                             style="display: none;">
                                            <div class="wpb_gmaps_widget wpb_content_element map_ready content_detail">
                                                <div class="wpb_wrapper">
                                                    <div class="wpb_map_wraper">{price_list}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab-ffb99a93-e38x-0c4fe-3a9f"
                                             class="wpb_tab  nicdark_bg_grey nicdark_border_grey ui-tabs-panel wpb_ui-tabs-hide vc_clearfix ui-widget-content ui-corner-bottom"
                                             aria-labelledby="ui-id-6" role="tabpanel" aria-hidden="true"
                                             style="display: none;">
                                            <div class="wpb_gmaps_widget wpb_content_element map_ready content_detail">
                                                <div class="wpb_wrapper">
                                                    <div class="wpb_map_wraper">{inclusion}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="tab-ffb99a93-e38y-0c4fe-3a9f"
                                             class="wpb_tab  nicdark_bg_grey nicdark_border_grey ui-tabs-panel wpb_ui-tabs-hide vc_clearfix ui-widget-content ui-corner-bottom"
                                             aria-labelledby="ui-id-7" role="tabpanel" aria-hidden="true"
                                             style="display: none;">
                                            <div class="wpb_gmaps_widget wpb_content_element map_ready content_detail">
                                                <div class="wpb_wrapper">
                                                    <div class="wpb_map_wraper">{exclusion}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="tab-ffb99a93-1123-0c4fe-3a9f"
                                             class="wpb_tab  nicdark_bg_grey nicdark_border_grey ui-tabs-panel wpb_ui-tabs-hide vc_clearfix ui-widget-content ui-corner-bottom"
                                             aria-labelledby="ui-id-4" role="tabpanel" aria-hidden="true"
                                             style="display: none;">
                                            <div class="wpb_gmaps_widget wpb_content_element map_ready content_detail">
                                                <div class="wpb_wrapper">
                                                    <div class="wpb_map_wraper">
                                                        {list_img}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab-ffb99a93-1124-0c4fe-3a9f"
                                             class="wpb_tab  nicdark_bg_grey nicdark_border_grey ui-tabs-panel wpb_ui-tabs-hide vc_clearfix ui-widget-content ui-corner-bottom"
                                             aria-labelledby="ui-id-5" role="tabpanel" aria-hidden="true"
                                             style="display: none;">
                                            <div class="wpb_gmaps_widget wpb_content_element map_ready content_detail">
                                                <div class="wpb_wrapper">
                                                    <div class="wpb_map_wraper">
                                                        <div class="fb-comments" data-href="{link}"
                                                             data-colorscheme="light" data-numposts="5"
                                                             data-width="100%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class=" title left lienquan" style="margin-top: 20px">{price_list_lang}</h3>
                                    <div class="wpb_wrapper " style="padding-left: 0px; padding-right: 0px; padding-top: 10px">
                                        {price_list}
                                    </div>
                                </div>
                                <div class="vc_col-sm-12 wpb_column vc_column_container ">
                                    <div class="wpb_wrapper">
                                        <h3 class=" title left lienquan">{you_may_also_detail}</h3>
                                        <div class="vc_empty_space" style="height: 20px"><span
                                                    class="vc_empty_space_inner"></span></div>

                                        <div class="nicdark_masonry_container"
                                             style="position: relative; height: 264.328px;">

                                            {tour_noibat}

                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>


                </div>

                <!--end content-->
</div></div>

