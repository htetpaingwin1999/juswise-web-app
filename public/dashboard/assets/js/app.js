$(".show-btn").click(function () {
    $(".sidebar1").animate({marginLeft:0})
 })
 $(".close-btn").click(function () {
     $(".sidebar1").animate({marginLeft:"-100%"})
     
  });
  $(".maximize-btn").click(function () {
    let current= $(this).closest(".card");
    current.toggleClass("full-screen")
    if(current.hasClass("full-screen")){
        $(this).html(` <i class="feather-minimize-2 "></i> `)
    }else{
        $(this).html(` <i class=" feather-maximize-2"></i>`)
    }
});
