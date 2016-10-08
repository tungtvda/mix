<!--start preview-->
<div
     class="grid grid_4 percentage nicdark_masonry_item nicdark_padding10 nicdark_sizing">
    <div class="nicdark_archive1 nicdark_bg_white nicdark_border_grey nicdark_sizing border_archive">


        <!--start image-->
        <div class="nicdark_focus nicdark_relative nicdark_fadeinout nicdark_overflow">

           <img title="{name}" alt="{name}" class="nicdark_focus nicdark_zoom_image"
                 src="{img}">


            <!--price-->
            <div class="nicdark_fadeout nicdark_absolute nicdark_height100percentage nicdark_width_percentage100">
                <a href="{link}" class="nicdark_btn nicdark_bg_white left grey medium">{price} {currency}</a>
            </div>
            <!--end price-->


            <!--start content-->
            <div class="nicdark_fadein nicdark_filter greydark nicdark_absolute nicdark_height100percentage nicdark_width_percentage100">
                <div class="nicdark_absolute nicdark_display_table nicdark_height100percentage nicdark_width_percentage100">
                    <div class="nicdark_cell nicdark_vertical_middle">
                        <a href="{link}" title="{name}"
                           class="nicdark_btn nicdark_border_white white medium">{detail}</a>
                    </div>
                </div>
            </div>
            <!--end content-->

        </div>
        <!--end image-->


        <div class="nicdark_textevidence nicdark_bg_greydark">
            <a href="{link}" title="{name}"><h4 class="white nicdark_margin20 name_chitiet_danhmuc">{name}
               </h4></a>
        </div>

        <div class="nicdark_focus nicdark_bg_green">
            <div style="padding: 10px 0px !important;" class="nicdark_bg_greendark nicdark_focus nicdark_padding1020 nicdark_sizing nicdark_width_percentage50 title-left">
                <p class="white" style="font-size: 14px"><i class="el el-icon-time"></i> {durations}</p>
            </div>
            <div class="nicdark_bg_violetdark nicdark_focus nicdark_padding1020 nicdark_sizing nicdark_width_percentage50 title-right">
                <p class="white" style="font-size: 14px"><a href="{link}"><i class="el el-arrow-right"></i> {detail} </a></p>
            </div>
        </div>

        <div class="nicdark_margin20 content_sub content_sub_danhmuc">
            <p>{content}</p>

            <div class="nicdark_space20" style="height: 5px"></div>
            <!--<a href="{link}"
               class="nicdark_border_grey grey nicdark_btn nicdark_outline  detail_small">{detail} <i class="el el-eye-open"></i>
            </a>-->
            <a href="{link}#booking" style="padding: 10px"
               class="nicdark_border_grey grey nicdark_btn nicdark_outline booking_small">
                {booking}  <i class="el el-shopping-cart-sign"></i>
            </a>

        </div>

    </div>
</div>
<!--end prev-->