            </div>
        </div> 
        <a href="javascript:void(0);" id="scroll" title="Scroll to Top" style="display: none;"><span></span></a> 
    </body>
</html>

<script type="text/javascript">
    $(document).ready(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('#scroll').fadeIn();
            } else {
                $('#scroll').fadeOut();
            }
        });
        $('#scroll').click(function () {
            $("html, body").animate({ scrollTop: 0 }, 100);
            return false;
        });
    });
</script>