var active = window.location.pathname.replace("/", "");
$('a.list-group-item').removeClass("active");
$(`a#${active}`).addClass("active");