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
                        <!--<a class="white left nicdark_btn  small nicdark_padding1020">SORT BY</a>
                        <select id="nicdark_sort_feature" onchange="nicdark_sort()" name="nicdark_sort_feature" class="nicdark_padding0_left nicdark_width_initial nicdark_padding10 nicdark_bg_greydark  nicdark_radius_none grey small subtitle">
                            <option value="name">NAME</option>
                            <option value="price">PRICE</option>
                        </select>
                        <a class="grey left nicdark_btn  small nicdark_padding100 nicdark_marginright30 nicdark_cursor_initial"><i class="icon-angle-down"></i></a>-->
                    </div>
                    <!--end sort-->

                    <!--<a class="nicdark_displaynone_iphoneland nicdark_displaynone_iphonepotr greydark2 left nicdark_btn  small nicdark_padding100 nicdark_marginright10">|</a>


                    <!--order-->
                    <!--<div class="nicdark_activity nicdark_width100_iphonepotr nicdark_width100_iphoneland">
                        <a class="white left nicdark_btn  small nicdark_padding1020">ORDER</a>
                        <select id="nicdark_asc_desc" onchange="nicdark_sort()" name="nicdark_asc_desc" class="nicdark_padding0_left nicdark_width_initial nicdark_padding10 nicdark_bg_greydark nicdark_radius_none grey small subtitle">
                            <option value="ASC">A/Z - 1/3</option>
                            <option value="DESC">Z/A - 3/1</option>
                        </select>
                        <a class="grey left nicdark_btn  small nicdark_padding100 nicdark_marginright40 nicdark_cursor_initial"><i class="icon-angle-down"></i></a>
                    </div>-->
                    <!--end order-->


                    <!--view-->
                    <div class="nicdark_float_right nicdark_displaynone_iphonepotr nicdark_displaynone_iphoneland">
                        <a class="grey right nicdark_btn  small nicdark_padding10 nicdark_cursor_initial"><i class="icon-th-large"></i></a>
                        <select id="display_list" name="nicdark_layout" class="nicdark_float_right nicdark_padding0_left nicdark_padding0_right nicdark_width_initial nicdark_padding10 nicdark_bg_greydark nicdark_radius_none grey small subtitle">
                            <option value="grid">GRID</option>
                            <option value="list">LIST</option>
                        </select>
                        <a class="white right nicdark_btn  small nicdark_padding1020">VIEW AS</a>
                    </div>
                    <!--end view-->



                </div>

            </div>



            <!--start no results-->

            <!--end no results-->

            <!--start nicdark_masonry_container-->
            <div class="nicdark_ajax_results">
                <div id="gird_result" class="nicdark_masonry_container" style="position: relative; height: 1629.94px;">

                    <!--start preview-->
                    {danhsach}
                    <!--end prev-->


                </div>
                <div id="list_result" class="" style="position: relative; height: 1629.94px; display: none; width: 100%; float: left">

                   {danhsach2}
                </div>
            </div>
            <!--end nicdark_masonry_container-->


            <!--start pagination-->
            <div class="nicdark_focus nicdark_pagination center">
                <div class="nicdark_space30"></div>
                <!--<div onclick="nicdark_sort(1)" class=" active nicdark_btn nicdark_margin10 medium nicdark_border_grey center">1</div>
                <div onclick="nicdark_sort(2)" class="  nicdark_btn nicdark_margin10 medium nicdark_border_grey center">2</div>-->
                <ul class="PAGING">
                    {PAGING}
                </ul>

            </div>
            <!--end pagination-->



        </div>
        <!--end content-->


