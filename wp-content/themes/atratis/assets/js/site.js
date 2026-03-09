AOS.init({
  disable: window.innerWidth < 1024,
});

function toggleNave() {
  const $btn = jQuery("#menuBtn");
  const $sidenav = jQuery("#mySidenav");

  if ($btn.hasClass("active")) {
    $btn.removeClass("active");
    $sidenav.css("right", "-100%");
  } else {
    $btn.addClass("active");
    $sidenav.css("right", 0);
  }
}

function closeNave() {
  document.getElementById("mySidenav").style.right = "-100%";
}

function openNave2() {
  document.getElementById("mySidenav2").style.right = "0";
}
function closeNave2() {
  document.getElementById("mySidenav2").style.right = "-100%";
}

function openNave3() {
  document.getElementById("mySidenav3").style.right = "0";
}
function closeNave3() {
  document.getElementById("mySidenav3").style.right = "-100%";
}

// $('.launch-modal').on('click', function(e){
//     e.preventDefault();
//     $( '#' + $(this).data('modal-id') ).modal();
// });

$(".launch-modal").on("click", function (e) {
  e.preventDefault();
  {
    var $modalElement = $("#" + $(this).data("modal-id"));
    $modalElement.modal();
    var $iframe = $modalElement.find("iframe")[0];
    $modalElement.on("hide.bs.modal", function (e) {
      $iframe.src = $iframe.src;
    });
  }
});
//
// jQuery('.sidenav a').click(function(){
//     jQuery('#mySidenav').css("width", "0");
// });

$(window).resize(function () {
  /*Bind an event handler to the "resize"*/ if (
    $(window).width() > 480 ||
    $(window).height() > 480
  ) {
    $(".dropdown-toggle").click(function () {
      if ($(this).next().is(":visible")) {
        location.href = $(this).attr("href");
      }
    });
  }
});

jQuery("a[href*=#]:not([href=#])").click(function () {
  if (
    location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") &&
    location.hostname == this.hostname
  ) {
    var target = jQuery(this.hash);
    target = target.length
      ? target
      : jQuery("[name=" + this.hash.slice(1) + "]");
    if (target.length) {
      jQuery("html,body").animate(
        {
          scrollTop: target.offset().top,
        },
        1500
      );
      return false;
    }
  }
});

