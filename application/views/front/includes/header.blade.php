<div id="Header">
    <!--Header logo-->
    <div class="header-container">
        <!--Headet top-->
        <div class="header-top">
            <div class="h-item-left">
                            <span>
                                Hotline <span class="PhomeRed"><span>0961.399.499 - 0988.550.306 - 0942.399.366</span></span> | Email: service@hpi.vn

                            </span>
            </div>
            <div class="h-item-right">
                <ul class="menu-top">
                    <li><a href="/" class="menu-ac">Trang chủ</a> </li>
                    <li><a href="/tin-tuc">Tin tức</a> </li>
                    <li>
                        <a href="/tro-giup">Trợ giúp</a>
                    </li>
                    <li><a href="/lien-he">Liên hệ</a> </li>
                </ul>
            </div>
            <div class="clr">
            </div>
        </div>
        <!--end Headet top-->
        <!--Headet main-->
        <!--Headet main-->
        <div class="clr header-main">
            <div class="main-item-1">
                <a href="http://www.hathanhauto.com/">
                    <img src="/assets/img/Logo.png" width="80" height="39" alt="logo">
                </a>
            </div>
            <div class="main-item-2">
                <div class="box-search">
                    <span class="bg-s-left"></span><span class="bg-s-right"></span>
                                <span class="bg-txt-s">
                                    <input name="txtKeyword" type="text" id="txtKeyword" onkeypress="EnterSearch(this);"
                                           class="txtKeysearch txt-search" value="Phụ tùng bạn muốn tìm?"
                                           onblur=" if (this.value == &#39;&#39;) this.value = &#39;Phụ tùng bạn muốn tìm?&#39; "
                                           onfocus="    if(this.value ==&#39;Phụ tùng bạn muốn tìm?&#39; ) this.value=&#39;&#39;">
                                </span>
                                <span class="bg-btn-s">
                                    <input type="submit" name="btnSearch" value="" id="btnSearch" class="btnSearch" onclick="javascript: return Search();">
                                </span>
                </div>
            </div>
            <div class="main-item-3">
                <div class="bg-cart">
                    <div class="navBox login-item">
                        <span class="icon-down"></span>
                        <a class="pos-login" href="http://www.hathanhauto.com/dang-nhap">
                            <b>Đăng nhập</b><br>Tài khoản &amp; đơn hàng
                        </a>
                        <div class="nav-content-hide" style="right: -131px; width: 200px">
                            <div class="content-hide-body"><span>
                                                <a href="http://www.hathanhauto.com/dang-nhap" class="btnLogin-abc"><span class="">Đăng nhập</span></a>
                                                    </span>
                                                <span style="padding-top: 10px;">
                                                    <span style="float: left; padding-right: 10px; margin: 10px 0;">Khách hàng mới?</span>
                                                <a style="float: left; margin-bottom: 10px;" href="http://www.hathanhauto.com/dang-ky-thanh-vien">Đăng ký tại đây.</a>
                                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="navBox Cart-item">
                        <span class="icon-down"></span>
                                    <span class="numCart">8
