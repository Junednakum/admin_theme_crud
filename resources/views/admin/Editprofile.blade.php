@extends('layouts.app')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
                    
        <div id="basic" class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Edit Your Profile</h4>
                        </div>                 
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                    <div class="row">
                        <div class="col-lg-6 col-12 mx-auto">
                            <form action="{{ route('update.profile') }}" method="POST" enctype="multipart/form-data"> 
                                @csrf
                                <div class="form-group">
                                    <label for="crpassword" class="sr-only">Current password</label>
                                    <input type="password" name="crpassword" id="crpassword" placeholder="Enter Current password" class="form-control">
                                    @if ($errors->has('crpassword'))
                                      <span class="text-danger">{{ $errors->first('crpassword') }}</span>
                                  @endif
                                </div>
                                <div class="form-group">
                                    <label for="password" class="sr-only">Password</label>
                                    <input id="password" type="password" name="password" id="password" placeholder="Enter password" class="form-control" >
                                    @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation" class="sr-only">Current password</label>
                                    <input id="confirmation_password" type="password" name="confirmation_password" id="confirmation_password" placeholder="Enter Confirmation Password" class="form-control">
                                    @if ($errors->has('confirmation_password'))
                                      <span class="text-danger">{{ $errors->first('confirmation_password') }}</span>
                                  @endif
                                </div>
                                <?php //$userimage = $user->user_image; ?>
                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                    <div class="custom-file-container__image-preview" style="height:100px;"></div>
                                    <label>Upload (Single File) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                    <label class="custom-file-container__custom-file" >
                                        <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*" name="image">
                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                </div>
                                <input type="submit" name="txt" value="Update" class="mt-4 btn btn-primary">
                            </form>
                        </div>                                        
                    </div>

                </div>
            </div>
        </div>
        
    </div>

</div>
    
@endsection  