jQuery(document).ready(function () {
  //VIDEO MODAL
  jQuery(".js-video-button").click(function (e) {
    e.preventDefault();
  });

  jQuery(".js-video-button").modalVideo();

  jQuery(".launch-modal").on("click", function (e) {
    e.preventDefault();
    jQuery("#" + jQuery(this).data("modal-id")).modal();
  });

  jQuery(".close").click(function () {
    jQuery(".bt-mod iframe").attr("src", jQuery(".bt-mod iframe").attr("src"));
  });

  jQuery(".fade ").click(function () {
    jQuery(".bt-mod iframe").attr("src", jQuery(".bt-mod iframe").attr("src"));
  });

  jQuery("#telefone").mask("(99) 99999-9999");

  jQuery(".mob_header span").click(function (event) {
    if (!jQuery(this).parent().hasClass("dropdown"))
      jQuery(".in").collapse("hide");
  });

  function fecharMenu() {
    jQuery("#menufull").removeClass("aberta");
  }

  function fecharPesquisa() {
    jQuery("#searchfull").removeClass("aberta");
  }

  jQuery(".fechar_menu").click(function () {
    fecharMenu();
  });

  jQuery(".botao_menu").click(function () {
    if (jQuery("#menufull").hasClass("aberta")) {
      fecharMenu();
      jQuery("#corpo").removeClass("fix");
    } else {
      jQuery("#menufull").addClass("aberta");
      jQuery("#corpo").addClass("fix");
    }
  });

  jQuery(".fechar_section").click(function () {
    fecharMenu();
    fecharPesquisa();
    jQuery("#corpo").removeClass("fix");
  });

  jQuery(".botao_pesquisa").click(function () {
    if (jQuery("#searchfull").hasClass("aberta")) {
      fecharPesquisa();
      jQuery("#corpo").removeClass("fix");
    } else {
      jQuery("#searchfull").addClass("aberta");
      jQuery("#corpo").addClass("fix");
    }
  });

  document.querySelector("body").addEventListener("keydown", function (event) {
    var tecla = event.keyCode;

    if (tecla == 27) {
      fecharMenu();
      fecharPesquisa();
      jQuery(".pesquisa_full").removeClass("on");
      jQuery("#corpo").removeClass("fix");

      jQuery(".box_promocao").css({ display: "none" });
      jQuery(".infos").css({ display: "block" });

      jQuery("#mascara_transparencia").css({ display: "none" });
    }
  });

  jQuery(function () {
    // Initialize the gallery
    jQuery(".thumbs a").touchTouch();
    // jQuery(".blocks-gallery-item a").touchTouch();
  });

  //   galeria.setAttribute("data-fancybox", "gallery", galeria);

  //   console.log(galeria);

  var galeria = document.querySelectorAll(".blocks-gallery-item a");
  console.log("test1 length || " + galeria.length);

  for (var i = 0; i < galeria.length; i++) {
    console.log("test1||" + i);
    galeria[i].setAttribute("data-fancybox", "images");
  }

  jQuery(".abrir_pesquisa").click(function () {
    jQuery(".pesquisa_full").addClass("on");
    document.getElementById("label_for").click();
  });

  jQuery(".fechar_pesquisa").click(function () {
    jQuery(".pesquisa_full").removeClass("on");
  });

  // Hide Header on on scroll down
  var didScroll;
  var lastScrollTop = 0;
  var delta = 5;
  var navbarHeight = jQuery("header").outerHeight();

  jQuery(window).scroll(function (event) {
    didScroll = true;
  });

  setInterval(function () {
    if (didScroll) {
      hasScrolled();
      didScroll = false;
    }
  }, 250);

  function hasScrolled() {
    var st = jQuery(this).scrollTop();

    if (Math.abs(lastScrollTop - st) <= delta) return;

    if (st > lastScrollTop && st > navbarHeight) {
      // Scroll Down
      jQuery("header").removeClass("fixa").addClass("normal");
    } else {
      // Scroll Up
      if (st + jQuery(window).height() < jQuery(document).height()) {
        jQuery("header").removeClass("normal").addClass("fixa");
      }
    }

    var top_offset = jQuery(window).scrollTop();
    if (top_offset == 0) {
      jQuery("header").removeClass("fixa fade-in");
    } else {
      jQuery("header").addClass("menu-fixo");
    }

    lastScrollTop = st;
  }
});

jQuery(".owl-carousel-banner").owlCarousel({
  loop: true,
  margin: 0,
  dots: true,
  nav: false,
  autoplay: true,
  autoplayTimeout: 5000,
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 1,
    },
    1000: {
      items: 1,
    },
  },
});

jQuery(".owl-servicos").owlCarousel({
  loop: true,
  margin: 0,
  dots: true,
  nav: false,
  autoplay: true,
  autoplayTimeout: 5000,
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 1,
    },
    1000: {
      items: 1,
    },
  },
});

jQuery(".owl-logos").owlCarousel({
  loop: false,
  margin: 20,
  dots: false,
  nav: true,
  smartSpeed: 900,
  navText: [
    "<i class='fa fa-chevron-left'></i>",
    "<i class='fa fa-chevron-right'></i>",
  ],
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 2,
    },
    1000: {
      items: 6,
    },
  },
});

jQuery(".owl-carousel-mobile").owlCarousel({
  loop: false,
  margin: 0,
  dots: true,
  nav: false,
  autoplay: true,
  autoplayTimeout: 5000,
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 1,
    },
    1000: {
      items: 1,
    },
  },
});

jQuery(".owl-galeria-full").owlCarousel({
  loop: true,
  margin: 10,
  nav: false,
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 2,
    },
    1000: {
      items: 4,
    },
    1400: {
      items: 5,
    },
  },
});

$(".owl-carousel-conheca").owlCarousel({
  loop: false,
  margin: 20,
  dots: false,
  nav: true,
  smartSpeed: 900,
  navText: [
    "<i class='fa fa-chevron-left'></i>",
    "<i class='fa fa-chevron-right'></i>",
  ],
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 2,
    },
    1201: {
      items: 3,
    },
  },
});

jQuery(".owl-depoimentos").owlCarousel({
  loop: true,
  margin: 20,
  nav: false,
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 2,
    },
    1000: {
      items: 3,
    },
  },
});

