<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style>
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
        margin-bottom: 0;
        border-radius: 0;
    }

    /* Add a gray background color and some padding to the footer */
    footer {
        background-color: #f2f2f2;
        padding: 10px;
    }


</style>

<script src="{{asset('js/toastr.min.js')}}"></script>

<script>
    @if(Session::has('success'))
    toastr.success("{{  Session::get('success') }}")

    @endif
</script>
<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById("myImg");
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
</script>


        <div class="footers col-md-12 col-s-12" style="padding-bottom: 10px">

                <div class="row" style="padding-right: 10px">
                        <div class="col-sm-12 col-md-12" >
                                <div class="col-md-1"></div>
                                <div class="col-md-3">
                                        <h3>CMS</h3>
                                        <h6><i class="fa fa-map-marker"></i>&nbsp; Young Minds Tower, Chowk Prayag <br> Shanti Nagar, Prayag Marg, <br> Kathmandu 44600</h6>
                                        <h6><i class="fa fa-phone"></i>&nbsp; 01-661234</h6>
                                        <h6><i class="fa fa-envelope-open"></i>&nbsp; example@gmail.com</h6>
                                </div>
                                <div class="col-md-2 " >
                                        <h3>QUICK LINKS</h3>
                                        <h6><a href="{{ route('frontend') }}" style="color: black">Home</a></h6>
                                        <h6><a href="" style="color: black">About Us</a></h6>
                                        <h6><a href="{{ route('notice') }}" style="color: black">Notice</a></h6>
                                        <h6><a href="{{ route('event') }}" style="color: black">Event</a></h6>

                                </div>
                                <div class="col-md-3">
                                    <h3>SUBSCRIBE</h3>
                                    Enter your mail address and click 'Subscribe' to get in touch our upcoming events and news.

                                    {{ Form::open(array('url' => 'admin/subscribe','method' => 'post')) }}
                                            {{ csrf_field() }}
                                            <br>

                                                <input name="email" class="form" required="required"  placeholder="Your Email Address" type="email">
                                                <button class="btn btn-success btn-xs">Subscribe</button>
                                    {{ Form::close() }}
                                </div>
                                <div class="col-md-3 text-center" style="padding-top: 20px">
                                    <a href="{{route('contact')}}" class="btn btn-success btn-xs">Connect With Us<i class="fa fa-hand-point-right"></i></a>
                                        <br>
                                        <br>
                                        <div class="row">
                                            <a href=""><i class="fa fa-facebook"></i></a>&nbsp &nbsp &nbsp &nbsp;
                                            <a href=""><i class="fa fa-twitter"></i></a>&nbsp &nbsp &nbsp &nbsp;
                                            <a href=""><i class="fa fa-instagram"></i></a>
                                    </div>
                                        <p class="h6">&copy All right Reversed.</p>

                                </div>


                        </div>
                        </hr>
                </div>

        </div>




