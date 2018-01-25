  <!-- FOOTER -->
    
    <footer class="container-fluid">
      <div class="container">
        <div class="d-flex justify-content-between">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logoacs.png" alt="">
          <div class="">
            <i class="fa fa-facebook-official" aria-hidden="true"></i>
            <i class="fa fa-twitter-square" aria-hidden="true"></i>
            <i class="fa fa-envelope" aria-hidden="true"></i>
          </div>


          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logoofp.png" alt="">
        </div>
        <p class="copy text-center">&copy; 2018 - CANCOICODE - ACS Vesoul</p>
      </div>

    </footer>

<?php wp_footer(); ?>
<?php if(is_home()): ?>
<script type="text/javascript">
    var a = 0;
$(window).scroll(function() {

  var oTop = $('.section_icones').offset().top - window.innerHeight;
  if (a == 0 && $(window).scrollTop() > oTop) {
            $('.count').each(function () {
            $(this).prop('Counter',0).animate({
                Counter: $(this).text()
            }, {
                duration: 1500,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
            a = 1;
            });
    }
});
</script>
<?php endif; ?>
</body>
</html>
