<footer class="site-footer " id="footer">
<div style="margin-bottom: 0" class="wrapper">
        <div class="c-col-12 align-center">
            <p class="copyright-text footer-{{@$site_layout ?? 'dark'}}">
                all copy rights reserved Nov 2021.
{{--                <a--}}
{{--                    class="footer-{{@$site_layout ?? 'dark'}}"--}}
{{--                    href="https://wa.me/0201004976761" target="_blank"--}}
{{--                    style="text-transform: uppercase;text-decoration: underline;margin: 0 5px">--}}
{{--                    Abd Almonem  </a>&--}}
{{--                <a class="footer-{{@$site_layout ?? 'dark'}}"--}}
{{--                    href="https://wa.me/0201091811793" target="_blank" style="text-transform: uppercase;text-decoration: underline;margin: 0 5px">--}}
{{--                    Karim Abdelaah  </a>--}}
            </p>
        </div>
    </div>
</footer>
<div class="top-scrollerx js-top-scrollerx svg-icons">
    <i class="icon-up-open-big"></i>
</div>
 @push('web_js')
 <script>
    $(window).scroll(function(){
        console.log('aaaaaa')
if ($(this).scrollTop() > 400) {
$('.js-top-scrollerx').fadeIn();
} else {
$('.js-top-scrollerx').fadeOut();
}
});
//Click event to scroll to top
$('.js-top-scrollerx').click(function(){
$('html, body').animate({scrollTop : 0},1000);
return false;
});
</script>
 @endpush
