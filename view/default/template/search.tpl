<section class="nicdark_section">

    <!--start nicdark_container-->
    <div class="nicdark_container nicdark_clearfix">

        <!--start content-->
        <div class="grid grid_9 percentage nicdark_width100_responsive">

            <div class="nicdark_focus nicdark_padding10 nicdark_sizing">

                <div class="nicdark_focus nicdark_padding10 nicdark_sizing nicdark_bg_greydark">

                    <!--sort-->
                    <div class="nicdark_activity nicdark_width100_iphonepotr nicdark_width100_iphoneland">
                        <h4 style="color:#ffffff;text-transform: uppercase;" class="white left nicdark_btn  small nicdark_padding1020">{name_dm}</h4>
                    </div>

                    <div class="nicdark_float_right nicdark_displaynone_iphonepotr nicdark_displaynone_iphoneland">
                        <a class="grey right nicdark_btn  small nicdark_padding10 nicdark_cursor_initial"><i class="icon-th-large"></i></a>
                        <select id="display_list" name="nicdark_layout" class="nicdark_float_right nicdark_padding0_left nicdark_padding0_right nicdark_width_initial nicdark_padding10 nicdark_bg_greydark nicdark_radius_none grey small subtitle">
                            <option value="grid">{gird}</option>
                            <option value="list">{list}</option>
                        </select>
                        <!--<a class="white right nicdark_btn  small nicdark_padding1020">{view_as}</a>-->
                    </div>
                    <!--end view-->
                </div>

            </div>
            <div class="vc_col-sm-12 wpb_column vc_column_container ">
                <div class="wpb_wrapper">
                    <h3  class=" title left lienquan">{search_resul_tour}</h3>
                    <div class="vc_empty_space" style="height: 20px"><span class="vc_empty_space_inner"></span></div>
                </div>
            </div>
            <div {dis_tour} class="nicdark_ajax_results">

                <div id="gird_result" class="nicdark_masonry_container" style="position: relative; ">
                    <!--start preview-->
                    {danhsach}
                    <!--end prev-->
                    <div style="padding: 10px !important;">
                        {mess}
                    </div>

                </div>
                <div id="list_result" class="" style="position: relative;  display: none; width: 100%; float: left">
                   {danhsach2}
                    <div style="padding: 10px !important;">
                        {mess}
                    </div>

                </div>
            </div>

            <!--end nicdark_masonry_container-->

            <div style="{dis_news}"  class="vc_col-sm-12 wpb_column vc_column_container ">
                <div class="wpb_wrapper">
                    <h3  class=" title left lienquan">{search_resul_news}</h3>
                    <div class="nicdark_space10"></div>
                </div>
            </div>

            <div class="wpb_wrapper" style="padding: 10px; {dis_news}">
                {danhsach_news}
            </div>


            <!--end pagination-->



        </div>
        <!--end content-->


