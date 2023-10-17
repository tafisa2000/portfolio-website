 @extends('admin.admin_master')
 @section('admin')
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

     <div class="page-content">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-12">
                     <div class="card">
                         <div class="card-body">

                             <h4 class="card-title">Add Mult Images</h4> <br><br>
                             <form method="post" action="{{ route('store.mult.image') }}" enctype="multipart/form-data">
                                 @csrf
                                 {{-- <input type="hidden" name="id" value="{{ $aboutPage->id }}"> --}}

                                 <div class="row mb-3">
                                     <label for="example-text-input" class="col-sm-2 col-form-label">About Mult
                                         Image:</label>
                                     <div class="col-sm-10">
                                         <input class="form-control" type="file" name="mult_image[]" id="image"
                                             multiple="">
                                     </div>
                                 </div>
                                 <div class="row mb-3">
                                     <div class="col-sm-10">
                                         <img id="showImage" class="rounded avatar-lg"
                                             src="{{ url('upload/no_image.jpg') }}" alt="Card image cap">
                                     </div>
                                 </div>



                                 <!-- end row -->

                                 <!-- end row -->
                                 <input type="submit" class="btn btn-dark btn-rounded waves-effect waves-light"
                                     value="Add Mult Image">
                             </form>
                         </div>
                     </div>
                 </div> <!-- end col -->
             </div>



         </div>
     </div>

     <script>
         $(document).ready(function() {
             $('#image').change(function(e) {
                 var reader = new FileReader();
                 reader.onload = function(e) {
                     $('#showImage').attr('src', e.target.result);
                 }
                 reader.readAsDataURL(e.target.files[0]);
             });
         });
     </script>
 @endsection
