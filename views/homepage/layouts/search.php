<div class="Search">
    <input type="text" id="search_id" placeholder="nhập từ khóa ..." class=" form-control w-100" />
    <div id="search_product"></div>
</div>
  <script>
            $(function() { 
                $("#search_id").keyup(function() {
                    let keyword = $(this).val();
                    if (keyword != '') {
                        $.ajax({
                            type: "post",
                            url: "<?= app_url('tim-kiem/xu-ly') ?>",
                            data: {
                                keyword: keyword,
                            },
                            beforeSend: function() {
                                $("#search_product").css("background", "#fff url(LoaderIcon.gif) no-repeat 165px");
                            },
                            success: function(data) {
                                $("#search_id").show();
                                $("#search_product").html(data);
                            }
                        });
                    } else {
                        $("#search_product").html(null);
                    }
                });
            });
            
            // To select country name
            function selectCountry(val) {
                $("#search_id").val(val);
                $("#search_product").hide();
            }
        </script>





  