jQuery(".owl-solucoes-mod2").owlCarousel({
  loop: true,
  margin: 20,
  nav: false,
  responsive: {
    0: {
      items: 1,
    },
    650: {
      items: 2,
    },
    900: {
      items: 3,
    },
    1200: {
      items: 4,
    },
  },
});

jQuery(".owl-padrao").owlCarousel({
  loop: false,
  margin: 20,
  dots: false,
  nav: true,
  smartSpeed: 900,
  navText: [
    "<i class='fa fa-chevron-left'></i>",
    "<i class='fa fa-chevron-right'></i>",
  ],
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 3,
    },
    1000: {
      items: 3,
    },
  },
});

jQuery(".owl-clientes").owlCarousel({
  loop: false,
  margin: 20,
  dots: false,
  nav: true,
  smartSpeed: 900,
  navText: [
    "<i class='fa fa-chevron-left'></i>",
    "<i class='fa fa-chevron-right'></i>",
  ],
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 3,
    },
    1000: {
      items: 5,
    },
  },
});

$(document).ready(function () {
  $(".dropdown-menu a.dropdown-toggle").on("click", function (e) {
    var $el = $(this);
    var $parent = $(this).offsetParent(".dropdown-menu");
    if (!$(this).next().hasClass("show")) {
      $(this)
        .parents(".dropdown-menu")
        .first()
        .find(".show")
        .removeClass("show");
    }
    var $subMenu = $(this).next(".dropdown-menu");
    $subMenu.toggleClass("show");

    $(this).parent("li").toggleClass("show");

    $(this)
      .parents("li.nav-item.dropdown.show")
      .on("hidden.bs.dropdown", function (e) {
        $(".dropdown-menu .show").removeClass("show");
      });

    if (!$parent.parent().hasClass("navbar-nav")) {
      $el.next().css({ top: $el[0].offsetTop, left: $parent.outerWidth() - 4 });
    }

    return false;
  });
});

// makes the parallax elements
function parallaxIt() {
  // create variables
  var $fwindow = $(window);
  var scrollTop = window.pageYOffset || document.documentElement.scrollTop;

  // on window scroll event
  $fwindow.on("scroll resize", function () {
    scrollTop = window.pageYOffset || document.documentElement.scrollTop;
  });

  // for each of content parallax element
  $('[data-type="content"]').each(function (index, e) {
    var $contentObj = $(this);
    var fgOffset = parseInt($contentObj.offset().top);
    var yPos;
    var speed = $contentObj.data("speed") || 1;

    $fwindow.on("scroll resize", function () {
      yPos = fgOffset - scrollTop / speed;

      $contentObj.css("top", yPos);
    });
  });

  // for each of background parallax element
  $('[data-type="background"]').each(function () {
    var $backgroundObj = $(this);
    var bgOffset = parseInt($backgroundObj.offset().top);
    var yPos;
    var coords;
    var speed = $backgroundObj.data("speed") || 100;

    $fwindow.on("scroll resize", function () {
      yPos = -((scrollTop - bgOffset) / speed);
      coords = "0 " + yPos + "px";

      $backgroundObj.css({ backgroundPosition: coords });
    });
  });

  // for each of background parallax element
  $('[data-type="background2"]').each(function () {
    var $backgroundObj = $(this);
    var bgOffset = parseInt($backgroundObj.offset().top);
    var yPos;
    var coords;
    var speed = $backgroundObj.data("speed") || 100;

    $fwindow.on("scroll resize", function () {
      yPos = -((scrollTop - bgOffset) / speed);
      coords = "0 " + yPos + "px";

      $backgroundObj.css({ backgroundPosition: coords });
    });
  });

  // triggers winodw scroll for refresh
  $fwindow.trigger("scroll");
}

parallaxIt();

jQuery(document).ready(function ($) {
  jQuery(".numero-info").counterUp({
    delay: 10, // the delay time in ms
    time: 2000, // the speed time in ms
  });
});

document.addEventListener("DOMContentLoaded", function () {
  let transparendHeader = document.querySelector(
    ".single-segmentos header.desktop.menupc"
  );

  // if window sroll pass 500
  window.addEventListener("scroll", function () {
    if (window.scrollY > 500) {
      transparendHeader.classList.add("passou");
    } else {
      transparendHeader.classList.remove("passou");
    }
  });
});
