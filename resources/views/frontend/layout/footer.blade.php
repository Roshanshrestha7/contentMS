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


        <div class="footers col-md-12 col-s-12">

                <div class="row" style="padding-right: 10px">
                        <div class="col-sm-12 col-md-12" style="padding-top: 10px">
                                <div style="padding-left: 70px">
                                <a href="{{route('contact')}}" class="btn btn-success btn-xs">Connect With Us<i class="fa fa-hand-point-right"></i></a>
                                        <ul class="list-unstyled list-inline social pull-right " style="padding-right: 60px">
                                                <li class="list-inline-item"><a href=""><i class="fa fa-facebook"></i></a></li>
                                                <li class="list-inline-item"><a href=""><i class="fa fa-twitter"></i></a></li>
                                                <li class="list-inline-item"><a href=""><i class="fa fa-instagram"></i></a></li>
                                        </ul>
                                </div>

                        </div>
                        </hr>
                </div>
                <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
                                <p class="h6">&copy All right Reversed.</p>
                        </div>
                        </hr>
                </div>
        </div>




