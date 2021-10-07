var $ = jQuery;
function daysCounter(e) {
    for ($(".mail-block__days").html(""), currentDay = 1; currentDay <= e; currentDay++) $(".mail-block__days").append('<span class="custom-dropdown__item">' + currentDay + "</span>");
}
$(".news-subscription__form").removeAttr("novalidate"), daysCounter(31);
const monthNumber = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
    locale = "da-DK",
    currentYear = new Date();
monthNumber.map((e) => {
    const a = new Date(`${e}/1/${currentYear.getFullYear()}`).toLocaleString(locale, {month: "long"});;
    $(".mail-block__monthes").append('<span data-month="' + e + '" data-id="' + e + '" class="custom-dropdown__item">' + a + "</span>");
}),
    $(".mail-block__monthes .custom-dropdown__item").click(function () {
        $(this).closest(".custom-select-block").find(".custom-select-block__value");
        const e = $(this).data("month");
        daysCounter(new Date(currentYear.getFullYear(), e, 0).getDate()), customSelect();
    });
const date = new Date();
for (let e = date.getFullYear() - 30; e <= date.getFullYear(); e++) $(".mail-block__years").append('<span data-year="' + e + '" class="custom-dropdown__item">' + e + "</span>");
function hideAllMenus() {
    $(".header__mobile-menu-container .navigation__submenu").removeClass("open"),
        $(".navigation .active").removeClass("active"),
        $(".navigation__menu-wrapper .navigation__menu > li > .navigation__submenu").slideUp(),
        $(".masked").removeClass("masked"),
        $(".open").removeClass("open"),
        $("body").removeClass("open-menu"),
        $(".custom-dropdown").fadeOut();
}
function customSelect() {
    const e = $(".custom-select-block").find(".selected");
    e.length && e.closest(".custom-select-block").find(".custom-select-block__value").text(e.text()),
        $(".custom-select-block").click(function (e) {
            if ($(e.target).hasClass("custom-dropdown__item")) return hideAllMenus();
            !$(e.target).closest(".open").length && $(".open").length && hideAllMenus(), $(this).find(".custom-dropdown").fadeIn(), $(this).addClass("open");
        }),
        $(".custom-dropdown__item").click(function () {
            const e = $(this).closest(".custom-select-block"),
                t = e.find(".selected"),
                a = e.find(".custom-select-block__value"),
                s = e.find("input");
            t.length && t.removeClass("selected"),
                $(this).attr("data-id") ? s.val($(this).attr("data-id")).trigger("change") : s.val($(this).text()).trigger("change"),
                e.hasClass("load") ? a.text("Please wait...") : a.text($(this).text()),
                $(this).addClass("selected");
        }),
        $(".custom-dropdown").click(function (e) {
            const t = $(this).find(".calendar"),
                a = $(e.target).hasClass("day");
            t.length && a && setTimeout(hideAllMenus);
        });
}
if (
    ($(document).click(function (e) {
        e.stopPropagation(), $(e.target).closest(".custom-select-block").length || ($(".custom-dropdown").fadeOut(), $(".custom-select-block").removeClass("open")), $(e.target).hasClass("masked") && hideAllMenus();
    }),
    $(".header__mobile-menu-button").click(function () {
        $(".header__mobile-menu").addClass("open"), $(".main-block").addClass("masked"), $("body").addClass("open-menu");
    }),
    $(".header__mobile-menu-close").click(function (e) {
        e.preventDefault(), hideAllMenus();
    }),
    $(".navigation__submenu__close").click(function () {
        $(".header__mobile-menu-container .navigation__submenu").removeClass("open");
    }),
    $(".header__mobile-menu-container .navigation__submenu-mobile").click(function (e) {
        e.preventDefault(), $(".main-block").addClass("masked"), $(this).closest("li").find(".navigation__submenu").addClass("open");
    }),
    customSelect(),
    $(".tabs-container-mobile__selected").length)
) {
    const e = $(".tabs-container-mobile__selected").siblings(".tabs-container-mobile__options").find(".active").text();
    $(".tabs-container-mobile__selected").text(e);
}
$(".tab-item").click(function () {
    if (!$(this).hasClass("active")) {
        const e = $(this).data("tab"),
            t = $(this).closest(".tabs").find(".tabs-container"),
            a = $(this).closest(".tabs").find(".tabs-container-mobile");
        if (
            (t.is(":visible")
                ? (t.find(".active").removeClass("active"), $(this).closest(".tabs").find(".tabs-container-mobile:hidden").find(".active").removeClass("active"))
                : (a.find(".active").removeClass("active"), $(this).closest(".tabs").find(".tabs-container:hidden").find(".active").removeClass("active")),
            $(`[data-tab="${e}"]`).addClass("active"),
            $(this).closest(".tabs").find(".show").removeClass("show"),
            $(`#${e}`).addClass("show"),
            a.is(":visible"))
        ) {
            const e = $(this).closest(".tabs").find(".tabs-container-mobile__selected").siblings(".tabs-container-mobile__options").find(".active").text();
            $(this).closest(".tabs").find(".tabs-container-mobile__selected").text(e);
        } else {
            const e = $(this).closest(".tabs").find(".tabs-container-mobile__selected:hidden").siblings(".tabs-container-mobile__options").find(".active").text();
            $(this).closest(".tabs").find(".tabs-container-mobile__selected:hidden").text(e);
        }
    }
}),
    $(".tabs-container-mobile").click(function (e) {
        if ($(e.target).hasClass("tab-item")) return hideAllMenus();
        !$(e.target).closest(".open").length && $(".open").length && hideAllMenus(), $(this).addClass("open");
    });
