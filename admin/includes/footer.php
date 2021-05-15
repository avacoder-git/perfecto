  </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

<!--     Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

  <script src="../admin/js/cropper.js"></script>

  <script>
      $(document).ready(function (){
          var file_upload = $('#file_upload');
          input = file_upload;
          var replace = $('#image');
          function readURL(input) {
              if (input.files && input.files[0]) {
                  var reader = new FileReader();
                  reader.onload = function(e) {
                      replace.attr('src', e.target.result);
                  }
                  reader.readAsDataURL(input.files[0]); // convert to base64 string
              }
          }

          $(input).change(function() {
              readURL(this);
          });

      });

  </script>
 </body>


</html>
