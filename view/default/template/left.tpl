<!--start right sidebar-->
<div class="grid grid_3 percentage nicdark_width100_responsive">

    <!--start search-->
    <div class="nicdark_focus nicdark_padding10 nicdark_sizing">
        <div class="nicdark_archive1 nicdark_bg_white nicdark_border_grey nicdark_sizing ">

            <div class="nicdark_textevidence nicdark_bg_green">
                <h4 style="font-size: 15px" class="white nicdark_margin20">{search}</h4>
            </div>

            <div class="nicdark_margin020">


                <div class="nicdark_space10"></div>
                <form class="nicdark_advanced_search" action="{SITE-NAME}/search" method="GET">
                    <span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span>
                    <!--<input id="nicdark_autocomplete"
                           class="nicdark_bg_greydark2 nicdark_border_none   grey medium subtitle"
                           type="text" placeholder="{name_tour}" name="name"
                           value="">-->

                    <select name="departure"
                            class="nicdark_bg_greydark2 nicdark_border_none nicdark_radius_none grey medium subtitle">
                        <option value="">All styles</option>
                        <option value="Classic">Classic tours</option>
                        <option value="excursion">Vietnam excursions</option>
                        <option value="Short vacations">Short vacations</option>
                        <option value="Beach holidays">Beach holidays</option>
                        <option value="Cruise">Cruise tours</option>
                        <!--{list_departure}-->
                    </select>
                    <select
                            name="destination"
                            class="nicdark_bg_greydark2 nicdark_border_none nicdark_radius_none grey medium subtitle">
                        <option value="">{all_destination}</option>
                        <option value="Hanoi">Hanoi</option>
                        <option value="Hue">Hue</option>
                        <option value="Hoi An">Hoi An</option>
                        <option value="Sapa">Sapa</option>
                        <option value="ha long">Ha Long Bay</option>
                        <option value="Ho Chi Minh">Ho Chi Minh City</option>
                        <option value="Mekong Delta">Mekong Delta</option>
                        <option value="Phu Quoc">Phu Quoc</option>
                        <option value="Nha Trang">Nha Trang</option>
                        <option value="Mui ne">Mui ne</option>
                        <option value="Laos">Laos</option>
                        <option value="Cambodia">Cambodia</option>
                        <option value="Mianmar">Mianmar</option>
                        <option value="Thailan">Thailan</option>
                        <!--{list_destination}-->
                    </select>
                    <select
                            name="duration"
                            class="nicdark_bg_greydark2 nicdark_border_none nicdark_radius_none grey medium subtitle">
                        <option value="">{all_duration}</option>
                        <option value="1">Day trip</option>
                        <option value="2 days">2 day</option>
                        <option value="2-4 days">2-4 days</option>
                        <option value="5-7 days">5-7 days</option>
                        <option value="8-10 days">8-10 days</option>
                        <option value="more than 11 days">more than 11 days</option>
                        <!--{list_Durations}-->
                    </select>


                    <!--<div class="nicdark_focus">
                        <select name="vehicle"
                                class="nicdark_activity nicdark_width_percentage49 nicdark_bg_greydark2 nicdark_border_none  grey medium subtitle">
                            <option value="">{vehicle}</option>
                            {list_Vehicle}
                        </select>
                        <select style="float:right;" name="hotel"
                                class="nicdark_activity nicdark_width_percentage49 nicdark_bg_greydark2 nicdark_border_none  grey medium subtitle">
                            <option value="">{hotel}</option>
                            {list_Hotel}
                        </select>
                    </div>-->

                    <div class="nicdark_margintop20 nicdark_bg_grey2 nicdark_slider_range nicdark_slider_range_green nicdark_focus ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"
                         aria-disabled="false">
                        <div class="ui-slider-range ui-widget-header ui-corner-all"
                             style="left: 10%; width: 80%;"></div>
                        <a class="ui-slider-handle ui-state-default ui-corner-all" href="#"
                           style="left: 10%;"></a><a class="ui-slider-handle ui-state-default ui-corner-all"
                                                     href="#" style="left: 90%;"></a></div>
                    <div class="nicdark_space20"></div>
                    <input style="color: #ec1b23;" name="price_from_to"
                           class="nicdark_focus nicdark_bg_greydark grey subtitle medium  nicdark_slider_amount"
                           type="text" value="">


                    <input type="submit" value="{search}" class="nicdark_btn fullwidth nicdark_bg_green ">


                </form>


            </div>

            <!--<h3 class=" title left lienquan">{online_support}</h3>
            <div class="nicdark_margin020">
                {danhmuc_subport}
            </div>-->

            <h3 class=" title left lienquan"></h3>
            <div class="nicdark_space20"></div>
            <div class="nicdark_margin020">
                <div class="fb-page" data-href="https://www.facebook.com/mixtourist.vietnam" style="width: 100% !important;"
                     data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"
                     data-show-facepile="true">
                    <blockquote cite="https://www.facebook.com/mixtourist.vietnam" class="fb-xfbml-parse-ignore"><a
                                href="https://www.facebook.com/mixtourist.vietnam">MixTourist Viet Nam</a></blockquote>
                </div>

            </div>

            <h3 style="padding-left: 10px" class=" title left lienquan">{new_left}</h3>
            <div id="woocommerce_top_rated_products-3" class="widget woocommerce widget_top_rated_products">
                <ul class="product_list_widget">
                   {news_list}
                </ul>
            </div>


        </div>
    </div>
    <!--end search-->

</div>
<!--end right sidebar-->
<div class="nicdark_space50"></div>
</div>
<!--end container-->

</section>