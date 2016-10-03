<!--start right sidebar-->
<div class="grid grid_3 percentage nicdark_width100_responsive">

    <!--start search-->
    <div class="nicdark_focus nicdark_padding10 nicdark_sizing">
        <div class="nicdark_archive1 nicdark_bg_white nicdark_border_grey nicdark_sizing ">

            <div class="nicdark_textevidence nicdark_bg_green">
                <h4 class="white nicdark_margin20">{search}</h4>
            </div>

            <div class="nicdark_margin020">


                <div class="nicdark_space10"></div>
                <form class="nicdark_advanced_search" action="{SITE-NAME}/search/" method="GET">
                    <span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span>
                    <input id="nicdark_autocomplete"
                           class="nicdark_bg_greydark2 nicdark_border_none   grey medium subtitle"
                           type="text" placeholder="{name_tour}" name="name"
                           value="">

                    <select name="departure"
                            class="nicdark_bg_greydark2 nicdark_border_none nicdark_radius_none grey medium subtitle">
                        <option value="">{all_departure}</option>
                        {list_departure}
                    </select>
                    <input
                            type="hidden" value="typology-package" name="tax-1"><select
                            name="destination"
                            class="nicdark_bg_greydark2 nicdark_border_none nicdark_radius_none grey medium subtitle">
                        <option value="">{all_destination}</option>
                        {list_destination}
                    </select>
                    <select
                            name="duration"
                            class="nicdark_bg_greydark2 nicdark_border_none nicdark_radius_none grey medium subtitle">
                        <option value="">{all_duration}</option>
                        {list_Durations}
                    </select>


                    <div class="nicdark_focus">
                        <select name="vehicle" class="nicdark_activity nicdark_width_percentage49 nicdark_bg_greydark2 nicdark_border_none  grey medium subtitle">
                            <option value="">{vehicle}</option>
                            {list_Vehicle}
                        </select>
                        <select style="float:right;" name="hotel" class="nicdark_activity nicdark_width_percentage49 nicdark_bg_greydark2 nicdark_border_none  grey medium subtitle">
                            <option value="">{hotel}</option>
                            {list_Hotel}
                        </select>
                    </div>

                    <div class="nicdark_margintop20 nicdark_bg_grey2 nicdark_slider_range nicdark_slider_range_green nicdark_focus ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"
                         aria-disabled="false">
                        <div class="ui-slider-range ui-widget-header ui-corner-all"
                             style="left: 10%; width: 80%;"></div>
                        <a class="ui-slider-handle ui-state-default ui-corner-all" href="#"
                           style="left: 10%;"></a><a class="ui-slider-handle ui-state-default ui-corner-all"
                                                     href="#" style="left: 90%;"></a></div>
                    <div class="nicdark_space20"></div>
                    <input name="price_from_to"
                           class="nicdark_focus nicdark_bg_greydark grey subtitle medium  nicdark_slider_amount"
                           type="text" value="">



                    <input type="submit" value="{search}" class="nicdark_btn fullwidth nicdark_bg_green ">


                </form>
                <div class="nicdark_space10"></div>


            </div>

            <div class="nicdark_textevidence nicdark_bg_green">
                <h4 class="white nicdark_margin20">NEWS</h4>
            </div>

            <div class="nicdark_margin020">


                <div class="nicdark_space10"></div>
                <form class="nicdark_advanced_search" action="{SITE-NAME}/search/" method="GET">
                    <span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span>
                    <input id="nicdark_autocomplete"
                           class="nicdark_bg_greydark2 nicdark_border_none   grey medium subtitle"
                           type="text" placeholder="{name_tour}" name="name"
                           value="">

                    <select name="departure"
                            class="nicdark_bg_greydark2 nicdark_border_none nicdark_radius_none grey medium subtitle">
                        <option value="">{all_departure}</option>
                        {list_departure}
                    </select>
                    <input
                            type="hidden" value="typology-package" name="tax-1"><select
                            name="destination"
                            class="nicdark_bg_greydark2 nicdark_border_none nicdark_radius_none grey medium subtitle">
                        <option value="">{all_destination}</option>
                        {list_destination}
                    </select>
                    <select
                            name="duration"
                            class="nicdark_bg_greydark2 nicdark_border_none nicdark_radius_none grey medium subtitle">
                        <option value="">{all_duration}</option>
                        {list_Durations}
                    </select>


                    <div class="nicdark_focus">
                        <select name="vehicle" class="nicdark_activity nicdark_width_percentage49 nicdark_bg_greydark2 nicdark_border_none  grey medium subtitle">
                            <option value="">{vehicle}</option>
                            {list_Vehicle}
                        </select>
                        <select style="float:right;" name="hotel" class="nicdark_activity nicdark_width_percentage49 nicdark_bg_greydark2 nicdark_border_none  grey medium subtitle">
                            <option value="">{hotel}</option>
                            {list_Hotel}
                        </select>
                    </div>

                    <div class="nicdark_margintop20 nicdark_bg_grey2 nicdark_slider_range nicdark_slider_range_green nicdark_focus ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"
                         aria-disabled="false">
                        <div class="ui-slider-range ui-widget-header ui-corner-all"
                             style="left: 10%; width: 80%;"></div>
                        <a class="ui-slider-handle ui-state-default ui-corner-all" href="#"
                           style="left: 10%;"></a><a class="ui-slider-handle ui-state-default ui-corner-all"
                                                     href="#" style="left: 90%;"></a></div>
                    <div class="nicdark_space20"></div>
                    <input name="price_from_to"
                           class="nicdark_focus nicdark_bg_greydark grey subtitle medium  nicdark_slider_amount"
                           type="text" value="">



                    <input type="submit" value="{search}" class="nicdark_btn fullwidth nicdark_bg_green ">


                </form>
                <div class="nicdark_space10"></div>


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