</span>
                        <a href="/gio-hang" class="lnkCart">
                            Giỏ hàng
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--end Headet main-->
        <script type="text/javascript">
            function Search() {
                if ($('#txtKeyword').val().trim() == "Phụ tùng bạn muốn tìm?") {
                    return false;
                }
                window.location.href = '/tim-kiem/' + $('#txtKeyword').val();
            }
            function EnterSearch(e) {
                var key;
                if (window.event)
                    key = window.event.keyCode;     //IE
                else
                    key = e.which;     //firefox
                if (key == 13) {
                    $('#btnSearch').click();
                    event.keyCode = 0
                }
            }
            $(function () {

                //search auto comple
                $.ui.autocomplete.prototype._renderItem = function (ul, item) {
                    var re = new RegExp($.trim(this.term.toLowerCase()));
                    var t = item.label.replace(re, "<span style='font-weight:600;color:#5C5C5C;'>" + $.trim(this.term.toLowerCase()) +
                            "</span>");
                    return $("<li></li>")
                            .data("item.autocomplete", item)
                            .append("<a>" + t + "</a>")
                            .appendTo(ul);
                };
                var urlAuto = '/Desktop/DeHome/SearchAutoComplete';

                $("#txtKeyword").autocomplete({
                    source: function (request, response) {
                        var obj = {
                            q: request.term
                        }
                        $.ajax({
                            url: urlAuto,
                            type: "GET",
                            data: obj,
                            contentType: "application/json; charset=utf-8",
                            datatype: "jsondata",
                            async: "true",
                            success: function (data) {
                                response($.map(data, function (item) {
                                    return {
                                        value: item.Name,
                                        label:item.Name
                                    };
                                }));
                            },
                            error: function (XMLHttpRequest, textStatus, errorThrown) {
                                alert(textStatus);
                            }
                        });
                    },
                    minLength: 3,
                    select: function(event, ui) {
                        Search();
                    }
                });

            });
        </script>

        <!--end Headet main-->
        <!--Headet menu-->
        <div class="header-nav">
            <ul class="nav-top">
                <li class="navL1 width1">
                    <a href="http://www.hathanhauto.com/danh-muc/he-thong-gam-he-thong-phanh"><span>Hệ thống gầm - hệ thống phanh</span></a>
                    <ul>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/he-thong-giam-xoc">Hệ thống giảm x&#243;c</a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/van-chia-hoi-nang-gam">Van chia hơi n&#226;ng gầm</a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/he-thong-lo-xo">Hệ thống l&#242; xo</a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/he-thong-phanh">Hệ thống phanh</a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/he-thong-cang-xe-hoi">Hệ thống c&#224;ng xe hơi</a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/cao-su-xe-o-to">Cao su xe &#244; t&#244;</a></li>
                    </ul>

                </li>
                <li class="navL1 width2">
                    <a href="http://www.hathanhauto.com/danh-muc/noi-that-chat-longphu-kien"><span>Nội thất, chất lỏng,phụ kiện </span></a>
                    <ul>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/dong-ho-tap-lo"> Đồng hồ t&#225;p l&#244; </a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/lop-xe-o-to-chinh-hang">Lốp xe &#244; t&#244; ch&#237;nh h&#227;ng</a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/dau-may-xe-o-to">Dầu m&#225;y xe &#244; t&#244;</a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/he-thong-dau-nhot">Hệ thống dầu nhớt </a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/he-thong-noi-that">Hệ thống Nội thất </a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/he-thong-ao-goi-o-to">Hệ thống &#225;o, gối &#244; t&#244;</a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/kinh-chong-loa-o-to">K&#237;nh chống l&#243;a &#244; t&#244;</a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/dau-dung-cho-xe-mo-to">Dầu d&#249;ng cho xe m&#244; t&#244;</a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/he-thong-tap-bi">Hệ thống t&#225;p bi</a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/thiet-bi-hien-thi-thong-tin-len-kinh-lai">Thiết bị hiển thị th&#244;ng tin l&#234;n k&#237;nh l&#225;i</a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/do-choi-xe-hoi">Đồ chơi xe hơi </a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/o-to-dien-tre-em-va-ghe-o-to-cho-be">&#212; t&#244; điện trẻ em v&#224; Ghế &#244; t&#244; cho b&#233;</a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/dau-phanh-tro-luc-cau-sau">Dầu phanh, trợ lực, cầu sau</a></li>
                    </ul>

                </li>
                <li class="navL1 width3">
                    <a href="http://www.hathanhauto.com/danh-muc/he-thong-dien--dieu-hoa"><span>Hệ thống điện  -  điều h&#242;a </span></a>
                    <ul>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/he-thong-cam-bien">Hệ thống cảm biến</a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/cu-de-may-de-xe-o-to">Củ đề (m&#225;y đề) xe &#244; t&#244;</a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/he-thong-tui-khi">Hệ thống t&#250;i kh&#237; </a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/loc-gio-dieu-hoa">Lọc gi&#243; điều h&#242;a</a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/phin-loc-gas">Phin lọc gas</a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/loc-lanh">Lốc lạnh</a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/gian-nong">Gi&#224;n n&#243;ng</a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/quat-gio-dieu-hoa">Quạt gi&#243; điều h&#242;a</a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/he-thong-dieu-hoa">Hệ thống điều h&#242;a </a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/he-thong-hop-dieu-khien">Hệ thống hộp điều khiển</a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/quat-gio-dong-co-quat-ket-nuoc">Quạt gi&#243; động cơ (quạt k&#233;t nước)</a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/may-phat-dien-o-to">M&#225;y ph&#225;t điện &#244; t&#244;</a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/gian-lanh">Gi&#224;n lạnh</a></li>
                    </ul>

                </li>
                <li class="navL1 width4">
                    <a href="http://www.hathanhauto.com/danh-muc/than-vo-guongdenkinh"><span>Th&#226;n vỏ - gương,đ&#232;n,k&#237;nh </span></a>
                    <ul>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/cao-suchoi-gat-mua-can-gat-mua">Cao su-chổi gạt mưa, cần gạt mưa</a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/kinh-chan-gio">K&#237;nh chắn gi&#243;</a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/he-thong-cam-bien">H&#234; thống cảm biến</a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/he-thong-den-bong-den-guong">Hệ thống đ&#232;n - B&#243;ng đ&#232;n - gương </a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/mat-ga-lang">Mặt ga lăng</a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/ba-do-soc-truoc-sau">Ba đờ sốc trước sau </a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/tai-xe-tay-mo-cua">Tai xe, tay mở cửa</a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/he-thong-bom">Hệ thống bơm</a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/logo-tem-chu">Logo, tem chữ </a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/nep-cac-loaiop">Nẹp c&#225;c loại-ốp </a></li>
                    </ul>

                </li>
                <li class="navL1 width5">
                    <a href="http://www.hathanhauto.com/danh-muc/he-thong-dong-co-hop-so"><span>Hệ thống động cơ - hộp số </span></a>
                    <ul>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/loc-gio-dong-co">Lọc gi&#243; động cơ</a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/he-thong-truc-loc-bac">Hệ thống trục, lốc, bạc </a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/he-thong-hop-so">Hệ thống hộp số </a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/he-thong-bom">Hệ thống bơm</a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/he-thong-bi-bu-ly">Hệ thống bi | bu ly </a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/quat-gio-dong-co">Quạt gi&#243; động cơ</a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/bau-loc-dong-co-bo-bin">Bầu lọc động cơ, b&#244; bin</a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/he-thong-cam-bien-cao-su-day-cu-roa">Hệ thống cảm biến, cao su, d&#226;y  cu roa</a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/he-thong-gioang-phot-loc-ong-hoi">Hệ thống gioăng phớt, lọc, ống hơi </a></li>
                    </ul>

                </li>
                <li class="navL1 width6">
                    <a href="http://www.hathanhauto.com/danh-muc/he-thong-truyen-donghe-thong-lai"><span>Hệ thống truyền động,hệ thống l&#225;i</span></a>
                    <ul>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/truc-lap">Trục l&#225;p </a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/giam-tran-bi">Giảm trấn, bi </a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/he-thong-lai">Hệ thống l&#225;i </a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/he-thong-bi-moay-o">Hệ thống bi moay ơ </a></li>
                    </ul>

                </li>
                <li class="navL1 width7">
                    <a href="http://www.hathanhauto.com/danh-muc/he-thong-nhien-lieu-va-lam-mat"><span>Hệ thống nhi&#234;n liệu v&#224; l&#224;m m&#225;t </span></a>
                    <ul>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/he-thong-nhien-lieu">Hệ thống nhi&#234;n liệu  </a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/bom-xang-o-to">Bơm xăng &#244; t&#244;</a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/he-thong-lam-mat">Hệ thống l&#224;m m&#225;t </a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/loc-xang">Lọc xăng</a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/ket-nuoc">K&#233;t nước</a></li>
                        <li><i></i><a href="http://www.hathanhauto.com/danh-muc/loc-dau-o-to">Lọc dầu &#244; t&#244;</a></li>
                    </ul>

                </li>
            </ul>
        </div>
        <script type="text/javascript">
            $(function () {
                $('.nav-top .navL1').hover(function () {
                    $(this).toggleClass('navL1Hover');
                    var _idx = $(this).index();
                    var _num = 7;
                    if (_idx > 7) {
                        $(this).find('ul').css('right', '0px');
                    }
                    else {
                        $(this).find('ul').css('left', '0px');
                    }
                    $(this).find('li:last-child ul').css('left', '-112px');
                });
                $(this).find('.nav-top .width1').css('width', '122px');
                $(this).find('.nav-top .mnu-focus .width1').css('width', '122px');
                $(this).find('.nav-top .width2').css('width', '129px');
                $(this).find('.nav-top .width3').css('width', '142px');
                $(this).find('.nav-top .width4').css('width', '133px');
                $(this).find('.nav-top .width5').css('width', '139px');
                $(this).find('.nav-top .width6').css('width', '168px');
                $(this).find('.nav-top .width7').css('width', '144px');
            });

        </script>



        <div class="bg-filter2" id="bgfilter">
            <div class="divRow">
                <b>Chọn nhanh</b>
            </div>
            <div class="divRow">
                <select class="ddlfilter" id="ddlYear" name="ddlYear" onchange="GetProvider(this)"><option value="0">Năm sản xuất</option>
                    <option value="2013">2013</option>
                    <option value="2012">2012</option>
                    <option value="2011">2011</option>
                    <option value="2010">2010</option>
                    <option value="2009-2012">2009-2012</option>
                    <option value="2009-2011">2009-2011</option>
                    <option value="2009-2010">2009-2010</option>
                    <option value="2009">2009</option>
                    <option value="2008-2012">2008-2012</option>
                    <option value="2008-2011">2008-2011</option>
                    <option value="2008">2008</option>
                    <option value="2007-2011">2007-2011</option>
                    <option value="2007-2009">2007-2009</option>
                    <option value="2007">2007</option>
                    <option value="2006-2011">2006-2011</option>
                    <option value="2006-2008">2006-2008</option>
                    <option value="2006">2006</option>
                    <option value="2005-2011">2005-2011</option>
                    <option value="2005">2005</option>
                    <option value="2004-2010">2004-2010</option>
                    <option value="2004-2006">2004-2006</option>
                    <option value="2004-2005">2004-2005</option>
                    <option value="2004 -2008">2004 -2008</option>
                    <option value="2004">2004</option>
                    <option value="2003-2006">2003-2006</option>
                    <option value="2003">2003</option>
                    <option value="2002-2008">2002-2008</option>
                    <option value="2002-2007">2002-2007</option>
                    <option value="2002-2006">2002-2006</option>
                    <option value="2002-2004">2002-2004</option>
                    <option value="2002">2002</option>
                    <option value="2001-2003">2001-2003</option>
                    <option value="2001">2001</option>
                    <option value="2000-2005">2000-2005</option>
                    <option value="1999-2006">1999-2006</option>
                    <option value="1999">1999</option>
                    <option value="1998-2006">1998-2006</option>
                    <option value="1998">1998</option>
                    <option value="1997">1997</option>
                    <option value="1996">1996</option>
                    <option value="1995">1995</option>
                    <option value="1993-1999">1993-1999</option>
                </select>
            </div>
            <div class="divRow" id="ddl-provider">
                <select class="ddlfilter" id="ddlProvider">
                    <option value="0">Hãng sản xuất</option>
                </select>
            </div>
            <div class="divRow" id="ddl-productType">
                <select class="ddlfilter" id="ddlProductType">
                    <option value="0">Loại xe</option>
                </select>
            </div>
            <div class="divRow" id="ddl-productVersion">
                <select class="ddlfilter" id="ddlVersion">
                    <option value="0">Động cơ</option>
                </select>
            </div>
            <div class="divRow" id="ddl-productEngine">
                <select class="ddlfilter" id="ddlEngine">
                    <option value="0">Phân khối</option>
                </select>
            </div>
            <div class="divRow">
            <span style="display: block; text-align: right;">
                <input type="button" class="btn-chon" onclick="ChooseProduct();"/>
            </span>
            </div>
        </div>
        <script type="text/javascript">

            function SetDisable() {
                if ($('#ddl-provider select option').length == 1) {
                    $('#ddl-provider select').attr("disabled", "disabled");
                }
                if ($('#ddl-productType select option').length == 1) {
                    $('#ddl-productType select').attr("disabled", "disabled");
                }
                if ($('#ddl-productVersion select option').length == 1) {
                    $('#ddl-productVersion select').attr("disabled", "disabled");
                }
                if ($('#ddl-productEngine select option').length == 1) {
                    $('#ddl-productEngine select').attr("disabled", "disabled");
                }
            }

            $(document).ready(function() {
                SetDisable();
            });
            function GetProvider(e) {
                var obj = {
                    productYear: $(e).val()
                }
                $.ajax({
                    type: "GET",
                    url: '/Desktop/DeHome/GetProvider',
                    data: obj,
                    success: function (data) {
                        if (data.length > 0) {
                            $('#ddl-provider').html(data);
                            SetDisable();
                        }
                    }
                });
            }
            function GetProductType(e) {
                var obj = {
                    productYear: $('#ddlYear').val(),
                    providerId : $(e).val()
                }
                $.ajax({
                    type: "GET",
                    url: '/Desktop/DeHome/GetProductType',
                    data: obj,
                    success: function (data) {
                        if (data.length > 0) {
                            $('#ddl-productType').html(data);
                            SetDisable();
                            if ($('#ddl-productType select option').length == 1) {
                                var url = "/bo-loc/y" + $('#ddlYear').val() + "-p" + $('#ddlProvider').val() + "-t" + $('#ddlProductType').val() + "-v" + $('#ddlVersion').val() + "-e" + $('#ddlEngine').val();
                                window.location.pathname = url;
                            }
                        }
                    }
                });
            }
            function GetProductVersion(e) {
                var obj = {
                    productYear: $('#ddlYear').val(),
                    productTypeId : $(e).val()
                }
                $.ajax({
                    type: "GET",
                    url: '/Desktop/DeHome/GetProductVersion',
                    data: obj,
                    success: function (data) {
                        if (data.length > 0) {
                            $('#ddl-productVersion').html(data);
                            SetDisable();
                            if ($('#ddl-productVersion select option').length == 1) {
                                var url = "/bo-loc/y" + $('#ddlYear').val() + "-p" + $('#ddlProvider').val() + "-t" + $('#ddlProductType').val() + "-v" + $('#ddlVersion').val() + "-e" + $('#ddlEngine').val();
                                window.location.pathname = url;
                            }
                        }
                    }
                });
            }
            function GetProductEngine(e) {
                var obj = {
                    productYear: $('#ddlYear').val(),
                    productVersionId : $(e).val()
                }
                $.ajax({
                    type: "GET",
                    url: '/Desktop/DeHome/GetProductEngine',
                    data: obj,
                    success: function (data) {
                        if (data.length > 0) {
                            $('#ddl-productEngine').html(data);
                            var url = "/bo-loc/y" + $('#ddlYear').val() + "-p" + $('#ddlProvider').val() + "-t" + $('#ddlProductType').val() + "-v" + $('#ddlVersion').val() + "-e" + $('#ddlEngine').val();
                            window.location.pathname = url;
                        }
                    }
                });
            }
            function ChooseProduct() {
                if ($('#ddlYear').val() == "0") {
                    alert("Bạn vui lòng chọn năm sản xuất");
                    return false;
                }
                if ($('#ddlProvider').val() == "0") {
                    alert("Bạn vui lòng chọn hãng sản xuất");
                    return false;
                }
                var url = "/bo-loc/y" + $('#ddlYear').val() + "-p" + $('#ddlProvider').val() + "-t" + $('#ddlProductType').val() + "-v" + $('#ddlVersion').val() + "-e" + $('#ddlEngine').val();
                window.location.pathname = url;
                return true;
            }
        </script>

    </div>
    <!--End Header logo-->
</div>