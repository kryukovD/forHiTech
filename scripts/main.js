$(document).ready(function () {
    $(".btn_small").hover(function () {
        $(this).closest(".card").toggleClass("card_active");
    })
    $("#mobile__btn").click(function () {
        $(".mobile__menu").addClass("mobile__menu_active");
    });
    $(".mobile__close").click(function () {
        $(".mobile__menu").removeClass("mobile__menu_active");
    });
    let hrefs = $(".header-menu__item a");
    hrefs.each(function (i, item) {
        if (window.location.pathname == $(item).attr("href")) {
            $(item).parent("li").addClass("header-menu__item__active");
        }

    })
    $(".question__name").click(function () {
        $this = $(this);
        $(this).parent(".question").find(".question__answer").slideToggle(300, function () {
            if (($this).hasClass("question__name_plus")) {
                $($this).addClass("question__name_minus");
                $($this).removeClass("question__name_plus");
            } else if (($this).hasClass("question__name_minus")) {
                $($this).removeClass("question__name_minus");
                $($this).addClass("question__name_plus");
            }

        });
    });

    /* ajax */
    $("#form__city").submit(function(e){
        e.preventDefault();
        let data=new FormData(this);
        let nameCity=data.get("name");
        $.ajax({
            url:`https://search-maps.yandex.ru/v1/?apikey=989d3980-a156-4c93-a21e-d6514dff5cbd&text=${nameCity}&type=geo&lang=ru_RU&results=1`,
            method:"get",
            dataType: 'json',
            success:function(response){
                 let lat=response.features[0].geometry.coordinates[0];
                 let lon=response.features[0].geometry.coordinates[1];
                 console.log(response);
                 $.ajax({
                    url:'/test/ajax/weather.php',
                    method:"post",
                    data: {lat:lat,lon:lon}, 
                    dataType: 'json',
                    success:function(response){
                        $(".form__response").html(`<p>Текущая погода ${response.fact.temp} &deg;  </p> <br> <a href='${response.info.url}'>Ссылка на гео </a>`)
                     
       
                    }
                });
            }
        });
    });
});
