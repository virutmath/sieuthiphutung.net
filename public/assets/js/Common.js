window.onerror = new Function("return true");
var lastMenu = null;
var acticeMenu = null
var delay = 10;

function displaySubMenu(idMainMenu, idActive) {
    var subWidth, mainWidth, subLeft, mainLeft, subRight, conLeft;
    if (idMainMenu == '' || idMainMenu == null) return;
    if (lastMenu != idMainMenu) {
        if (lastMenu != '' && lastMenu != null) hideMenu(lastMenu);
        if (idActive != '' && acticeMenu != null && acticeMenu != idMainMenu) {
            hideMenu(idActive);
        }
        mainLeft = $("#mainmenu" + idMainMenu).offset().left;
        conLeft = $("#submenucontainer").offset().left + 25;
        subLeft = conLeft;
        subRight = subLeft + $("#submenucontainer").width();

        mainWidth = $("#mainmenu" + idMainMenu).width();
        subWidth = $("#submenu" + idMainMenu).width();

        if (mainLeft + (mainWidth - subWidth) / 2 > subLeft) subLeft = mainLeft + (mainWidth - subWidth) / 2;
        if (subLeft + subWidth > subRight) subLeft = subRight - subWidth;
        if (subLeft < conLeft) subLeft = conLeft;
        $("#submenu" + idMainMenu).fadeIn(5);
        $("#submenu" + idMainMenu).css({
            "position": "absolute",
            "left": subLeft
        });
        delay = 10;
        acticeMenu = idActive;
        lastMenu = idMainMenu;
    }
}

function hideMenu(menuid) {
    if (menuid != '') { $("#submenu" + menuid).fadeOut(0); }
}

function wopen(url, name, w, h) {
    var win = window.open(url, name, "width=" + w, "height=" + h, "location=no, menubar=no,status=no,toolbar=no,scrollbars=yes,resizable=yes");
    win.resizeTo(w, h);
    win.focus();
}

function OpenPopup(Url, WindowName, width, height, extras, scrollbars) {
    var wide = width;
    var high = height;
    var additional = extras;
    var top = (screen.height - high) / 2;
    var leftside = (screen.width - wide) / 2; newWindow = window.open('' + Url + '', '' + WindowName + '', 'width=' + wide + ',height=' + high + ',top=' + top + ',left=' + leftside + ',features=' + additional + '' + ',scrollbars=1');
    newWindow.focus();
}

function stop() {
    clearTimeout(tick);
}

function usnotime() {
    var ut = new Date();
    var h, m, s, d, mm, y, p;
    var time = "";
    dtObj = document.getElementById("lblDateTime")
    if (dtObj != null) {
        d = ut.getDate();
        mm = ut.getMonth() + 1;
        y = ut.getFullYear();
        h = ut.getHours();
        m = ut.getMinutes();
        s = ut.getSeconds();
        if (d <= 9) d = "0" + d;
        if (mm <= 9) mm = "0" + mm;
        if (s <= 9) s = "0" + s;
        if (m <= 9) m = "0" + m;
        if (h > 12) {
            p = " PM";
        }
        else {
            p = " AM";
        }
        h = h % 12;
        if (h <= 9) h = "0" + h;
        time += d + "/" + mm + "/" + y + " " + h + ":" + m + ":" + s + p;

        dtObj.innerHTML = time;
    }
    tick = setTimeout("usnotime()", 1000);
    if (delay > 0) {
        delay -= 1;
        if (delay == 0) {
            if (acticeMenu != '' && acticeMenu != null) displaySubMenu(acticeMenu, acticeMenu);
        }
    }
}

function WaterMarkAll(txt, evt, str) {

    if (txt.value.length == 0 && evt.type == "blur") {

        txt.value = str;

    }

    if (txt.value == str && evt.type == "focus") {

        txt.value = "";

    }

}

function GetListShoppingCart(Url, Container) {
    var _cmdContainer = $(Container);
    var strContent = _cmdContainer.text();

    $.get(Url, function (data) {
        if (data != "") {
            _cmdContainer.html(data);
        }
        else {
            _cmdContainer.html('Giỏ hàng lỗi');
        }
    });
}

function chkDelProductFromCart() {
    return confirm('Bạn có chắc chắn muốn xóa sản phẩm này ');
}

function chkDelAddressOrder() {
    return confirm('Bạn có chắc chắn muốn xóa địa chỉ này ');
}


