  <!-- Footer Section Begin -->
    <footer class="footer" style="background: #008000;">
        <div class="container">
            <div class="row">
                <div class="col md-12">
                    <div class="float-left">
                        <p class="text-white">Copyright &copy; <script>document.write(new Date().getFullYear());</script> by <a href="" target="_blank">TI Poliban 2019</a></p>             
                    </div>
                    <div class="float-right">
                        <a href="#"><i class="fa fa-facebook text-white"></i></a>
                        <a href="#"><i class="fa fa-twitter text-white"></i></a>
                        <a href="#"><i class="fa fa-linkedin text-white"></i></a>
                        <a href="#"><i class="fa fa-youtube-play text-white"></i></a> 
                    </div>
             </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="<?= base_url() ?>template/front-end/js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url() ?>template/front-end/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>template/front-end/js/jquery.nice-select.min.js"></script>
    <script src="<?= base_url() ?>template/front-end/js/jquery-ui.min.js"></script>
    <script src="<?= base_url() ?>template/front-end/js/jquery.slicknav.js"></script>
    <script src="<?= base_url() ?>template/front-end/js/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>template/front-end/js/main.js"></script>
    <script src="<?= base_url() ?>template/front-end/js/gallery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        JavaScriptGallery.enableExtraButtons();
        JavaScriptGallery.initGallery();
        $('#kota').select2()

        $(document).ready(function(){
            $('#kota').change(function(){
                var kota = $('#kota').val();

                $.ajax({
                    url : '<?= base_url() ?>index.php/home/get_kota',
                    data : {kota:kota},
                    type : 'post',
                    success : function(data){
                        data = JSON.parse(data);
                        subuh = data.subuh;
                        dzuhur = data.dzuhur;
                        ashar = data.ashar;
                        maghrib = data.maghrib;
                        isya = data.isya;

                        $('#subuh').text(subuh);
                        $('#dzuhur').text(dzuhur);
                        $('#ashar').text(ashar);
                        $('#maghrib').text(maghrib);
                        $('#isya').text(isya);
                    }
                });
            });

            $(document).on('click','#tanggal',function(){
                type = this.value
                kota = $('#kota').val()
                date = $('#date-now').val()
                $.ajax({
                    url : '<?= base_url() ?>index.php/home/get_kota',
                    data : {type:type, kota:kota, date:date},
                    type : 'post',
                    success : function(data){
                        data = JSON.parse(data);
                        subuh = data.subuh;
                        dzuhur = data.dzuhur;
                        ashar = data.ashar;
                        maghrib = data.maghrib;
                        isya = data.isya;
                        date = data.date;

                        $('#subuh').text(subuh);
                        $('#dzuhur').text(dzuhur);
                        $('#ashar').text(ashar);
                        $('#maghrib').text(maghrib);
                        $('#isya').text(isya);
                        $('#date-now').val(date)
                        $('#title-shalat').text('Jadwal Shalat Tanggal '+date)
                    }
                });
            });
        })
    </script>
    <!-- <script src="<?= base_url() ?>template/muslimpro/muslimprowidget.js"></script> -->
</body>


</html>