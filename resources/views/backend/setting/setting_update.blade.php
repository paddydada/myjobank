@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Site Setting</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Site Setting</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <br>
        <div class="container">
            <div class="main-body">
                <div class="row mt-3">
                    {{-- <div class="col-lg-2"></div> --}}
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('site.setting.update') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $setting->id }}">

                                    <div class="row mb-3 mt-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Support Phone</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="number" name="support_phone" class="form-control"
                                                value="{{ $setting->support_phone }}">
                                        </div>
                                        @error('support_phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Whatsapp Phone</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="number" name="whatsapp_phone" class="form-control"
                                                value="{{ $setting->whatsapp_phone }}">
                                        </div>
                                        @error('whatsapp_phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="email"class="form-control"
                                                value="{{ $setting->email }}">
                                        </div>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Company Address</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="company_address" class="form-control"
                                                value="{{ $setting->company_address }}">
                                        </div>
                                        @error('company_address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Facebook</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="facebook" class="form-control"
                                                value="{{ $setting->facebook }}">
                                        </div>
                                        @error('facebook')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>



                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Instagram</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="instagram" class="form-control"
                                                value="{{ $setting->instagram }}">
                                        </div>
                                        @error('instagram')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    </div>


                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Linkedin</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="twitter" class="form-control"
                                                value="{{ $setting->twitter }}">
                                        </div>
                                        @error('twitter')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>


                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Copyright</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="copyright" class="form-control"
                                                value="{{ $setting->copyright }}">
                                        </div>
                                        @error('copyright')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>




                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Logo</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="file" id="image" name="logo" class="form-control">
                                            <br>
                                            <img id="showImage"
                                                src="{{ !empty($setting->logo) ? asset('upload/logo/' . $setting->logo) : asset('upload/no_image.png') }}"
                                                class="rounded-circle p-1" width="110">

                                        </div>
                                        @error('logo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>


                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Favicon Icon</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="file" id="icon" name="favicon" class="form-control">
                                            <br>
                                            <img id="showIcon"
                                                src="{{ !empty($setting->favicon) ? asset('upload/favicon/' . $setting->favicon) : asset('upload/no_image.jpg') }}"
                                                class="rounded-circle p-1" width="50">

                                        </div>
                                        @error('favicon')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>



                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-primary px-4"
                                                value="Update Site Setting">
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
            $('#icon').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showIcon').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