function showHide(shID) {
    if (document.getElementById(shID)) {
        if (document.getElementById(shID + '-show').style.display != 'none') {
            document.getElementById(shID + '-show').style.display = 'none';
            document.getElementById(shID + '-hide').style.display = 'inline';
            document.getElementById(shID).style.display = 'block';
        }
        else {
            document.getElementById(shID + '-show').style.display = 'inline';
            document.getElementById(shID).style.display = 'none';
            document.getElementById(shID + '-hide').style.display = 'none';
        }
    }
}






function ShowNumFav(FavList) {

    var lnkFav = $("span[id$=lnkFavourite]");
    var lnkFav2 = $("a[class$=lnkFavourite2]");
    var totalFav = 0;
    if (FavList != '' && FavList != null)
        totalFav = FavList.split(",").length;
    lnkFav.html(totalFav);
    if (totalFav == 0) {
        lnkFav2.attr("disabled", "disabled");
    }
    else {
        lnkFav2.removeAttr("disabled");
        lnkFav2.html('Danh sách yêu thích (<i>' + totalFav + '</i>)');
    }

}
function AddtoFav(id, FavList) {
    if (FavList == '' || FavList == null) {
        $.cookie('ListFav', id, { expires: 90, path: '/' });
    } else {
        if (FavList.indexOf(id) > -1) {
            //alert("Sản phẩm đã tồn tại");
        }
        else {
            $.cookie('ListFav', FavList + "," + id, { expires: 90, path: '/' });
        }
    }
    ShowNumFav($.cookie('ListFav'));
    return false;

}

function RemoveFromFav(id) {
    var FavList = $.cookie('ListFav');
    if (FavList == null) {
        alert("Chưa có sản phẩm nào trong mục ưa thích.");
    } else {
        if (FavList.indexOf(id) > -1) {
            FavList = FavList.replace(',' + id, '');
            FavList = FavList.replace(id, '');
            FavList = FavList.replace(',,', ',');

            if (FavList.indexOf(",") == 0)
                FavList = FavList.substring(1);
            if (FavList != '')
                $.cookie('ListFav', FavList, { expires: 90, path: '/' });
            else {
                $.cookie('ListFav', null, { expires: -1, path: '/' });
            }
        }
        else {
            alert("Chưa có sản phẩm này trong mục ưa thích.");
        }
    }
    ShowNumFav($.cookie('ListFav'));

}

/*
Craete -HNG-
Load ajax nhung module nho cua shoptretho
--
*/

//--Function load left category
function LoadLeftCategory(_url, _ContainerID) {
    $.get(_url, function (data) {
        if (data != "") {
            $("#imgLoading").show();
            $("#" + _ContainerID).html(data);
            $("#imgLoading").hide();
        }
        else {
            $("#" + _ContainerID).html("Data is empty !");
        }
    });
}

/*  Product History recent
    
*/
// --Them cookie his
function AddToProHistory(pID, ListHistory) {
    if (ListHistory == '' || ListHistory == null) {
        $.cookie('cookieProductHistory', pID, { expires: 10, path: '/' });
    } else {
        //kiem tra xem pID da co trong cookie chua
        if (ListHistory.indexOf(pID) <= -1) {
            //neu ID chua co trong danh sach cookie truoc day thi them vao
            $.cookie("cookieProductHistory", ListHistory + "," + pID, { expires: 10, path: '/' });
        }
    }
}

// --Xoa cookie his
function RemoveFromProHistory(pID) {
    var historyList = $.cookie("cookieProductHistory");
    if (historyList != null) {
        if (historyList.indexOf(pID) > -1) {
            historyList = historyList.replace(',' + pID, '');
            historyList = historyList.replace(pID, '');
            historyList = historyList.replace(',,', ',');
            if (historyList.indexOf(',') == 0)
                historyList = historyList.substring(1);
            if (historyList != '')
                $.cookie('cookieProductHistory', historyList, { expires: 90, path: '/' });
            else {
                $.cookie('cookieProductHistory', null, { expires: -1, path: '/' });
            }
        }
        else {
            alert("Chưa có sản phẩm này trong lịch sử của bạn.");
        }
    }
}


