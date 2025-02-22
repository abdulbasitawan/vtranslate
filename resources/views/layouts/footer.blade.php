<section id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="footerBox">
                    <a href="home.html">
                        <!-- <img src="{{ asset('assets/img/logo.png') }}" alt="" class="img-fluid"> -->
                        <h3><img src="{{ asset('assets/img/logo.png') }}" alt="" class="img-fluid"></h3>
                    </a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis, lectus magna fringilla urna, porttitor rhoncus dolor purus non enim.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footerBox">
                    <h3>COMPANY INFO</h3>
                    <ul>
                        <li>
                            <a href="{{ url('about-us') }}">About US </a>
                        </li>
                        <li>
                            <a href="{{ url('privacy-policy') }}">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="{{ url('term-condition') }}">Terms and Conditions</a>
                        </li>
                        <li>
                            <a href="{{ url('contact-us') }}">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footerBox">
                    <h3>NEED HELP</h3>
                    <ul>
                        <li>
                            <a href="{{ url('how-it-works') }}">How it Works</a>
                        </li>

                        <li>
                            <a href="{{ url('faq') }}">Our FAQ </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <div class="footerBox">
                    <h3>SOCIAL LINKS</h3>
                    <p>Follow Us: <span><i class="fa fa-twitter" aria-hidden="true"></i></span><span><i class="fa fa-linkedin-square" aria-hidden="true"></i></span><span><i class="fa fa-facebook-official" aria-hidden="true"></i></span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="footerBottom">
        <p>Copyright 2021 © VeTranslate. All Rights Reserved.</p>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{asset('js/image-uploader.min.js')}}"></script>
@toastr_js
@toastr_render
<script>
    $('#summernote').summernote({
        tabsize: 2,
        height: 200
    });
    $('.sliderDiv').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true,
        arrows: true,
    });
    $('select').change(function() {
        var url = $(this).val();
        window.location = url;
    });
</script>
<script type="text/javascript">
    $('.input-images').imageUploader();
</script>

<script>
    $(".favoriteIcon").click(function() {
        //mywork here
        if ($(this).hasClass("fa-heart-o")) {
            $(this).removeClass("fa-heart-o")
            $(this).addClass("fa-heart")
        } else {
            $(this).removeClass("fa-heart")
            $(this).addClass("fa-heart-o")
        }
    })
    $("#Set-Date").click(function() {
        $(".setDateDiv").css("display", "block")
    })
    $("#No-dealine").click(function() {
        $(".setDateDiv").css("display", "none")
    })
    var pageUrl = location.pathname.split("/")[1];
    $('#header ul li a').each(function() {
        link = $(this);
        value = link.attr("href").split("/")
        console.log(value)
        if (value[3] == pageUrl) {
            $('#header ul li a').removeClass('active');
            link.addClass("active");
        } else if (value[3] == "home") {
            $('#header ul li a').removeClass('active');
            $("#header ul li:nth-child(1) a").addClass("active");
        }
    });
    $(".searchBtn").click(function() {
        if ($(".searchInput").css("display") == "block") {
            $(".searchInput").removeClass("show")
        } else {
            $(".searchInput").addClass("show")
        }
    })
</script>