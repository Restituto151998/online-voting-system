</div>

<footer class="main-footer">
    <div class="footer-left">
        <a href="#">Evsu App | User Management.</a></a>
    </div>
    <div class="footer-right">
    </div>
</footer>
</div>
</div>
<!-- General JS Scripts -->
<script src="./assets/js/app.min.js"></script>


<script src="./assets/bundles/summernote/summernote-bs4.js"></script>
<!-- JS Libraies -->
<script src="./assets/bundles/datatables/datatables.min.js"></script>
<script src="./assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="./assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="./assets/bundles/jquery-ui/jquery-ui.min.js"></script>
<!-- Page Specific JS File -->
<script src="./assets/js/page/datatables.js"></script>

<!-- Template JS File -->
<script src="./assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="./assets/js/custom.js"></script>
<script>
    $(document).ready(function(){
        $('.toggle-password').click(function(){
           $input =  $(this).closest('td').find('input')
           if($input.attr('type') === 'password') {
            $input.attr('type', 'text')
            $(this).text('Hide')
           }else {
            $input.attr('type', 'password')
            $(this).text('Show')
           }
        })
        $('body').removeClass('theme-white')
        $('body').addClass('theme-purple')
    })
</script>
</body>

</html>