const defaultSettings = {
        lazyLoad: "ondemand",
        mobileFirst: !0,
        dots: !0,
        slidesToShow: 1,
        adaptiveHeight: !0,
        nextArrow:
            '<button class="slick-next"><svg xmlns="http://www.w3.org/2000/svg" width="23.248" height="22.828" viewBox="0 0 23.248 22.828">\n  <g id="arrow-left" transform="translate(27.833 27.414) rotate(180)">\n    <g id="Сгруппировать_86" data-name="Сгруппировать 86" transform="translate(6 6)">\n      <path id="Контур_52" data-name="Контур 52" d="M26.833,16H6m0,0L16,6M6,16,16,26" transform="translate(-6 -6)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>\n    </g>\n  </g>\n</svg>\n</button>',
        prevArrow:
            '<button class="slick-prev"><svg xmlns="http://www.w3.org/2000/svg" width="23.248" height="22.828" viewBox="0 0 23.248 22.828">\n  <g transform="translate(1.414 1.414)">\n    <path  d="M26.833,16H6m0,0L16,6M6,16,16,26" transform="translate(-6 -6)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>\n  </g>\n</svg></button>',
    },
    defaultResponsive = [{ breakpoint: 992, settings: "unslick" }],
    responsiveTvList = [{ breakpoint: 440, settings: { slidesToShow: 2 } }, { breakpoint: 768, settings: { slidesToShow: 1 } }, ...defaultResponsive];
$(".last-articles__list > div").length > 1 && $(".last-articles__list, .blogs__list").slick({ ...defaultSettings, responsive: defaultResponsive }),
    $(".article__item".length > 1) && $(".slick-article-slider").slick({ ...defaultSettings, responsive: defaultResponsive }),
    $(".last-articles__list").on("lazyLoaded", function () {
        setTimeout(() => {
            const e = $(".last-articles__list .slick-active .last-articles__item").height();
            $(".last-articles__list .slick-list draggable, .slick-list").height(e);
        }, 300);
    }),
    $(".tv-list__container").slick({ ...defaultSettings, responsive: responsiveTvList });
