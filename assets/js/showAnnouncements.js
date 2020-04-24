$(document).ready(function () {
    let announcements;
    let renderAnnouncement = function (announcement) {
        let $element = $(".announcement-template").clone().contents();
        $(".announcement-image", $element).attr("src", "assets/img/announcementsImages/" + announcement.imageName);
        $(".announcement-card-link", $element).attr("href", announcement.url);
        return $element;
    };
    let renderAnnouncementsOnSmallScreen = function (announcements) {
        let $container = $("#announcements-container");
        $container.empty();
        for (let i = 0; i < announcements.length; i++) {
            let $carouselItem = $(".carousel-item-template").clone().contents();
            $(".row", $carouselItem).append(renderAnnouncement(announcements[i]));
            $container.append($carouselItem);
        }
        if ($container.children().length > 0) {
            $(".carousel-item:first-child", $container).addClass("active");
        }
    };
    let renderAnnouncementsOnMediumScreen = function (announcements) {
        let $container = $("#announcements-container");
        $container.empty();
        let count = 0;
        let $carouselItem = $(".carousel-item-template").clone().contents();
        $container.append($carouselItem);
        for (let i = 0; i < announcements.length; i++) {
            if (count < 3) {
                $(".row", $carouselItem).append(renderAnnouncement(announcements[i]));
                count++;
            } else {
                $carouselItem = $(".carousel-item-template").clone().contents();
                $container.append($carouselItem);
                count = 1;
                $(".row", $carouselItem).append(renderAnnouncement(announcements[i]));
            }
        }
        if ($container.children().length > 0) {
            $(".carousel-item:first-child", $container).addClass("active");
        }
    };
    $.ajax({
        url: "assets/php/announcementsRequests.php",
        method: "POST",
        success: function (data) {
            announcements = JSON.parse(data);
            if ($(window).width() < 768) {
                renderAnnouncementsOnSmallScreen(announcements);
            } else {
                renderAnnouncementsOnMediumScreen(announcements);
            }
        }
    });
    $(window).on('resize', function () {
        if ($(window).width() < 768) {
            renderAnnouncementsOnSmallScreen(announcements);
        } else {
            renderAnnouncementsOnMediumScreen(announcements);
        }
    });
});
