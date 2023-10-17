 @extends('admin.admin_master')
 @section('admin')
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

     <div class="page-content">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-12">
                     <div class="card">
                         <div class="card-body">

                             <h4 class="card-title">Edit Profile</h4>
                             <form method="post" action="{{ route('store.profile') }}" enctype="multipart/form-data">
                                 @csrf
                                 <div class="row mb-3">
                                     <label for="example-text-input" class="col-sm-2 col-form-label">Name:</label>
                                     <div class="col-sm-10">
                                         <input class="form-control" type="text" name="name"
                                             value="{{ $editData->name }}" placeholder="Artisanal kale"
                                             id="example-text-input">
                                     </div>
                                 </div>
                                 <div class="row mb-3">
                                     <label for="example-text-input" class="col-sm-2 col-form-label">Email:</label>
                                     <div class="col-sm-10">
                                         <input class="form-control" type="email" name="email"
                                             value="{{ $editData->email }}" placeholder="Artisanal kale"
                                             id="example-text-input">
                                     </div>
                                 </div>
                                 <div class="row mb-3">
                                     <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image:</label>
                                     <div class="col-sm-10">
                                         <input class="form-control" type="file" name="profile_image" id="image">
                                     </div>
                                 </div>
                                 <div class="row mb-3">
                                     <div class="col-sm-10">
                                         <img id="showImage" class="rounded-circle avatar-xl"
                                             src="{{ !empty($editData->profile_image) ? url('upload/admin_images/' . $editData->profile_image) : url('upload/no_image.jpg') }}"
                                             alt="Card image cap">
                                     </div>
                                 </div>
                                 <!-- end row -->

                                 <!-- end row -->
                                 <input type="submit" class="btn btn-dark btn-rounded waves-effect waves-light"
                                     value="Update Profile">
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