/**
* $.ScrollTo - Easy element scrolling using $.
* Copyright (c) 2007-2009 Ariel Flesler - aflesler(at)gmail(dot)com | http://flesler.blogspot.com
* Dual licensed under MIT and GPL.
* Date: 5/25/2009
* @author Ariel Flesler
* @version 1.4.2
*
* http://flesler.blogspot.com/2007/10/$scrollto.html
*/
; (function (d) { var k = d.scrollTo = function (a, i, e) { d(window).scrollTo(a, i, e) }; k.defaults = { axis: 'xy', duration: parseFloat(d.fn.$) >= 1.3 ? 0 : 1 }; k.window = function (a) { return d(window)._scrollable() }; d.fn._scrollable = function () { return this.map(function () { var a = this, i = !a.nodeName || d.inArray(a.nodeName.toLowerCase(), ['iframe', '#document', 'html', 'body']) != -1; if (!i) return a; var e = (a.contentWindow || a).document || a.ownerDocument || a; return d.browser.safari || e.compatMode == 'BackCompat' ? e.body : e.documentElement }) }; d.fn.scrollTo = function (n, j, b) { if (typeof j == 'object') { b = j; j = 0 } if (typeof b == 'function') b = { onAfter: b }; if (n == 'max') n = 9e9; b = d.extend({}, k.defaults, b); j = j || b.speed || b.duration; b.queue = b.queue && b.axis.length > 1; if (b.queue) j /= 2; b.offset = p(b.offset); b.over = p(b.over); return this._scrollable().each(function () { var q = this, r = d(q), f = n, s, g = {}, u = r.is('html,body'); switch (typeof f) { case 'number': case 'string': if (/^([+-]=)?\d+(\.\d+)?(px|%)?$/.test(f)) { f = p(f); break } f = d(f, this); case 'object': if (f.is || f.style) s = (f = d(f)).offset() } d.each(b.axis.split(''), function (a, i) { var e = i == 'x' ? 'Left' : 'Top', h = e.toLowerCase(), c = 'scroll' + e, l = q[c], m = k.max(q, i); if (s) { g[c] = s[h] + (u ? 0 : l - r.offset()[h]); if (b.margin) { g[c] -= parseInt(f.css('margin' + e)) || 0; g[c] -= parseInt(f.css('border' + e + 'Width')) || 0 } g[c] += b.offset[h] || 0; if (b.over[h]) g[c] += f[i == 'x' ? 'width' : 'height']() * b.over[h] } else { var o = f[h]; g[c] = o.slice && o.slice(-1) == '%' ? parseFloat(o) / 100 * m : o } if (/^\d+$/.test(g[c])) g[c] = g[c] <= 0 ? 0 : Math.min(g[c], m); if (!a && b.queue) { if (l != g[c]) t(b.onAfterFirst); delete g[c] } }); t(b.onAfter); function t(a) { r.animate(g, j, b.easing, a && function () { a.call(this, n, b) }) } }).end() }; k.max = function (a, i) { var e = i == 'x' ? 'Width' : 'Height', h = 'scroll' + e; if (!d(a).is('html,body')) return a[h] - d(a)[e.toLowerCase()](); var c = 'client' + e, l = a.ownerDocument.documentElement, m = a.ownerDocument.body; return Math.max(l[h], m[h]) - Math.min(l[c], m[c]) }; function p(a) { return typeof a == 'object' ? a : { top: a, left: a} } })($);


//Them moi mot cookie
function AddCookieInToClient(urlHistory, ProID) {
    //alert(urlHistory + " ----------" + ProID);
    //var urlHistory = '<%=ResolveUrl("~/Pages/Ajax/GetCookieHistory.ashx") %>?timespan=' + Number(new Date());
    //'<%=proid %>'
    //alert(ProID);
    var listHis = '';
    $.ajax({
        url: urlHistory,
        success: function (data) {
            if (data === '' || typeof data != "string") {
                AddToProHistory(ProID, '');
            } else {
                listHis = data;
                AddToProHistory(ProID, listHis);
            }
        }

    });
}




