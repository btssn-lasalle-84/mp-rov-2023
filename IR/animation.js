window.onload = function () {
    Particles.init({
      selector: ".background"
    });
  };
  const particles = Particles.init({
    selector: ".background",
    color: ["#03dac6", "#ff0266", "#000000"],
    connectParticles: true,
    responsive: [
      {
        breakpoint: 768,
        options: {
          color: ["#faebd7", "#03dac6", "#ff0266"],
          maxParticles: 43,
          connectParticles: false
        }
      }
    ]
  });
  
  class NavigationPage {
    constructor() {
      this.currentId = null;
      this.currentTab = null;
      this.tabconteneurAuCentreHeight = 70;
      this.lastScroll = 0;
      let self = this;
      $(".nav-tab").click(function () {
        self.onTabClick(event, $(this));
      });
      $(window).scroll(() => {
        this.onScroll();
      });
      $(window).resize(() => {
        this.onResize();
      });
    }
  
    onTabClick(event, element) {
      event.preventDefault();
      let scrollTop =
        $(element.attr("href")).offset().top - this.tabconteneurAuCentreHeight + 1;
      $("html, body").animate({ scrollTop: scrollTop }, 600);
    }
  
    onScroll() {
      this.checkHeaderPosition();
      this.findCurrentTabSelector();
      this.lastScroll = $(window).scrollTop();
    }
  
    onResize() {
      if (this.currentId) {
        this.setSliderCss();
      }
    }
  
    checkHeaderPosition() {
      const headerHeight = 75;
      if ($(window).scrollTop() > headerHeight) {
        $(".nav-conteneurAuCentre").addClass("nav-conteneurAuCentre--scrolled");
      } else {
        $(".nav-conteneurAuCentre").removeClass("nav-conteneurAuCentre--scrolled");
      }
      let offset =
        $(".nav").offset().top +
        $(".nav").height() -
        this.tabconteneurAuCentreHeight -
        headerHeight;
      if (
        $(window).scrollTop() > this.lastScroll &&
        $(window).scrollTop() > offset
      ) {
        $(".nav-conteneurAuCentre").addClass("nav-conteneurAuCentre--move-up");
        $(".nav-conteneurAuCentre").removeClass("nav-conteneurAuCentre--top-first");
        $(".nav-conteneurAuCentre").addClass("nav-conteneurAuCentre--top-second");
      } else if (
        $(window).scrollTop() < this.lastScroll &&
        $(window).scrollTop() > offset
      ) {
        $(".nav-conteneurAuCentre").removeClass("nav-conteneurAuCentre--move-up");
        $(".nav-conteneurAuCentre").removeClass("nav-conteneurAuCentre--top-second");
        $(".nav-conteneurAuCentre-conteneurAuCentre").addClass("nav-conteneurAuCentre--top-first");
      } else {
        $(".nav-conteneurAuCentre").removeClass("nav-conteneurAuCentre--move-up");
        $(".nav-conteneurAuCentre").removeClass("nav-conteneurAuCentre--top-first");
        $(".nav-conteneurAuCentre").removeClass("nav-conteneurAuCentre--top-second");
      }
    }
  
    findCurrentTabSelector(element) {
      let newCurrentId;
      let newCurrentTab;
      let self = this;
      $(".nav-tab").each(function () {
        let id = $(this).attr("href");
        let offsetTop = $(id).offset().top - self.tabconteneurAuCentreHeight;
        let offsetBottom =
          $(id).offset().top + $(id).height() - self.tabconteneurAuCentreHeight;
        if (
          $(window).scrollTop() > offsetTop &&
          $(window).scrollTop() < offsetBottom
        ) {
          newCurrentId = id;
          newCurrentTab = $(this);
        }
      });
      if (this.currentId != newCurrentId || this.currentId === null) {
        this.currentId = newCurrentId;
        this.currentTab = newCurrentTab;
        this.setSliderCss();
      }
    }
  
    setSliderCss() {
      let width = 0;
      let left = 0;
      if (this.currentTab) {
        width = this.currentTab.css("width");
        left = this.currentTab.offset().left;
      }
      $(".nav-tab-slider").css("width", width);
      $(".nav-tab-slider").css("left", left);
    }
  }
  