$(document).ready(function() {
    const topDivHeight = $('#top-div').height();
    const navbarHeight = $('.navbar').height();
    $(window).scroll(function() {
        if ($(document).scrollTop() < (topDivHeight + navbarHeight ) && $(document).scrollTop() > navbarHeight) {
            $('.navbar').addClass('transparent');
        } else {
            $('.navbar').removeClass('transparent');
        }
    });

    let renderMember = function(member) {

        let $element = $(".member-template").clone().contents();

        $(".member-image", $element).attr("src", member.image);
        $(".member-name", $element).text(member.name);
        $(".member-title", $element).text(member.title);
        $(".member-facebook", $element).attr("href", member.facebook);
        $(".member-twitter", $element).attr("href", member.twitter);
        $(".member-linkedin", $element).attr("href", member.linkedin);
        return $element;
    };

    $.getJSON("assets/json/members.json", function (data) {
        let $firstContainer = $("#first-members-container");
        let $secondContainer  = $("#second-members-container");
        let i = 0;
        if(data.length % 3 === 1){
            $firstContainer.append(renderMember(data[0]));
            i++;
        }
        else if(data.length % 3 ===  2){
            $firstContainer.append(renderMember(data[0]));
            $firstContainer.append(renderMember(data[1]));
            i = i + 2;
        }
        for (; i < data.length; i++) {
            $secondContainer.append(renderMember(data[i]));
        }
    });
});