//load cac hieu ung hinh anh trong chi tiet san pham
function LoadProductImage() {
    $('.cloud-zoom, .cloud-zoom-gallery').CloudZoom();
    //bat ra lightbox khi kich vao anh thumb
    $(".cloud-zoom-gallery").colorbox({ rel: 'cloud-zoom-gallery', width: "500px", height: "500px" });
    //khi di chuot vao anh thumb se doi mau border cua anh thumb ngay ca khi di chuot ra ngoai
    $("#Carousel-wrap .imgThumbZoom").hover(function () {
        //$(this).css('border','1px solid #666');
        //var strItem='Thumbnail '+parseInt($('#Carousel-wrap .imgThumbZoom').index(this)+1);
        var strItem = $(this).attr('alt');
        $(this).css('border', '1px solid #F36125');
        //$(':not(img[alt$=' + strItem + ']').css('border', '1px solid #e9e9e9');
        //alert(strItem);
        $("#Carousel-wrap .imgThumbZoom").each(function () {
            var ItemData = $(this).attr('alt');
            if (strItem != ItemData) {
                $(this).css('border', '1px solid #e9e9e9');
            }
        });
    });


    //con day la cai next anh? ne
    //$('ul#basic_config').carouFredSel();
    $('ul#Carousel-wrap').carouFredSel({
        auto: false,
        prev: "#prev-carousel",
        next: "#next-carousel",
        items: {
            visible: 3
        }
        //scroll: "linear"
        //pagination: true
        //effect: "fade"
        //wrap: "first"
    });
}

function GetListShoppingCart(Url, Container) {
    var _cmdContainer = $(Container);
    var strContent = _cmdContainer.text();

    $.get(Url, function (data) {
        if (data != "") {
            _cmdContainer.html(data);
        }
        else {
            _cmdContainer.html('Giỏ hàng lỗi');
        }
    });
}

function GetDataProductHome(url, Contianter) {

    $.get(url, function (data) {
        if (data != '' && data != undefined) {
            Contianter.html(data);
        }
    });
}
function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}

function ShowBox(chk, className) {
    $('#' + className).show();
    $('.overlayNonev2').show();
    /*Can giua box-login*/
    fixCenterBox();
    $('.box-login .box-login-content h1 i').click(function () {
        HideBox();
    });
    //hide box OneClickCart
    $('.btnBackToProductDetail').click(function () {
        HideBox();
    });

    //link sang list order
    $('.btnPaymentNow').click(function () {
        location.href = "/lvn-product-cart.aspx";
    });

    if (chk) {
        $('.overlayNonev2').unbind('click');
    } else {
        $('.overlayNonev2').click(function () {
            HideBox();
        });
    }
}
function HideBox() {
    $('.box-login').hide();
    $('.overlayNonev2').hide();
}
function fixCenterBox() {
    var kichThuocBrowser = $(window).width();
    var kichThuocBoxLogin = $('.box-login').outerWidth();
    var FixLeft = (kichThuocBrowser - kichThuocBoxLogin) / 2;
    var FixTop = parseInt($(window).scrollTop()) + 150;
    $('.box-login').css({ left: FixLeft });
    $('.box-login').css({ top: FixTop });
}

function resizeBannerHome() {
    if ($(window).width() <= 1300) {
        $('.bannersrcollleft').hide();
        $('.bannersrcollright').hide();
    }
    else {
        $('.bannersrcollleft').show();
        $('.bannersrcollright').show();
    }
}

function textBlurInput(_cmd,txt) {
    var cmd = $(_cmd);
    if (cmd.val() == txt || cmd.val() == '') {
        cmd.removeClass('inputFocus44');
    }
    else {
        cmd.addClass('inputFocus44');
        
    }
}


//--slide content v2 dung cho admin
$(document).ready(function () {
    $("#slide-panel-v2 .s-content:not(:first)").hide();
    $("#slide-panel-v2 h3").click(function () {
        $("#slide-panel-v2 .s-content:visible").slideUp("fast");
        $(".slide-active").removeClass("slide-active");
        $(".textNau").removeClass("textNau");
        if ($(this).next(".s-content").is(":hidden") == true) {
            //--active anh cho title
            $(this).addClass("slide-active");
            //-active mau cho title            
            $(this).addClass("textNau");
            $(this).next(".s-content").slideDown("fast");
        } else {
            $(this).next(".s-content").slideUp("fast");
        }
    });
    $('.navBox').hover(function () {
        $(this).toggleClass('activeBoxTab');
        $(this).find('.nav-content-hide').stop(true, true).toggle();
    });	$('.p-item-list').each(function() {
		var marginh2 = 980 - $(this).find('h2').width() - 10;
		$(this).find('i:eq(0)').css({ "width": marginh2, "margin-left": $(this).find('h2').width() + 10 });
	});
});
function ShowLoading() {
    var element = $('body');
    if (element.length > 0) {
        element.append("<div class='loading-icon' style='position: fix'></div>");
        element.css("position", "relative");
    }
}

function HideLoading() {
    var element = $('body');
    if (element.length > 0) {
        element.find(".loading-icon").remove();
    }
}