const inputTypes = ".custom-input input, .custom-textarea textarea";
function checkFilledInputs() {
    $(inputTypes).each(function () {
        ($label = $(this).closest(".custom-input, .custom-textarea").find("label")), $(this).val() && $label.addClass("filled");
    });
}
function scrollProgress() {
    if ($("#progressBar").length) {
        const e = ((document.body.scrollTop || document.documentElement.scrollTop) / (document.documentElement.scrollHeight - document.documentElement.clientHeight)) * 100;
        $("#progressBar").css("width", e + "%");
    }
}
if (
    (checkFilledInputs(),
    $(inputTypes).focus(function () {
        ($label = $(this).closest(".custom-input, .custom-textarea").find("label")), $label.addClass("filled focused");
    }),
    $(inputTypes).blur(function () {
        ($label = $(this).closest(".custom-input, .custom-textarea").find("label")), $label.removeClass("focused"), $(this).val() || $label.removeClass("filled");
    }),
    $(".single .article__description iframe").each(function () {
        const e = $(this).attr("data-src");
        if (e) {
            const t = e.split("/"),
                a = t[t.length - 1];
            $(
                `<div class="youtube-preview">\n            <img class="youtube-preview__thumbnail" src="https://img.youtube.com/vi/${a}/0.jpg">\n            <img class="youtube-preview__control" src="${location.protocol}//${location.hostname}/wp-content/themes/min-mave-theme/assets/img/play.svg" alt="">\n        </div>`
            ).insertAfter(this),
                $(this).hide();
        }
    }),
    $(".youtube-preview").click(function () {
        $(this).hide(), $(this).prev("iframe").show();
    }),
    $("form.validate").submit(function (e) {
        e.preventDefault();
    }),
    $.validator.addMethod(
        "user_name",
        function (e, t) {
            return /^\S*$/.test(e);
        },
        "Please specify the correct user name"
    ),
    $.validator.addMethod(
        "file_format",
        function (e, t) {
            return this.optional(t) || readURL(t);
        },
        ""
    ),
    $("form.validate").each(function () {
        $(this).validate({
            errorElement: "span",
            ignore: ".ignore",
            rules: {
                log: { required: !0, minlength: 3 },
                data_Fornavn: { required: !0, minlength: 3 },
                user_login: { required: !0, user_name: !0, minlength: 3 },
                pwd: { required: !0 },
                day: { required: !0 },
                month: { required: !0 },
                user_email: { required: !0, email: !0, minlength: 3 },
                email: { required: !0, email: !0, minlength: 3 },
                email_address: { required: !0, email: !0, minlength: 3 },
                "email-input-gravitis": { required: !0, email: !0, minlength: 3 },
                childname: { required: "#harikke:not(:checked)", minlength: 3 },
                gender: { required: !0 },
                photourl: { required: !0, file_format: !0 },
            },
            messages: {
                log: { required: "Dette felt er påkrævet" },
                user_login: { required: "Dette felt er påkrævet" },
                data_Fornavn: { required: "Dette felt er påkrævet" },
                email: { required: "Dette felt er påkrævet", email: "Forkert e-mail-adresse" },
                "email-input-gravitis": { required: "Dette felt er påkrævet", email: "Forkert e-mail-adresse" },
            },
            showErrors: function (e, t) {
                this.defaultShowErrors(),
                    $(this).find('[type="submit"]').attr("disabled", "disabled"),
                    t.forEach((e) => {
                        $(e.element).prev().prev().addClass("label-error"), $(e.element).prev().addClass("label-error"), $(e.element).addClass("input-error");
                    });
            },
            success: function (e) {
                e.prev().prev().prev().removeClass("label-error"), e.prev().prev().removeClass("label-error"), e.prev().removeClass("input-error");
            },
            invalidHandler: function () {
                const e = $(this).find(".custom-select-block");
                setTimeout(() =>
                    e.each(function () {
                        $(this).find(".error").length && $(this).addClass("has-error");
                    })
                );
            },
            submitHandler: function (e) {
                const t = $(e).find(".calendar-input");
                if (t.length) {
                    let a = {};
                    isNaN(Date.parse(t.find("input").val()))
                        ? (t.find(".error").text("Ugyldig dato"), t.addClass("input-error"), (a = { message: "Ugyldig dato", element: t }))
                        : (t.find(".error").text(""), t.removeClass("input-error"), e.submit());
                } else e.submit();
            },
            errorPlacement: function (e, t) {
                t.is(":radio") ? e.appendTo(t.parents(".radio-container")) : e.insertAfter(t);
            },
        });
    }),
    $("#harikke").change(function () {
        $(this).prop("checked") ? ($("#usrchildname").attr("disabled", "disabled"), $("#usrchildname").removeClass("input-error"), $("#usrchildname-error").text("")) : $("#usrchildname").removeAttr("disabled");
    }),
    $('[name="date"]').change(function (e) {}),
    $(document).scroll(function (e) {
        $(e.target).scrollTop() > 150 ? $(".go-to.top, .progress-container").addClass("show") : $(".go-to.top, .progress-container").removeClass("show");
    }),
    $('.go-to, [href="#new-post"]').click(function () {
        let e = 0;
        if ($(this).hasClass("target") || "#new-post" === $(this).attr("href")) {
            const t = $(this).attr("href").substr(1),
                a = $(`#${t}`);
            e = a ? a.offset().top - 100 : 0;
        }
        return $("body,html").animate({ scrollTop: e }, 400), !1;
    }),
    (window.onscroll = function () {
        scrollProgress();
    }),
    $(".fotorama").length && $(".fotorama").fotorama({ width: "100%", maxwidth: "100%", margin: 20, ratio: 4 / 3, allowfullscreen: !0, nav: "thumbs" }),
    $(window).scroll(function () {
        if ($(window).width() > 768) {
            const e = $(".header").outerHeight();
            $(window).scrollTop() > 50 ? ($(".header").addClass("sticky"), $("body").css("padding-top", e)) : ($(".header").removeClass("sticky"), $("body").css("padding-top", 0)),
                $(window).scrollTop() >= 200 ? ($(".sticky").addClass("show"), $(".progress-container.show").css("top", e)) : ($(".sticky").removeClass("show"), $(".progress-container").css("top", "-100%"));
        }
    }),
    $(".range-slider").length)
) {
    const e = void 0 !== $(".range-slider").data("min") ? $(".range-slider").data("min") : 1,
        t = $(".range-slider").data("max") || 40;
    $(".range-slider").slider({
        min: e,
        max: t,
        create: function () {
            const e = $(this).closest(".range-slider__wrapper").find(".range-slider__amount"),
                t = $(this).closest(".range-slider__wrapper").find('input[type="hidden"]');
            e.text($(this).slider("value")), t.val($(this).slider("value"));
        },
        slide: function (e, t) {
            const a = $(this).closest(".range-slider__wrapper").find(".range-slider__amount"),
                s = $(this).closest(".range-slider__wrapper").find('input[type="hidden"]');
            a.text(t.value), s.val(t.value);
        },
    });
}
$(".ovulation-calc__form #calculate_ovulation").click(function (e) {
    e.preventDefault();
    const t = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    if ($("[name='date']").val()) {
        $(".ovulation-calc__error").addClass("d-none"), $(".ovulation-calc__placeholder").addClass("d-none");
        var a = new Date($("[name='date']").val()),
            s = new Date(a),
            n = new Date(a),
            i = new Date(a),
            l = new Date(a),
            o = $("[name='days']").val();
        s.setDate(a.getDate() + parseInt(o)),
            parseInt(o) < 28 && n.setDate(a.getDate() + 279),
            parseInt(o) > 28 && n.setDate(a.getDate() + 279 + parseInt(o) - 28),
            i.setDate(a.getDate() + parseInt(12)),
            l.setDate(a.getDate() + parseInt(16)),
            $("#best_date").html(s.getDate() + ". " + t[s.getMonth()] + " " + s.getFullYear()),
            $("#end_date").html(n.getDate() + ". " + t[n.getMonth()] + " " + n.getFullYear()),
            $("#interval").html(i.getDate() + ". " + t[i.getMonth()] + " " + i.getFullYear() + " - " + l.getDate() + ". " + t[l.getMonth()] + " " + l.getFullYear()),
            $(".ovulation-calc__results").removeClass("d-none");
    } else $(".ovulation-calc__results").addClass("d-none"), $(".ovulation-calc__error").removeClass("d-none");
    "none" === $(".ovulation-calc__data").css("display") && ($(".ovulation-calc__input-data").toggle(), $(".ovulation-calc__data").toggle(), $(".ovulation-calc__submit").toggle());
}),
    $(".ovulation-calc__results-back").click(function () {
        $(".ovulation-calc__input-data").toggle(), $(".ovulation-calc__data").toggle(), $(".ovulation-calc__submit").toggle();
    }),
    $(".ovulation-calc__form #calculate_duedate").click(function (e) {
        e.preventDefault();
        const t = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            a = $("[name='date']").val();
        if (a) {
            $(".ovulation-calc__error").addClass("d-none"), $(".ovulation-calc__placeholder").addClass("d-none");
            let e = new Date(a),
                s = new Date(e),
                n = new Date(e),
                i = new Date(e),
                l = new Date(e),
                o = new Date(e),
                r = new Date(e),
                c = new Date(e),
                d = new Date(e),
                u = $("[name='days_one']").val(),
                m = ($("[name='days_two']").val(), new Date());
            s.setDate(e.getDate() + parseInt(u) - 17),
                n.setDate(e.getDate() + parseInt(39)),
                i.setDate(e.getDate() + parseInt(80)),
                l.setDate(e.getDate() + parseInt(87)),
                (o = Math.ceil(Math.abs(e.getTime() - m.getTime()) / 864e5)),
                r.setDate(e.getDate() + parseInt(136)),
                c.setDate(e.getDate() + parseInt(266)),
                d.setDate(e.getDate() + parseInt(238)),
                $("#fertilization").html(s.getDate() + ". " + t[s.getMonth()] + " " + s.getFullYear()),
                $("#fetus_most_vulnerable").html(n.getDate() + ". " + t[n.getMonth()] + " " + n.getFullYear() + " - <br /> " + i.getDate() + ". " + t[i.getMonth()] + " " + i.getFullYear()),
                $("#risk").html(l.getDate() + ". " + t[l.getMonth()] + " " + l.getFullYear()),
                $("#yuo_are_now").html(~~(o / 7) + " weeks + " + (o % 7) + " days"),
                $("#may_start").html(r.getDate() + ". " + t[r.getMonth()] + " " + r.getFullYear()),
                $("#expected_term").html(c.getDate() + ". " + t[c.getMonth()] + " " + c.getFullYear()),
                $("#maternity_starts_around").html(d.getDate() + ". " + t[d.getMonth()] + " " + d.getFullYear()),
                $(".ovulation-calc__results").removeClass("d-none");
        } else $(".ovulation-calc__results").addClass("d-none"), $(".ovulation-calc__error").removeClass("d-none");
        "none" === $(".ovulation-calc__data").css("display") && ($(".ovulation-calc__input-data").toggle(), $(".ovulation-calc__data").toggle(), $(".ovulation-calc__submit").toggle());
    });
