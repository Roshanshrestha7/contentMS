<footer class="container-fluid text-center">
    <p>Copyright &copy; 2014-2016 </p>
    <?php
    $date = '';
    $todaydateTime= new DateTime($date, new DateTimeZone('UTC'));
    $todaydateTime->setTimeZone(new DateTimeZone('Asia/Kathmandu'));
    echo $todaydateTime->format('Y-m-d H:i:s');
    ?>
</footer>
@section('js')
    <script>
        $('#icon-layout li').on('click', function() {
            $('.nav navbar-na li.active').removeClass('active');
                $(this).addClass('active');
        });
    </script>
@endsection