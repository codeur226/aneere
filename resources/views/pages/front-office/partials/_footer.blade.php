	<!-- Footer -->
    <footer class="footer" style="background-image:url('img/map.png')">

        <!-- Copyright -->
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="copyright-content">
                            <!-- Copyright Text -->
                            <p>© Copyright tout droit réservé ANEREE</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Copyright -->
    </footer>
    <script src="{{asset('assetfront/js/jquery.min.js')}}"></script>
    <script src="{{asset('assetfront/js/jquery-migrate-3.0.0.js')}}"></script>

    <!-- Popper JS -->
    <script src="{{asset('assetfront/js/popper.min.js')}}"></script>
    <!-- Bootstrap JS -->
    <script src="{{asset('assetfront/js/bootstrap.min.js')}}"></script>
    <!-- Modernizr JS -->
    <script src="{{asset('assetfront/js/modernizr.min.js')}}"></script>
    <!-- ScrollUp JS -->
    <script src="{{asset('assetfront/js/scrollup.js')}}"></script>
    <!-- FacnyBox JS -->
    <script src="{{asset('assetfront/js/jquery-fancybox.min.js')}}"></script>
    <!-- Cube Portfolio JS -->
    <script src="{{asset('assetfront/js/cubeportfolio.min.js')}}"></script>
    <!-- Slick Nav JS -->
    <script src="{{asset('assetfront/js/slicknav.min.js')}}"></script>
    <!-- Slick Nav JS -->
    <script src="{{asset('assetfront/js/slicknav.min.js')}}"></script>
    <!-- Slick Slider JS -->
    <script src="{{asset('assetfront/js/owl-carousel.min.js')}}"></script>
    <!-- Easing JS -->
    <script src="{{asset('assetfront/js/easing.js')}}"></script>
    <!-- Magnipic Popup JS -->
    <script src="{{asset('assetfront/js/magnific-popup.min.js')}}"></script>
    <!-- Active JS -->
    <script src="{{asset('assetfront/js/active.js')}}"></script>
    {{-- data-table --}}
    <script src="{{asset('assetfront/js/jquery.min.js')}}"></script>
    <script src="{{asset('assetfront/plugins/DataTables/DataTables-1.10.25/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assetfront/plugins/DataTables/DataTables-1.10.25/js/dataTables.bootstrap4.min.js')}}"></script>
    <script>
        // $(document).ready(function(){
        // $("#search").on("keyup", function() {
        //     var value = $(this).val().toLowerCase();
        //     $("#secteur .line").filter(function() {
        //     $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        //     });
        // });
        // });
        $('.message a').click(function(){
            $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
            });
        $(".list-group .list-group-item").click(function(e) {
            $(".list-group .list-group-item").removeClass("active");
            $(e.target).addClass("active");
            });
            jQuery(document).ready(function($) {
            $('*[data-href]').on('click', function() {
                // window.location = $(this).data("href");
                // var url = $(this).attr('href');
                window.open($(this).data("href"), '_blank');
            });
        });
        // $(document).ready(function() {
            $('#secteur').DataTable();
        // } );
    </script>