const $checkbox = $(".topic-edit .bbp-form input#bbp_log_topic_edit");
$($checkbox).is(":checked") ? $("#bbp_topic_edit_reason").removeAttr("disabled") : $("#bbp_topic_edit_reason").attr("disabled", "disabled"),
    $checkbox.click(function () {
        $(this).is(":checked") ? $("#bbp_topic_edit_reason").removeAttr("disabled") : $("#bbp_topic_edit_reason").attr("disabled", "disabled");
    }),
    $(document).on("closing", ".remodal", function () {
        $("#report_post_msg").val("");
    }),
    $(".child-edit").on("click", function (e) {
        e.preventDefault(),
            $(".my-children__form").show(),
            $("#child_id").val($(this).data("id")),
            $("#usrchildname").val($(this).data("skjusrchildnameuldette")),
            $("#birth-date").val($(this).data("termin")),
            $(".calendar-value").html($(this).data("calendar")),
            $("#profilbillede").attr("src", $(this).data("profilbillede")),
            $("#profilbillede").show(),
            "pige" == $(this).data("kon") ? $("#pige").attr("checked", "checked") : "dreng" == $(this).data("kon") ? $("#dreng").attr("checked", "checked") : $("#ukendt").attr("checked", "checked"),
            $(this).data("harikke") ? $("#harikke").prop("checked", !0) : $("#harikke").prop("checked", !1),
            $(this).data("skjuldette") ? $("#hidden").prop("checked", !0) : $("#hidden").prop("checked", !1),
            $(this).data("jegvil") ? $("#mails").prop("checked", !0) : $("#mails").prop("checked", !1),
            $("#usrchildname").val($(this).data("name")),
            checkFilledInputs();
    }),
    $("#new-child").on("click", function (e) {
        e.preventDefault(),
            $(".my-children__form").show(),
            $(":input", "#children_form").not(":button, :submit, :reset, :hidden").val("").prop("checked", !1).prop("selected", !1),
            $("#action").val("create"),
            checkFilledInputs(),
            $("#ukendt").attr("checked", "checked");
    });
