<section class="section">
    <div class="section-header">
        <h1><?php echo $tittle; ?></h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="<?php echo base_url('admin/scan/index'); ?>">
                            <div class="form-group">
                                <label for="url_page">Masukkan url formulir (<?php echo base_url('show/xxx') ?>)</label>
                                <textarea style="height:400px;" type="text" class="form-control" name="url_page" id="url_page" required autofocus><?php echo set_value('url_page') ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">Check</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body text-center">
                        <canvas class="my-5"></canvas>
                        <select></select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Js scan qrcode -->
<script type="text/javascript" src="<?php echo base_url('assets/scan_qrcode/'); ?>js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/scan_qrcode/'); ?>js/qrcodelib.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/scan_qrcode/'); ?>js/webcodecamjquery.js"></script>
<script type="text/javascript">
    var arg = {
        resultFunction: function(result) {
            //$('.hasilscan').append($('<input name="no_reg" value=' + result.code + ' readonly><input type="submit" value="Cek"/>'));
            // $.post("../cek.php", { no_reg: result.code} );
            var redirect = '<?php echo base_url('admin/scan/index'); ?>';
            $.redirectPost(redirect, {
                url_page: result.code
            });
        }
    };

    var decoder = $("canvas").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery;
    decoder.buildSelectMenu("select");
    decoder.play();
    /*  Without visible select menu
        decoder.buildSelectMenu(document.createElement('select'), 'environment|back').init(arg).play();
    */
    $('select').on('change', function() {
        decoder.stop().play();
    });

    // jquery extend function
    $.extend({
        redirectPost: function(location, args) {
            var form = '';
            $.each(args, function(key, value) {
                form += '<input type="hidden" name="' + key + '" value="' + value + '">';
            });
            $('<form action="' + location + '" method="POST">' + form + '</form>').appendTo('body').submit();
        }
    });
</script>