const readURL = (e) => {
    if (e.files && e.files[0]) {
        const t = $(e).closest(".custom-file").find(".error"),
            a = $(e).closest(".custom-file").find(".custom-validation-error");
        t.text(""), a.text("");
        const s = e.files[0],
            n = s.type ? s.type.split("/")[1] : "",
            i = ["GIF", "JPG", "JPEG", "PNG"].some((e) => e.toLowerCase() === n.toLowerCase()) && s.size / 1024 < 5120;
        return i || a.text("Tilføj venligst en korrekt fil"), i;
    }
};
$('[type="file"]').change(function () {
    const e = readURL(this),
        t = $(this).closest(".custom-file").find(".preview");
    if (e && this.files && this.files[0]) {
        const e = new FileReader();
        (e.onload = (e) => {
            t.css("display", "block"), t.attr("src", e.target.result);
        }),
            e.readAsDataURL(this.files[0]);
    } else t.attr("src", ""), t.hide();
}),
    $(".navigation__search-close").click(function () {
        const e = $(this).closest(".clear-value");
        (e && e.find("input")).val("");
    });
var page = 2;
$(".names-widget-filter__advanced").click(function () {
    $(this).closest(".advanced-block").find(".names-widget-filter__advanced-block").first().slideToggle();
}),
    $("#close-popup").click(function () {
        $(".message-popup-wrapper").addClass("d-none");
    });
